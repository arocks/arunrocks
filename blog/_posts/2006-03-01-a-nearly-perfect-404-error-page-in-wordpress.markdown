---
author: Arun Bhai
date: '2006-03-01 17:46:04'
layout: post
slug: a-nearly-perfect-404-error-page-in-wordpress
status: publish
tags: [technical, wordpress]
title: A Nearly Perfect 404 Error Page in WordPress
wordpress_id: '80'
---

<pre class="poetry">In this seemingly infinite Web
Oh! young browser thou slips
In the middle of a thousand trips
Realising what was just
The apparent reality of pages
Is nothing but a veil of certainity
404 alone is the absolute reality
-Arun</pre>
So a visitor to your website mistypes a URL, what does he see? A nearly blank page with '404 error' emblazoned over it? At least that was my case until I decided to do something about it.

So many great tutorials have been written on creating a 404 Error page. The best in my opinion is at [SacramentoWeb](http://www.sacramentoweb.org/archives/2005/12/01/62). However, the solution the author has proposed leads the user to a search box already filled with a value by second guessing what the user tried to search for. I was looking for a 404 page that *already* has those results below the search box.

After some research, I finally hacked up some PHP code. The result can be [already seen on my site](http://www.arunrocks.com/blog/python) and looks quite impressive. I mean I was quickly addicted to **misusing the feature** by performing random searches e.g. for hollywood stuff on my site I would try typing  !!!

Here is a quick summary of what to do for *any template* to display these results:

1. If you haven't modified your `.htaccess` file, then open it and copy paste the following as your first line

<code>ErrorDocument 404 /index.php?error=404 </code>

2. Copy `index.php` from your template and rename it to `404.php` in the same directory

3. Remove all sections dealing with posts or comments. Roughly the lines between `< ?php if ( have_posts() )` and ``

4. Copy the following line to the first line of `404.php`. This is to help search engine spiders indicate that this is an error page.

header("HTTP/1.0 404 Not Found");

5. You can write pretty much anything in this page. Or you can download my [404 page](/blog/downloads/404-php.txt) from here

6. Thats it!

Check out the results, I'm sure you (and your visitors) would be able appreciate the improvements in the browsing experience.
