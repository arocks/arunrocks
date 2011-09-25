---
author: Arun Bhai
date: '2011-03-27 23:18:41'
layout: post
slug: learning-oop-programming-in-c-a-horror-story
status: publish
tags: [teaching, pedagogy, programming, oop]
title: Learning OOP Programming in C++ - A Horror Story
wordpress_id: '402'
---

During my school days, we had a subject called Computer Science in our +1 syllabus. The CBSE syllabus had been just updated that year to teach people to programming in C++ as their first language. This was a _horrible_ decision in many respects:

1. **OOP is not the best approach for all types of problems:** I know that most of the readers would be surprised by this statement. It's not very hard to prove that OOP was originated to model certain kinds of problem spaces resembling Simulation. The granddaddy of all OOP languages is a self-descriptively named language called SIMULA. But in the nineties people began to take up OOP as a religion. Every problem seemed to best modelled only in Object Dis-oriented Programming. 

    Back to my school where most people were learning to program, they had to tackle the dual challenges of - understanding a programming language and learning to model problems in OOP. So, a simple 5 line calculator program would turn out be pages of class definitions like Calculator, Operator etc. A recent article shows why [New Programmers get distracted with OOP][1]. 
    
    ![K&R C book][9] 

2. **C++ is a nightmarish language:** I presume that the curriculum board must have assumed that C is a widespread language and C++ being its successor, it would a suitable choice for students. However, a quick look at the language reference would prove them wrong. The canonical guide to C is the slim [K&R book][2] having 272 pages, while the [C++ Annotated Reference][3] spreadout in cryptic 480 pages is a monstrosity. 

    C++ was the language even experts couldn't fully master then and the situation has barely improved now. Many organisations use only a subset of the language (including [Google][4]) due to the immense complexity of the entire language. My advice to newcomers, unless you are the rare exception, is definitely to: _Stay clear of C++ or get bogged down_.

3. **Interactivity:** For learning a language, nothing works better than a fast write-run cycle. We used Turbo C++ compiler on Windows 3.1 back then (most Indian colleges still use them _\*shudder\*_) and it had a pretty decent turnaround time for small programs. But as the programs grew, the compilation time used to take several seconds. This puts off the impatient learner quickly. An interpreter is a much better choice for students. Not only the feedback is instantaneous, you can examine or modify state at any point in time.

    I learnt programming in BASIC. Though the language was not the fastest or the most expressive, it responded nearly instantly when you entered commands. It was almost as if you had a machine that you can instruct to fetch something or do some trivial task like that and it would immediately do it. As long as you can tell it enough smaller such tasks to accomplish bigger tasks, it can happily keep doing exactly what you want it to do. This, in many ways, is exactly the essence of the act of programming.

    Most of the time, I miss the interactive experience in a compiled language as it seems that the feedback loop is unnaturally long. I can only imagine how boring it might have been to learn programming in them.

    My advice to people who want to learn or teach programming would be to pick either [Python ][5] or [Processing][6]. These languages have been specifically designed for pedagogy and hence, will ensure a smoother learning curve. Don't focus on OOP from the start, encourage them to solve problems with the least amount of code. Even going forward, they would realise that _less code often translates to less errors_. 

### OOPs I did it again!

Actually I had written this rant about OOP a few weeks back. I am not sure how <del datetime="2011-03-28T10:00:47+00:00">MIT</del> CMU folks caught the wind of it (must be those damn Paparazzis :)), but they have completely [removed Object Oriented Programming from the introductory <del datetime="2011-03-28T10:00:47+00:00">MIT</del> CMU curriculum][8]. I am sure some of the best minds in Computer Science are at work here and I am glad that they have taken the right step. 

Surely concepts of OOP would be useful to their students in the future and they would need to learn it at some point in time. But, as I have realised, it is too much of an overhead to use OOP while learning programming. There is nothing better than typing in a few line of terse code and watching it immediately turn into something magical . In that respect, OOP is neither terse nor magical. 

**PS:** Even when MIT switched from Scheme to Python for their freshman courses, I remember having made a post about Python a few days before the announcement. The timing of these announcements are getting freaky now :) 

**PPS:** Thanks to the sharp readers for pointing out that the curriculum change was in CMU rather than MIT

   [1]: http://prog21.dadgum.com/93.html
   [2]: http://www.amazon.com/Programming-Language-2nd-Brian-Kernighan/dp/0131103628/ref=pd_rhf_p_t_1
   [3]: http://www.amazon.com/Annotated-C-Reference-Manual/dp/0201514591
   [4]: http://google-styleguide.googlecode.com/svn/trunk/cppguide.xml
   [5]: http://www.python.org/
   [6]: http://www.processing.org/
   [7]: http://blogs.ad.infosys.com/users/arunv_ravindran/96193.html
   [8]: http://existentialtype.wordpress.com/2011/03/15/teaching-fp-to-freshmen/
   [9]: /blog/img/knr_book_C.png "Slim and Handy K&amp;R book"
