---
author: Arun Bhai
date: '2008-07-16 21:03:59'
layout: post
slug: better-fonts-tip-biggest-improvement-in-ubuntu-appearance
status: publish
tags: [general]
title: 'Better Fonts Tip: Biggest Improvement in Ubuntu Appearance'
wordpress_id: '130'
---

Sometimes the biggest reason people choose Linux is that they can choose to change Linux they way they want. However, majority of the people believe that no matter how much you change/customize Linux it will never match the eye candy of other desktop OSes. Frankly I never thought that the font rendering in Ubuntu can match that of OSX or even Windows.

Until I came across this tip in Ubuntu Forums. I would say this is the single biggest improvement in the appearance of Ubuntu desktop. By just one command, you can improve the font rendering of virtually every application on Linux. Check out the following screenshot after implementing this tip:

<img src="/blog/img/fonts-ubuntu.png" alt="My Ubuntu desktop running Firefox, Gnome Terminal and Emacs after the font change"/>

The command is simply:

    sudo ln -sf /etc/fonts/conf.avail/10-autohint.conf /etc/fonts/conf.d/

Thanks to this [tip](http://ubuntuforums.org/showpost.php?p=4049873&postcount=172) I am still ogling at my Linux desktop  :shock:
