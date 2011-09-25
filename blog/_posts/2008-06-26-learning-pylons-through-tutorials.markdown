---
author: Arun Bhai
date: '2008-06-26 22:48:50'
layout: post
slug: learning-pylons-through-tutorials
status: publish
tags: [featured]
title: Learning Pylons Through Tutorials
wordpress_id: '128'
---

Web Development is now getting dominated by frameworks. After the initial hype of Rails, Python based frameworks are getting more popularity especially after the release of Google App Engine. Nobody seems to be interested in building websites using PHP, even if they are highly experienced in PHP. This could mean two things:

1. There will be more demand in Indian IT companies for PHP skills similar to Perl scripting skills these days  :mrgreen:
2. There will be soon be a viable competitor to the immensely popular Wordpress blogging platform from the Python/Ruby world

I have nothing against Wordpress. In fact, it is one of the easiest tools to deploy. But with tools like cPanel, deployment could be no longer a deciding factor for blogging platforms.

Coming back to the topic of Python Web Frameworks, there is a multitude of options. I have used some of these framworks and found them to be 'pythonic' in different ways:

* **Django** Well documented. Tightly Coupled and 'Batteries Included'
* **Pylons** Extremely flexibility to Plug and Play components. 'Fun to Hack'
* **web.py** Great for beginners. Entire framework 'fits in your head'

Pylons looks most appealing to me. So far it looks like the underdog largely overshadowed by Django's presence lacking the [marketing](http://www.jacobian.org/writing/2006/jan/27/why-django/) or [love](http://www.djangoproject.com/weblog/2006/aug/07/guidointerview/) it deserves. A few weeks back I would have complained about the lack of Pylons tutorials on the web. A google search brought up several links pointing to the wiki tutorial. As many have pointed out, the wiki tutorial is too long and complicated for beginners. It would easily put off a beginner. It took me quite some time to realise that the best place to start learning Pylons is the [Pylons Documentation](http://bel-epa.com/pylonsdocs/) itself and the best Pylons tutorial is the [Flickr Search](http://bel-epa.com/pylonsdocs/tutorials/flickr_search_tutorial.html). Going through the documentation is almost feels like reading a book with every concept explained in detail.

Pylons currently seems to the having an edge over Django for enterprise application due to its well tested interface with SQLAlchemy. Django seems to be having a fairly recent [branch](http://code.google.com/p/django-sqlalchemy/) for SQLAlchemy integration. Pylons typically uses Python eggs and VirtualEnv for deployment which is might seem a little complex to beginners, but once you try it once it is actually quite convenient. Most of the installation can be done from the command-line and it will be nearly an independent sandbox for Pylons development. However it might take sometime to understand other aspects of using python eggs such as uninstallation and creation of new eggs. I haven't had much success with making a portable version of my Pylons installation on Windows though :(

My favourite templating engine is Genshi because it is very designer friendly(which also means it works with the tools a Designer has, not just that it is easy for a Designer to learn). I can easily do all HTML designing directly on my Genshi templates because they are valid HTML or XML documents. Almost all of Genshi's logic can be hidden away as attributes which is a great idea. In fact, the templates are even valid XML which makes the creation of valid HTML pages a much more natural experience. Almost all XML tools and even HTML tools like Tidy will work flawlessly on Genshi templates due to these reasons.

Once you get used to Genshi's templates, you might even use them for static web site designing. I am sure it will save you a lot of time whenever those last minute 'sidebar redesigns for every page' pops up.
