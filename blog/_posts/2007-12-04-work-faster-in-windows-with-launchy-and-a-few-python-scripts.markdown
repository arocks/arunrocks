---
author: Arun Bhai
date: '2007-12-04 11:09:23'
layout: post
slug: work-faster-in-windows-with-launchy-and-a-few-python-scripts
status: publish
tags: [python, productivity, launchy, general]
title: Work Faster in Windows With Launchy and a few Python Scripts
wordpress_id: '111'
---

<img src="http://farm1.static.flickr.com/133/414218839_e89ef7791d_m_d.jpg" width="240" height="160" alt="Eating the Mouse" class="alignright" />

[Launchy](http://www.launchy.net/) is a great productivity tool and a cool way to impress your friends. You can launch any application by pressing a hotkey (say Alt+Space) and the first few letters of the application for eg: typing 'gi' will display the GIMP icon and pressing Enter will launch GIMP. You can [download Launchy][launchy-downl] from its website and its [beta][launchy-beta] is pretty stable (and gorgeous) on my XP laptop too.

Using Launchy gets pretty addictive and soon you will hate using the Start menu or even Explorer on Windows for opening applications or files. So I took the red pill and started automating the following things with a little help from Python:

* Launching Intranet applications inside Internet Explorer (even if Firefox is your default browser)
* Bringing minimized or overlapped windows to the foreground

### Some Necessary Evil ###

Don't get me wrong, I hate IE as much as you do. But the fact of life is that many web apps out there "Work best when viewed in IE" (TM). Even if you have launchy plugins to launch the web app, if your default browser is Firefox, it might show incorrectly. Here is the solution:

1. Install [Python][Py] and [Pywin32][Pyw]
2. Copy the following script to the Utilities directory (it will be in the path where you installed Launchy) and save it with a __.pyw__ extension not a __.py__ extension

ie.pyw:

{% highlight python %}

    from win32com.client import Dispatch
    ie = Dispatch("InternetExplorer.Application")
    ie.Visible = True
    ie.Navigate(r"http://intranetapp/home")

{% endhighlight %}

In the above code replace the URL __http://intranetapp/home__ with the URL of your choice.

Finally, open Launchy, right-click and say 'Rebuild Index'.

### No more Alt-Tabbing around ###

If you are like me, you'll have a lot of windows open at the same time. I have tried increasing the task bar height and grouping similar windows feature in XP to manage them. But I always wish I could invoke commonly used open applications like my chat window in just a few keystrokes. Launchy doesn't index open programs by default, but with some python magic I can show you how to bring some commonly used windows to the foreground:


1. As before, install [Python][Py] and [Pywin32][Pyw]
2. Copy the following script to the Utilities directory (it will be in the path where you installed Launchy) and save it with a __.pyw__ extension not a __.py__ extension

windowfore.pyw:

{% highlight python %}

    import sys
    from win32gui import GetWindowText, EnumWindows, ShowWindow, SetForegroundWindow
    from win32con import SW_RESTORE, SW_SHOW

    TITLE_MATCH = "Microsoft Excel - Expenses.xls"

    def listWindowsHandles():
        res = []
        def callback(hwnd, arg):
            res.append(hwnd)
        EnumWindows(callback, 0)
        return res

    def listWindowsNamesAndHnd():
        return [(hwnd, GetWindowText(hwnd)) for hwnd in listWindowsHandles()]

    def unminimizeWindow(a_hwnd):
        ShowWindow(a_hwnd, SW_RESTORE)
        SetForegroundWindow(a_hwnd)

    def finder1():
        for hwnd, title in listWindowsNamesAndHnd():
            if TITLE_MATCH in title:
                unminimizeWindow(hwnd)

    finder1()

{% endhighlight %}


In the above code change the string __Microsoft Excel - Expenses.xls__ with the title the window you would like to summon.

Finally, open Launchy, right-click and say 'Rebuild Index'.

This works even if the window was minimized.

I hope, finally you can throw your mouse away. Ah... What a bliss!


[launchy-downl]: http://downloads.sourceforge.net/launchy/LaunchySetup125.exe?modtime=1177060449&big_mirror=0
[launchy-beta]: http://www.launchy.net/LaunchySetup199_1.exe
[py]: http://www.python.org/download/releases/
[pyw]: http://sourceforge.net/project/platformdownload.php?group_id=78018
