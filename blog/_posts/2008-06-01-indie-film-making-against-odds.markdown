---
author: Arun Bhai
date: '2008-06-01 14:23:10'
layout: post
slug: indie-film-making-against-odds
status: publish
tags: [technical, indie, general]
title: Indie Film Making against Odds
wordpress_id: '121'
---

Ittesbin is truly a spectacular time each year. It feels like college all over again. And many would swear that's not always a pretty sight. Sleep deprived zombies can be spotted around the campus at midnight tired from practice sessions. There are also the worker ant types who would be trying to collect every scrap they could get their hands on for making variety of props. And there are also the insomniacs who are just there to have a preview of the show and blabber some profane advice under the pretext of 'suggestions'.

Whatever it is, Ittesbin has always been an explosion of homegrown on stage entertainment within Infosys Mangalore. However from this time on, they introduced a new off-stage event called 'Video Making Competition'. The theme was 'My Infosys, My Mangalore'.

I took charge of our team and penned and directed a video over a period of three weeks (yes, almost whole of April!). It was a massive covert operation to shoot almost all of Mangalore without other teams getting a whiff of it. To see the result click on the link that follows

<!--more-->

<center>															<script type="text/javascript" src="http://blip.tv/scripts/pokkariPlayer.js?ver=2008010901"></script>					<script type="text/javascript" src="http://blip.tv/syndication/write_player?skin=js&posts_id=959217&source=3&autoplay=true&file_type=flv&player_width=&player_height="></script>					<div id="blip_movie_content_959217">					<a rel="enclosure" href="http://blip.tv/file/get/Wavecounter-MyInfyMyMangalore627.flv" onclick="play_blip_movie_959217(); return false;"><img title="Click to play" alt="Video thumbnail. Click to play"  src="http://blip.tv/file/get/Wavecounter-MyInfyMyMangalore627.flv.jpg" border="0" title="Click To Play" /></a>					<br />					<a rel="enclosure" href="http://blip.tv/file/get/Wavecounter-MyInfyMyMangalore627.flv" onclick="play_blip_movie_959217(); return false;">Click To Play</a>					</div>										</center>

It was a fantastic learning experience and I felt it would be only fair to share my production notes for all those aspiring film makers out there. Here goes my post-mortem:

* When I started I just didn't want to make another documentary video, I wanted to make a movie. Slowly everyone got excited with this idea. From church scenes to playing cricket, people pitched in a lot of very filmy but very large scale ideas. We were basically a bunch of movie crazed folks.

* I invented some camera movement using a tripod and paper sheet to create a dolly effect used in movies. Worked quite well

* We didn't want blood to look like ketchup, so we did a lot of research. I tried different easily available chemicals due to non availability of corn syrup. We ruined a couple of vessels at home in the process. But in the end, with lots of food color and cornflour the effect seemed to work.

* The crab was spotted in an unexpected place. I had picked the wrong angle to shoot the bridge scene and it was near a open field. I came across this crab on my way back. I followed it for a long time while the rest of the crew was waiting for me to shoot the sunset at the bridge before the sun sets!

* Voice intonation is never right because its very difficult to emote with voice more than with the visual. Voice is mostly too loud like a studio recording due to suppressing lower freq by an inferior mic. This stands out.

* Made a evening shot look like a night shot by color correction

