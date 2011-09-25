---
author: Arun Bhai
date: '2008-08-30 23:13:54'
layout: post
slug: workaround-to-easy-install-pil-on-windows
status: publish
tags: [python, django]
title: Workaround to Easy Install PIL on Windows
wordpress_id: '133'
---

This is a quick workaround for people who are using [easy_install](http://peak.telecommunity.com/DevCenter/EasyInstall) to install Python Imaging Library on Windows. Many people faced issues while doing this. I found a simple workaround for this.

You must have tried the following

    C:> easy_install PIL
    Searching for PIL
    ...
    Finished processing dependencies for PIL
    C:> python
    Python 2.5.2 (r252:60911, Feb 21 2008, 13:11:45) [MSC v.1310 32 bit (Intel)] on
    win32
    Type "help", "copyright", "credits" or "license" for more information.
    >>> import Image
    Traceback (most recent call last):
      File "<stdin>", line 1, in <module>
    ImportError: No module named Image


Now you will need to go to your site-packages directory (typically at C:\Python\Lib\site-packages) and change one line that starts with `./PIL-1.1.6-py2.5-win32.egg` to simply `./PIL` and change the sub-directory named similarly to `PIL`

Now your imports should work :smile:
