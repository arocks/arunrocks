---
layout: post
title: Building a blog in 30 mins with Django (Screencast)
date: 2012-03-05 22:40:05
tags: [screencast, django, python, programming, tutorial]
---

Just uploaded a quick screencast showing how to build a blog in [Django](https://www.djangoproject.com/) in just 30 minutes (plus a couple of seconds :) ). It shows off a lot of new features that we have in Django since 1.2. 

It basically covers:

- Using `django.contrib.admin` to create fully-featured admin pages
- Adding tags to posts easily using [taggit][taggit] app
- Class-based generic views for rapidly building pages (New in Django 1.3)
- Using template inheritance and filters
- Leveraging `django.contrib.syndication` for a simple feed

<a href="http://www.youtube.com/watch?v=srHZoj3ASmk&hd=1"><img src="/blog/img/django-blog.jpg" width="385" height="365" alt="Building a blog in 30 mins with Django (Screencast)" title="Building a blog in 30 mins with Django (Screencast)" class="alignright"/></a>

It is best to watch it directly at [Youtube](http://www.youtube.com/watch?v=srHZoj3ASmk&hd=1) in HD. This was my first screencast so I apologize if something is not properly done. 

I plan to add a short bonus video soon demonstrating how this bare-bones blog can be restyled into a modern-looking HTML5 site (__UPDATE:__ [Bonus video][bonus] is up now).  

__UPDATE:__ The source code for the created project has been uploaded to [github](https://github.com/arocks/django-blog-screencast) 

[taggit]: https://github.com/alex/django-taggit/
[bonus]: http://arunrocks.com/blog/2012/03/07/bonus_html5_makeover_for_the_django_blog/