* We faced a lot of problems while shooting:

	- Bharat Mall people refused to permit us to continue shooting without a letter. we got the letter but only 3 days later
	- At the beach the camera and backup camera failed 3-4 times due to various reasons and the sun was setting fast. It was Murphy at his best.
	- Getting hospital ready with no white bedsheet, we got a towel to cover the person and the nurse helped us to setup the drip and stand
	- Takes and retakes especially for the emotional, angry scenes. Most of the time the entire crew will be in a jolly mood and I will be brooding.
	- Getting all the people on location. Sometimes we need to revisit the site because the people are not there. Sometimes because I got too carried away after the last shot and blurt out "Its a packup, folks!"
	- Very little time to experiment with the equipment. I had started shooting the very next day I got the cam. I was learning as I started using it.
	- The video cam (JVC Everio, world's first hard disk drive camcorder) is not good at low light. we used still camera in such cases and it shows :(
	- Shooting in a non std video size. The 16:9 video size was not supported by many encoders and applications.

Movie making is like Software Development. The final product is purely dictated by time, there is never a perfect release. Everything has to be managed to fit in the available time without compromising the quality. There are lot of areas where I feel I could have improved like lighting or visual effects. But the shoe string budget and lack of time (almost all of us were slogging with aggressive deadlines at work) were the constraints. But the constraints themselves led to  creative ways to overcome them.

In a way the language of cinema requires a different way of thinking. The shots, scenes and transitions are the alphabets, words and punctuations of the language of movie making. I was surprised I was able to almost easily pick it up. The end product rarely deviates from the original written script. But I do realise that there is still a long way to go. And this is definitely not my last attempt :)

### Bonus Tip: Uploading to Youtube ###

The videos produced by the JVC camcorder are in .MOD format which are nothing but .MPG files. The finally edited MPG file was too big for upload both in terms of video file size and resolution. But if I compressed it to say Xvid it would be recompressed by Youtube. Also they don't add the black bars automatically, making my 16:9 videos squashed to fit the 4:3 aspect ratio.

In the end I had to download the [latest windows build of mencoder](http://oss.netfarm.it/mplayer-win32.php) and use the following 2 commands which resized the video, added the black bars, gave me the best results:

<div>
    [source:css]

    d:\mplayer\mencoder.exe "My Infosys, My Mangalore.mpg" -o myinfy.flv -mc 0 -ofps 25 -srate 44100 -oac mp3lame -lameopts vbr=2:q=8:aq=0:mode=1:lowpassfreq=17000 -ovc lavc -of lavf -lavfopts format=flv -vf scale=320:-2,harddup,unsharp=l3x3:0.7,crop=320:240,expand=320:240 -lavcopts vcodec=flv:vbitrate=236:keyint=125:mbd=2:trell:v4mv:cbp:last_pred=3:predia=4:dia=4:preme=2:vpass=1
    d:\mplayer\mencoder.exe "My Infosys, My Mangalore.mpg" -o myinfy.flv -mc 0 -ofps 25 -srate 44100 -oac mp3lame -lameopts vbr=2:q=8:aq=0:mode=1:lowpassfreq=17000 -ovc lavc -of lavf -lavfopts format=flv -vf scale=320:-2,harddup,unsharp=l3x3:0.7,crop=320:240,expand=320:240 -lavcopts vcodec=flv:vbitrate=236:keyint=125:mbd=2:trell:v4mv:cbp:last_pred=3:predia=4:dia=4:preme=2:vpass=2
    [/source]
</div>

As you can guess from the length of the commands, it took me a long time to figure out. So its worth mentioning it here for reference

#### Some good links on transcoding ####

1. <http://www.linuxjournal.com/article/9005>
2. <http://forum.videohelp.com/topic346256-240.html>
3. <http://forum.videohelp.com/topic345987.html>
4. <http://dinsdalepiranha.wordpress.com/2007/10/16/how-to-make-a-video-for-youtube-with-linux/>
5. <http://www.digital-digest.com/articles/MeGUI_H.264_Conversion_Guide_page1.html>
6. <http://news.softpedia.com/news/Convert-Movies-with-subtitles-for-your-PSP-on-Ubuntu-67806.shtml>
7. <http://gentoo-wiki.com/HOWTO_Mencoder_Introduction_Guide>
8. <http://web.njit.edu/all_topics/Prog_Lang_Docs/html/mplayer/encoding.html>
9. <http://videogeek.shacknet.nu/index.php?entry=entry070930-082742>
10. <http://mcebuddy.com/forums/p/312/1259.aspx>
