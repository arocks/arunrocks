<?php
/* cPanel Proxy 0.4.1
 * http://cpanelproxy.net/
 *
 * See README.txt
 *
 */

//// Config

$version = '0.4.1'; // Please don't change this one. :)

// Last part of hostnames (see install instructions)
// Autodetect by removing first element of current hostname
$hostpostfix = preg_replace('/^.*?\./', '', $_SERVER['HTTP_HOST']);

// First parts of hostnames
$webmailhost = 'webmail.'.$hostpostfix;
$cpanelhost = 'cpanel.'.$hostpostfix;
$whmhost = 'whm.'.$hostpostfix;

// If server is running in CGI-mode HTTP Authentification won't work. If 
// $cgimode is "true", cPanel Proxy will hide HTTP Authentification, forcing 
// cPanel to fall back on Cookie Authentification.
// This means that cPanel Proxy is no longer transparent to the user, as the 
// login-screen will look different than usual.
// Defaults to "true" as it will always works, autodetection may be added 
// later.
$cgimode = true;

// The host where cPanel is running. I strongly suggest having this script on 
// the same server as cPanel, and leaving this setting at default "localhost".
$host = 'localhost';

// I'm honestly not sure if \r\n or \n is most correct, but in this case it 
// just needs to work.
$nl = "\r\n";

//// End of config

if ($_SERVER["QUERY_STRING"]=='cPanelProxyVersion') {
  echo '<p><a href="http://cpanelproxy.net/">cPanel Proxy</a> '
    .$version.'</p>';
  exit;
}

function error($header, $string) {
  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Error</title>
</head>
<body>
<h1>Error: '.$header.'</h1>
'.$string.'
<hr />
<div style="font-size: 0.8em;"><a href="http://cpanelproxy.net/">'
.'cPanel Proxy '.$version.'</a></div>
</body>
</html>
';
}

switch($_SERVER['HTTP_HOST']) {
 case $webmailhost:
   $port = 2095;
   break;
 case $cpanelhost:
   $port = 2082;
   break;
 case $whmhost:
   $port = 2086;
   break;
 default:
   error(
	 'Hostname not recognized','<p>Server is misconfigured or you have '
.'entered a wrong address. You can try these in stead:</p>

<table>
<tr><td>Webmail: </td><td><a href="http://'.$webmailhost.'/">http://'
.$webmailhost.'/</a></td></tr>
<tr><td>cPanel: </td><td><a href="http://'.$cpanelhost.'/">http://'
.$cpanelhost.'/</a></td></tr>
<tr><td>WHM: </td><td><a href="http://'.$whmhost.'/">http://'.$whmhost
.'/</a></td></tr>
</table>
');
   exit;
}


//// Get headers from browser

// "/webmail" is replaced with "/webmail_" in the url, so the server won't
// redirect browsers using this proxy for webmail.
// The protocol is hardcoded to HTTP 1.0. Then we don't have to worry about
// chunked transfers, as 1.1 forces you to.
$frombrowser = $_SERVER['REQUEST_METHOD']." "
.str_replace('/webmail_', '/webmail',$_SERVER['REQUEST_URI'])." "
.'HTTP/1.0'.$nl;


foreach($_SERVER as $a=>$b) {
  if ($a == 'HTTP_HOST') $b = "$host:$port";
  if ($a == 'HTTP_CONNECTION') $b = "Close"; // FIXME: Maybe a persitent socket could be good for performance. Do we need to make sure only the same browser reuses a socket, or is persistent sockets as stateless as usual?
  if (substr($a,0,5)=='HTTP_') {
    $frombrowser .= substr($a,5)
      .': '. $b.$nl;
  }
}

// That was the regular headers. Now we need to re-generate the headers that 
// was parsed and thrown away before this script gets a chance to see them.

// First authentication.
if (isset($_SERVER['PHP_AUTH_USER']) 
    && !isset($_SERVER['HTTP_AUTHORIZATION'])) {
  $frombrowser .= "Authorization: Basic "
.base64_encode($_SERVER['PHP_AUTH_USER'].':'.$_SERVER['PHP_AUTH_PW']).$nl;
}

if (strlen(@$_SERVER['CONTENT_TYPE'])) {
  $frombrowser .= "Content-Type: ".$_SERVER['CONTENT_TYPE'].$nl;
}
 
// End of browsers headers (for now).

switch($_SERVER['REQUEST_METHOD']) {

 case 'HEAD':
 case 'GET':
   // We're done, signalling this with an extra newline.
   $frombrowser .= $nl;
   break;

 case 'POST':
   // We probably have a body, we need to include this.
   
   $input = fopen('php://input','r');
   $frombrowser_body = '';

   if (strpos(@$_SERVER['CONTENT_TYPE'], 'multipart/form-data')===false) {

     // Not multipart/form-data, sending body directly from browser
     
     // First we get the entire post body.
     while (true) {
       $data = fread($input, 10240); // FIXME: Can we optimize here with another buffer-size?
       if (strlen($data)===0) break;
       $frombrowser_body .= $data;
     }
   } else {

     // multipart/form-data
     
     $boundary = '--------'.md5(time()); // FIXME: Do we need a better algorithm to generate boundary string?
     $frombrowser .= "Content-Type: multipart/form-data; boundary="
       .$boundary.$nl;
     foreach($_POST as $name=>$data) {
       $frombrowser_body .= '--'.$boundary.$nl
	 .'Content-Disposition: form-data; name="'.$name.'"'.$nl
	 .$nl.$data.$nl; // FIXME: If $data is an array, handle that correctly.
     }

     foreach($_FILES as $name=>$data) {
       if (!is_uploaded_file($data['tmp_name'])) continue;

       $frombrowser_body .= '--'.$boundary.$nl
	 .'Content-Disposition: form-data; name="'.$name.'";'
	 .' filename="'.$data['name'].'"'.$nl; // FIXME: Do we need some kind of encoding here? What if the filename (or the name) has characters like double-quote, colon, semicolon, \n or \r?
       // (Uploading a file with double-quote in filename with Mozilla thru this script fails, I have not done any further testing yet.)
       $frombrowser_body .= 'Content-Type: '.$data['type'].$nl
	 .$nl
	 .file_get_contents($data['tmp_name'])
	 .$nl;
     }
     $frombrowser_body .= '--'.$boundary.$nl;
    }
   
   // Okay, now we can finish the headers and attach the body.
   $frombrowser .= "Content-Length: ".strlen($frombrowser_body).$nl
     .$nl
     .$frombrowser_body;

   break;

 default:
   error(
	 'Method not implemented',
	 '<p>Method '.$_SERVER['REQUEST_METHOD'].' not supported in cPanel '
.'Proxy, sorry.</p>'
	 );
   exit;
}

// Time to contact server and send request
$server = fsockopen($host, $port);
fputs($server, $frombrowser);


// Get server headers

if ($cgimode) {
  $firstline = fgets($server, 10240);
  $array = explode(' ', $firstline);
  $status = (int)$array[1];
  if ($status==401) {
    // Authentication needed, but HTTP authentication doesn't work in CGI-mode.
    header('Status: 200');
  } else {
    header($firstline);
  }

}


while (true) {
  $data = fgets($server, 10240); // FIXME: Can we optimize here with another buffer-size?
  if (strlen(trim($data))==0) break;

  // Fix hostname in redirects, cookies...
  $data = str_replace(
	      array('localhost:2095', 'localhost:2082', 'localhost:2086'),
	      array($webmailhost,      $cpanelhost,     $whmhost),
	      $data);
  if (substr($data, 0, 11) == 'Set-Cookie:') {
    $data = str_replace(
			'; domain=localhost', 
			'; domain='.$_SERVER['HTTP_HOST'], 
			$data);
  }

  header($data, false);
}

if($_SERVER['REQUEST_METHOD']=='HEAD') {
  exit;
}

// Get server body
$data = '';
while (true) {
  $line = fgets($server, 10240); // FIXME: Can we optimize here with another buffer-size?

  if (strlen($line)===0) break;
  // A line will never be completely empty, as it will end with a "newline". 
  // So if we get a completely empty line, there's no more data.

  if ($cgimode) {
    // Let's hide that ugly message. It's not the browser that doesn't support 
    // HTTP-Auth, it's CGI...
    $line = str_replace('If your browser does not support HTTP '
			.'Authentication, please use this form:','',$line);
  }

  // Fix hostname 
  $line = str_replace(
	      array('localhost:2095', 'localhost:2082', 'localhost:2086'),
	      array($webmailhost,      $cpanelhost,     $whmhost),
	      $line);

  $data .= preg_replace('_(\'|"|=)/webmail_', '$1/webmail_', $line);
  // This has heavy influence on chunk-size (for HTTP/1.1 to browser)
  if (strlen($data)>10240) { // FIXME: Can we optimize here with another buffer-size?
    echo $data;
    flush();
    $data = '';
  }
}
// $data is probably not empty.
echo $data;
?>
