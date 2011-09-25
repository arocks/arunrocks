---
author: Arun Bhai
date: '2005-08-12 17:29:52'
layout: post
slug: windowspython-integration-like-unix-shell
status: publish
tags: [python, technical, general]
title: Windows+Python Integration Like Unix shell
wordpress_id: '69'
---

Remember how in UNIX how easy it was to run [python][1] scripts? Just type name of the script. No need to even type the extension .py

I got soon fed up with typing

    C: > python foo.py

in windows. Digging up some [Microsoft documentation][2], I soon found a way to simply type

    C: > foo

and make it work. How? read on...

All you need is to create a batchfile, say 'startme.bat' with the two lines

    ASSOC .py=PythonScript
    FTYPE PythonScript=python.exe %1 %*
    set PATHEXT=.py;%PATHEXT%

If you want this to be the default behaviour everywhere, put this in 'autoexec.bat'. But wait, we have a better way to do this. You can make 'startme.bat' work like '.bashrc' in UNIX by registry hack. Create a REG file, say 'cmd-changer.reg' with the contents:

    REGEDIT4
    [HKEY_LOCAL_MACHINE\Software\Microsoft\Command Processor]
    "AutoRun"="startme.bat"

Now opening this file will merge it to the registry. Now 'startme.bat' will be run every time you open the command prompt say by typing 'cmd.exe' in the Run command box. Hope this helps!

[1]: http://www.python.org/
[2]: http://www.microsoft.com/resources/documentation/windows/xp/all/proddocs/en-us/ntcmds.mspx
