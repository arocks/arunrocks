---
author: Arun Bhai
date: '2009-12-15 21:24:01'
layout: post
slug: managing-creative-assets-3-tortoisehg-tutorial
status: publish
tags: [tortoisehg, productivity, mercurial, version control, creativity, featured,
  distributed version control, lifehacks, backup, hg]
title: 'Managing Creative Assets - 3: TortoiseHg Tutorial'
wordpress_id: '177'
---

*Managing Creative Assets is a multi-part series on how you can manage your creative works such as a novel or even blog post without impairing your creativity. It highlights the importance of using a version control system as an integral part of one's creative workflow. [Part 1][Part1] gives a good introduction to the series which is aimed at technology novices*

[Part1]: /blog/archives/2009/12/13/managing-creative-assets-1/

## Getting started with Mercurial: A tutorial

The concluding part of this series will be the installation and typical usage of Tortoise Mercurial, a user friendly GUI front-end for Mercurial. It is commonly referred to as TortoiseHg (the chemical symbol for mercury).

This will be a fairly simple tutorial to follow as each description is followed by a screenshot. These screenshots were taken on Windows XP, but they will be pretty similar in other OSes

Download Tortoise mercurial from the [Bitbucket site][tort]. There are installables for Windows as well as for Linux. Installation on Windows is fairly straightforward as it is wizard-based.

[tort]: http://tortoisehg.bitbucket.org/

<!--more-->

1. Create a new folder for keeping your art assets. This will be your project folder. In this screenshot (click for a larger image), I have created a project folder for the purpose of composing this series of blog posts. Simply right-click, and select 'Create Repository here' under the TortoiseHg sub-menu:

   <a href="http://www.flickr.com/photos/arun_ravindran/4181869236/" title="010 - Create.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2717/4181869236_49236ff611.jpg" width="500" height="307" alt="010 - Create.png" /></a>

2. The defaults in the 'Create Repository' dialogs are fine. Just click Create.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181105481/" title="020 - Create Dialog.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2533/4181105481_54e6cdc708.jpg" width="500" height="307" alt="020 - Create Dialog.png" /></a>

3. The new repository has been created. That was easy, wasn't it?

   <a href="http://www.flickr.com/photos/arun_ravindran/4181870162/" title="030 - Created.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2561/4181870162_5930954fe5.jpg" width="500" height="307" alt="030 - Created.png" /></a>

4. Now, enter the project folder and view the changes. On some OSes, you might see nothing here. These files are not intended to be seen or modified, hence they might be hidden. You can safely ignore them.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181106163/" title="040 - Project folder.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2593/4181106163_032fa85c9a.jpg" width="500" height="307" alt="040 - Project folder.png" /></a>

5. This is a screenshot of a new file that I am editing (using Emacs editor) inside the project folder. I am ready to check-in this file.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181106501/" title="050 - New File on Emacs.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2642/4181106501_2d51984a2b.jpg" width="500" height="307" alt="050 - New File on Emacs.png" /></a>

6. Now, you will need to add this new file to your repository. Let's skip that and directly perform a commit. We will be later given a chance to add this file.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181107011/" title="060 - First Commit.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2584/4181107011_abfcdcda18.jpg" width="500" height="307" alt="060 - First Commit.png" /></a>

7. Here you can see our newly added file as unchecked. This means that this file is not yet under version control

   <a href="http://www.flickr.com/photos/arun_ravindran/4181107577/" title="070 - Commit Dialog.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2640/4181107577_1b15f33da9.jpg" width="500" height="307" alt="070 - Commit Dialog.png" /></a>

8. Go ahead and mark the check box next to this file

   <a href="http://www.flickr.com/photos/arun_ravindran/4181872344/" title="080 - Commit Dialog File Added.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2742/4181872344_85b8b75702.jpg" width="500" height="307" alt="080 - Commit Dialog File Added.png" /></a>

9. In the edit box above, you can add a short comment about this commit. Since this is the initial commit, my comment is simply 'First Commit'

   <a href="http://www.flickr.com/photos/arun_ravindran/4181872914/" title="090 - Commit Dialog Comment Added.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2525/4181872914_5bb16f7ef4.jpg" width="500" height="307" alt="090 - Commit Dialog Comment Added.png" /></a>

10. Mercurial acknowledges the successful commit with the name(s) of the committed files

   <a href="http://www.flickr.com/photos/arun_ravindran/4181873328/" title="100 - Commited.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2787/4181873328_f9b5679aa6.jpg" width="500" height="307" alt="100 - Commited.png" /></a>

11. Notice that your file has a green tick icon indicating a successful check-in

   <a href="http://www.flickr.com/photos/arun_ravindran/4181873800/" title="110 - Overlay Icons Added.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2694/4181873800_a8dba47e66.jpg" width="500" height="307" alt="110 - Overlay Icons Added.png" /></a>

12. Many hours and many check-ins later, my post is nearly close to completion. I commit this version as well.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181110111/" title="115 - Emacs Final Screen.png by ArunClickClick, on Flickr"><img src="http://farm5.static.flickr.com/4046/4181110111_35e674f04e.jpg" width="500" height="307" alt="115 - Emacs Final Screen.png" /></a>

13. In the commit dialog, notice the Repository Explorer in the menu.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181110473/" title="120 - Going to repo explorer.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2782/4181110473_ea679486fb.jpg" width="500" height="307" alt="120 - Going to repo explorer.png" /></a>

14. You can view the history of changes in reverse chronological order. You can right click on any of them to compare the changes or revert back to an earlier version.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181874988/" title="130 - Repo explorer.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2717/4181874988_7862e514c3.jpg" width="500" height="307" alt="130 - Repo explorer.png" /></a>

15. Simply clicking on each version will show the diff (in UNIX format) between the consecutive versions in the lower right window.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181111117/" title="140 - Repo explorer shows changes.png by ArunClickClick, on Flickr"><img src="http://farm5.static.flickr.com/4037/4181111117_d14c136f13.jpg" width="500" height="307" alt="140 - Repo explorer shows changes.png" /></a>

16. You can perform a revert by selecting the Revert option.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181111507/" title="150 - Reverting.png by ArunClickClick, on Flickr"><img src="http://farm5.static.flickr.com/4047/4181111507_22932a06b3.jpg" width="500" height="307" alt="150 - Reverting.png" /></a>

17. As indicated by the warning, your current file will be overwritten to an older version. But subsequently you can revert to the latest version as well, so this is not too much of an issue.

   <a href="http://www.flickr.com/photos/arun_ravindran/4181111829/" title="160 - Revert Confirm.png by ArunClickClick, on Flickr"><img src="http://farm3.static.flickr.com/2656/4181111829_873917d61a.jpg" width="500" height="307" alt="160 - Revert Confirm.png" /></a>

That's pretty much all you need to know to use Tortoise Hg. Hope you found this series informative!
