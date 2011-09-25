---
author: Arun Bhai
date: '2008-06-10 15:52:52'
layout: post
slug: emacs-tip-a-key-to-open-the-current-folder-in-windows
status: publish
tags: [technical, emacs, general]
title: 'Emacs Tip: A Key to open the Current Folder in Windows'
wordpress_id: '122'
---

If the over-descriptive title was not enough, this is another one of my tips to use my favorite editor - Emacs. Some of you really liked my [earlier post on Emacs tips on Windows](http://www.arunrocks.com/blog/archives/2008/02/20/5-indespensible-tips-for-emacs-on-windows/), so here is one more tip to improve your productivity.

Most of the time while editing a document, we need to quickly browse the folder of that file. Add the following lines to your `.emacs` files and so that by just pressing function key F12 you can immediately view its corresponding folder:

{% highlight scheme %}
    ;; explorer
    ;; ----------
    ;;; Windows explorer to open current file - Arun Ravindran

    (defun explorer ()
      "Launch the windows explorer in the current directory and selects current file"
      (interactive)
      (w32-shell-execute
       "open"
       "explorer"
       (concat "/e,/select," (convert-standard-filename buffer-file-name))))

    (global-set-key [f12]         'explorer)        ; F12 - Open Explorer for the current file path
{% endhighlight %}


A nice extra is that the opened explorer will have the current file automatically selected. Press F12 once in a while, it quickly becomes addictive ;)
