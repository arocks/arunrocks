---
author: Arun Bhai
date: '2006-02-15 18:08:19'
layout: post
slug: reverse-a-javascript-game-in-24-hours
status: publish
tags: [dhtml, dom, javascript, programming, innerhtml, game]
title: 'Reverse : A Javascript Game in 24 hours'
wordpress_id: '75'
---

**My 75th post!** (or so says my Wordpress engine), a big thank you to all those who have visited my little space on this sea of information. Is it now due to move to [Wordpress 2.0](http://wordpress.org/development/2006/01/201-release/)? I've read all the enhancements and me don't think so :)

With more and more projects like [Basecamp](www.basecamphq.com/) and [Gmail](http://www.gmail.com), the application space within a browser is limited only by ones imagination. If AJAX sounds greek to you, probably you might not have heard about all the excitement behind it. Basecamp is already net's most favourite Project Management tool. And you would really need to get out of that rock if you haven't heard of Gmail.

As a budding game developer I'm quite frankly petrified by the alarming growth of such web based apps (this includes [Flash](http://www.macromedia.com/software/flash/ "Macromedia Flash") based and Javascript based apps). These days I'm sceptical if a gamer would download a zip file or (*shudder*) an EXE file and go through the installation to just try a game. All the while when there are many of your favourite games like [Pac-man (-clone)](http://www.codingforums.com/showthread.php?t=71268) and [Lemmings](http://www.elizium.nu/scripts/lemmings/) already ready for you to play. Well, I guess hard-core gamers would be put off by the slow interactions within a browser, but playing speed might just be a question of time.

Anyways, I've decided to try my hand at some cool javascript coding. Right from the moment I discovered the game at [E-Scribe](http://e-scribe.com/news/193) I found it quite addictive. I just had to finish coding it. In fact, it must have actually taken me less than 5 hours to code, design artwork and test (in 3 browsers - [IE](http://www.microsoft.com/windows/ie/), [Firefox](http://www.mozilla.com/firefox/) and [Safari](http://www.apple.com/macosx/features/safari/) !!!) meanwhile sippping tea over endless discussion in the foodcourt ;).

For the impatient the game below is ready to play, so try it online, try it now ;)

Rules
====

The objective is to arrange the some jumbled numbers into numbers in increasing order. At each step all you can do is click on a number. As a result all the numbers to the left of the number including the number will be reversed.

For example, if the current list is 2 3 4 5 1 6 7 8 9 and you reverse 4, the result will be 5 4 3 2 1 6 7 8 9. Now if you reverse 5, you win.

Play here, now!
===========

<iframe src="/downloads/reversegame/reverse-js-game.html" width = "420" height="100" frameborder="0" scrolling="no">
</iframe>

"Reverse" in your website?
==================

Simple! Just copy paste the following code in your site

    <iframe src="/downloads/reversegame/reverse-js-game.html"
    width = "420" height="100" frameborder="0" scrolling="no">
    </iframe>

Please give due credits. The code is release under the [GNU General Public License](http://www.gnu.org/copyleft/gpl.html)

Learnings
========

*This section would be of interest only to Javascript developers*
Some interesting lessons learnt whilst developing this game are:

+ **IDE**: Mozilla Firefox is an excellent platform to develop JavaScript apps thanks to the *DOM Inspector* and clickable *JavaScript console*
+ **Presentation**: End output is very professional and customizable. This is due to usage of CSS which very effectively separates presentation from design. For eg: I can make any number of "skins" for this game. Also traditional game art resources such as fonts are already present "out of the box"
+ **Paradigm**: Out of the box event handling model need some getting used to, especially for new programmers. This is especially true for timer code which I would expect most games to use extensively.
+ **innerHTML**: `innerHTML` is not fully crossplatform. It is very useful for debugging hence was often used in alert boxes. Use for node creation use DOM functions such as `createElement` or ` appendChild`
+ **Animation**: This was one of the primary reasons I wanted to turn the text based game in [E-Scribe](http://e-scribe.com/news/193) to a graphical one. It was no clear which digits were being swapped. Rather than go for a full blown fading/translating animation, I opted for a simple blink. As a result the gameplay is faster and more responsive.

[tag]Programming, Javascript, Game, DHTML, DOM, innerHTML[/tag] 
