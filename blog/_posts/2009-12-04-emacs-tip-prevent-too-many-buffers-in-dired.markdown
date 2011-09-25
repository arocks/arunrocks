---
author: Arun Bhai
date: '2009-12-04 15:17:26'
layout: post
slug: emacs-tip-prevent-too-many-buffers-in-dired
status: publish
tags: [productivity, emacs]
title: 'Emacs tip: Prevent too many buffers in Dired'
wordpress_id: '158'
---

This is for the users of the <a href="http://en.wikipedia.org/wiki/Emacs">Emacs</a> editor

<a href="http://www.emacswiki.org/emacs/DiredMode">Dired mode </a> is the default way of visiting directories on Emacs. Whenever you open a file using <code>C-x C-f</code>, you would see the current directory. If you chose to press Enter without entering a file name, you would visit the current directory in Dired mode.

I don't use the Dired mode very much to browse directories. I would rather use Windows explorer or Nautilus. Don't get me wrong, I do find Dired extremely useful to locate a file. But for every directory you visit it adds a new buffer. This quickly becomes very unmanageable.

However, I recently found out that you can make Dired re-use the same buffer if you press <code>a</code> (<code>dired-find-alternate-file</code>) rather than 'Enter' for visiting a directory in Dired mode. This is can be even used to open a file which results in the last Dired buffer being completely removed (alternatively you can use <code>v</code> or <code>dired-view-file </code> to view a read-only version of the file).

With this tip, I am finding myself using Emacs more for browsing around my file system.
