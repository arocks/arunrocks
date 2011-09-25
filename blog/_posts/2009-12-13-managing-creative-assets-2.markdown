---
author: Arun Bhai
date: '2009-12-13 21:31:29'
layout: post
slug: managing-creative-assets-2
status: publish
tags: [version control, git, productivity, mercurial, creativity, distributed version
    control, lifehacks, bazaar, backup, hg]
title: 'Managing Creative Assets - 2: Distributed Version Control Systems'
wordpress_id: '171'
---

*Managing Creative Assets is a multi-part series on how you can manage your creative works such as a novel or even blog post without impairing your creativity. It highlights the importance of using a version control system as an integral part of one's creative workflow. [Part 1][Part1] gives a good introduction to the series which is aimed at technology novices*

[Part1]: /blog/archives/2009/12/13/managing-creative-assets-1/

## Who started the Fire?

In April 7, 2005, Linus Torvalds wanted to use a version control system to replace the proprietary BitKeeper system for developing Linux Kernel. He absolutely hated CVS (the version control system in vogue then) with a passion. So, he did what he did best, he wrote his own. This resulted in the release of a version control system called git.

The development of git led to a sudden interest in distributed version control systems (DVCS). Though it was not the first of its kind (earlier open-source DVCS existed like Arch and Monotone), it was the first mainstream DVCS.

Today, one of the first choices you need to make while selecting a version control system is whether it is centralised or distributed. Let's understand this from own unique stand-point i.e. for managing creative assets.

### Why I do not advice VSS, Subversion or a Central Version Control

What is a Centralised Version Control (CVC)? The odds are that most of the version control systems that you might have heard of are Centralised for e.g. VSS (Microsoft Visual Sourcesafe), CVS, RCS, Clearcase or Subversion.

If you are planning to use a version control for personal use involving no or minimal collaboration with others, I would strongly recommend not to use a centralised version control system. You can skip to the next section, if you don't want a detailed set of reasons on why I recommend non-centralised version control.

The reasons I would cite here are a mix of usability issues and technical limitations. The usability issues are subjective but I am sure many find them genuinely annoying. I am making an assumption that since this is for personal version control management, so your CVC server would probably be installed locally. The problems are:

1. **Everything is stored inside repositories**: Adding your project to a CVC effectively creates a duplicate layout of your project inside the CVC server. For e.g. if you created your subversion repository within `C:\svn`, all your projects will be kept inside this folder. You will have to maintain another filesystem inside this server using arcane commands.

   In a distributed version control system, you simply manage the project directory inside your normal filesystem. All the version controlled files will still be inside the project directory. This is quite useful since your project directory can be moved to a different location easily and the version history will be completely intact.

2. **Server must be always running**: If you have installed VSS or SVN locally, you must always remember to start the server. This can be configured to run as a service, but you will need admin privileges for this. This is not required in a distributed version control.

3. **Offline activity cannot be checked-in**: This is an oft-quoted technical limitation. You need your svn server running to make any check-ins or check-outs, making it considerably less useful whenever you are offline. But this is less of an issue in our case, since I assume the svn server is installed locally.

4. **Remembering to checkout immediately after you import or check-in**: Ever had the feeling that your files magically disappeared only to realise that you haven't checked out? This is an irritating 'feature' of CVS. The files appear and disappear as you check in and out. Even worse is that they are sometimes read-only and sometimes writeable. This is confusing and irritating from a usability standpoint.

   Apparently, most people leave their relevant files checked out at all times to avoid this confusion. But that would defeat the purpose. In a distributed version control, the files are always present where you expect them to be. This leads to less confusion and a world of improvement in terms of usability.

5. **Weird layout**: Ever seen a funny looking directory structure with `truck`, `branches` and `tags` directories? Then you might be looking at a project under SVN. Ever wondered which directory actually contains your code? The right answer is `trunk`. I am not sure, if this is  the most intuitive structure possible.

6. **Distributed Version Control is a superset**: This should have been my first point, almost [every centralised workflow can be now supported][workflows] by Distributed Version Control. You can still upload (or "push") stuff from your branches to the project's central server.

If you are still not convinced and still prefer centralised version control, check out [the easiest way to setup subversion in Windows][svnsetup] written by Jeff Croft.

[svnsetup]: http://www.codinghorror.com/blog/archives/001093.html "Setting up svn and TortoiseSVN in Windows"
[workflows]: http://bazaar-vcs.org/Workflows "Different kinds of workflow on Bazaar"

### Distributed Sounds Complex

It is a common misconception that Distributed Version Control systems are difficult to use and hard to understand. In many ways, the concepts are simpler than traditional version control systems from a beginner's perspective.

Assume that the files (say documents or images) related to your project are kept under a particular directory. This is called the Project folder. Traditionally, your project folder will be stored in a central server. Hence the name *centralised* version control.

Whenever you would need to use a particular file within this folder, you will need to check-out and once you have reached some logical point (say after adding a few paragraphs in your essay or sketching the torso of a toon) you would check-in. 

These check-ins are like check-points. More check-points you add, the more finer undo history you will get. Fewer check-points will mean that there will be a lot of differences from one check-in to another making it less useful.

As you might have guessed, every time you need to check-in or check-out you will need to connect to the server. Hence, practically, you will need the server (installed on your machine or elsewhere) up and running at all times.

If someone else would like to work with you on the same project, they will need to connect to your server. If they would like to work on the same files that you are working on (a rare case), they would need to create a branch and work on the branch.

This collaborative scenario is slightly different when you are working with a DVCS.

#### What About Distributed?

In a distributed version control system, your friend would rather clone your entire project than branch it. After creating a clone, his copy will be identical to your repository in every way. It will have the entire version history intact.

He no longer needs to be connect to your repository, he can work independently. In fact, there is really no need for a server in DVCS. The repository is actually created within the project folder.

For instance, let's take the initial scenario. You would like to add your project folder to version control. In a DVCS, the project folder is slightly modified to add some additional information (meta-data) which is typically hidden from the user. Hence, your project folder remains mostly intact and it doesn't have to move into a server.

In short, the defining feature of DVCS is that there can be more than one "central" repository for the same project. In case, your repository gets nuked, the cloned repository with your friend is always available as a perfect clone. To quote:

> "Only wimps use tape backup: _real_ men just upload their important stuff on ftp, and let the rest of the world mirror it ;)" -- Linus Torvalds (1996-07-20)


### Types of DVCS

These are the popular open-source DVCS available:

- **Git** - Very fast DVCS by Linus which runs on UNIX but has a weak port to Windows.
- **Mercurial** - Fast cross-platform DVCS by Matt Mackall of Selenic. Partly written in Python
- **Bazaar** - User friendly cross-platform DVCS by Canonical (of Ubuntu fame). Written in pure Python

Selecting a DVCS, like most things, is a personal choice. So, you might want to read a more [detailed comparison][infoq] before making a choice. I would be explaining Mercurial in my [next article](http://www.arunrocks.com/blog/archives/2009/12/15/managing-creative-assets-3-tortoisehg-tutorial/) because it has a nice selection of all the desired features.

[infoq]: http://www.infoq.com/articles/dvcs-guide "InfoQ's guide to Distributed Version Control Systems"

*Do comment if you found DVCS more interesting or otherwise...*
