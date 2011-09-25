---
author: Arun Bhai
date: '2009-07-21 11:27:37'
layout: post
slug: office-diff-open-source
status: publish
tags: [productivity, office, python, '2003', '2007', diff, open source]
title: 'Office Diff: An Open Source Diff for Office 2007 or 2003 documents'
wordpress_id: '151'
---

This Saturday, I started working on something that many of my colleagues had complained about a long time ago. They work on reports all the time and most of these reports have small changes in each version. They are only interested in seeing what changed rather than read the entire report.

You might suggest a lot of 'diff' tools which can do the job in either Word or Textpad. The issue was that they were working with Excel spreadsheets rather than text files and I couldn't find any free or open source solution for them. So I ended up creating a new tool called Office Diff. Interestingly, it handles not just Excel, but also all the Office 2007 and 2003 file formats plus PDF and HTML formats as well. It features an intuitive GUI interface and is completely written in Python.

The next best thing was to open source it. I am using the BSD licence. I found sourceforge a good choice because they support Bazaar, my version control of choice at the moment.

Please visit [Office Diff](http://officediff.sourceforge.net/) homepage for screenshots and check out the first release.
