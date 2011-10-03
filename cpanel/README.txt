cPanel Proxy 0.4.1
http://cpanelproxy.net/

Purpose: Give access to cPanel (including webmail and WHM) at port 80 by 
         acting like a proxy. (For people behind strict firewalls)
         This can be installed by server owner, reseller or end-users.

Author:  Niels Andersen <niels@myplace.dk>


THIS IS RELEASED IN PUBLIC DOMAIN, BUT I HOPE YOU WILL:
- Send me an email if you use this (specially if you are a host)
- Send me improvements if you make any
- Update this text if you change the script
- Don't change this text otherwise, specially I hope you will keep my 
  email-address and the url

Installation instructions:
- Create subdomain "cpanel.yourdomain.com" (You'll probably need access to 
  cPanel for this, so install it before you need it!)
- Download and unzip cPanelProxy.zip (if you haven't already)
- Upload the files to the subdomains directory, probably "public_html/cpanel" 
  in FTP. Be sure to remember .htaccess!
  Needed files: cpanelproxy.php .htaccess php.ini

Install for webmail and whm:
- Repeat with "webmail" in stead of "cpanel" in subdomain and directory.
- Repeat with "whm" in stead of "cpanel" in subdomain and directory.

Auto Installer:
- A new feature on the website makes it easier to install cPanel Proxy, and
  you can even do it thru your firewall. All you need to do is to enter your
  cPanel login information, at the auto installer will take care of the rest.
  http://cpanelproxy.net/autoinstaller

Known problems: 
- No https
- cPanel will say that you are logging in from "localhost". This may be
  considered a security problem by some people.

Other suggestions for improvement:
- Persistent sockets
- Adjust buffer-sizes (currently they are all 10240)


Changelog:

0.1 (2003-10-15) (not released)
- Just a quick hack, but it works.

0.2 (2003-10-22)
- Nicer code
- Lots of comments
- Documentation
- Better error-messages

0.3 (2003-11-01)
- Made support for uploading files
- Minor adjustments

0.3.1 (2003-12-06)
- Bugfix: Forms with content-type "multipart/form-data" and no files didn't 
  work. For example, you couldn't add memos in Horde. Thank you for 
  reporting this bug.

0.4 (2004-06-13)
- Hide HTTP Authentification, as it won't work in CGI mode 
- Allow more than 1 cookie from server
- Always preserve Content-type from browser
- Better hostname correction in data from server
- Now supports servers with PHP in CGI mode and php suexec
- Hovering over "Home" icon in webmail frontpage display image correctly
- Different (better?) install procedure
- Documentation in separate file
Thank you all bug reporters!

0.4.1 (2004-06-26)
- New homepage location ( http://cpanelproxy.net/ )
  References in README and script updated
- Autoinstaller is mentioned in README
