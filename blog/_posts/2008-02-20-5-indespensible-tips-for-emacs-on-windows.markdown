---
author: Arun Bhai
date: '2008-02-20 13:49:54'
layout: post
slug: 5-indespensible-tips-for-emacs-on-windows
status: publish
tags: [featured]
title: 5 Indispensable Tips for Emacs on Windows
wordpress_id: '115'
---

Emacs is generally not very popular on Windows based operating systems. The default installation of Emacs leaves you with a very spartan UI and a very basic editor. However, due to Emacs' extendibility, you can create a very powerful editor by customizing your .emacs file and making some OS specific tweaks. We will be concentrating on the latter as there are plenty of .emacs files floating around for your reference.

I have 5 simple yet useful tips below, which I have tested with a GNU Emacs 23.0.0.1 (i386-mingw-nt5.1.2600) running on Windows XP.

#### Tip 1: Starting off With a Prettier Emacs

Most of us customize the fonts, colours and window position of Emacs. In fact, I have found that dark backgrounds are much suited to Emacs than the default light background. However, when Emacs starts up, it annoyingly shows the default fonts and colours first. As your .emacs files load, it jumps around and changes colours quite noticeably.

You can avoid this annoyance by making a simple registry modification. Create a new .reg file say `set-frame-and-fonts.reg` and copy paste the following lines. Open the file to add the changes to the registry. Restart Emacs and enjoy the difference!

{% highlight scheme %}
    REGEDIT4
    [HKEY_CURRENT_USER\SOFTWARE\GNU\Emacs]
    "Emacs.Foreground"="black"
    "Emacs.Background"="#f5f5f5"
    "Emacs.Font"="-outline-Consolas-normal-r-normal-normal-12-90-96-96-c-*-iso8859-1"
    "Emacs.Geometry"="100x35+0+0"
{% endhighlight %}

Caveat: The lines above are my preferred colours, fonts and window positions. Your's could be different. Please customize to your taste.

#### Tip #2: Add "Open In Emacs" option to all Files

This will be indispensable once you are more used to Emacs. You will feel like opening anything and everything with it. And being the one true swiss-army-chainsaw it is, you will be delighted at the enormous no: of filetypes that Emacs supports out of the box.

This .reg file add an "Open in Emacs" option in Windows Explorer when you right click on any file. Copy the following lines to a .reg file say `Add-Emacs-To-Open-Any-File.reg` and open it to add the changes to the registry. Make sure that you have modified the path below to point to your emacs installation path (mine is in D: drive). The `emacsclientw.exe` resides in the same place where your `runemacs.exe` resides (right-clicking on the emacs icon, generally shows you this).

{% highlight scheme %}
    Windows Registry Editor Version 5.00

    [HKEY_CLASSES_ROOT\*\Shell\Open In Emacs\Command]
    @="\"D:\\Program Files\\Emacs23\\bin\\emacsclientw.exe\" -a \"D:\\Program Files\\Emacs23\\bin\\runemacs.exe\" \"%1\""
{% endhighlight %}



#### Tip #3: Goodbye Capslock

If you use Emacs a lot, you will find that you have to use the Ctrl key a lot. You might find your left thumb getting strained after prolonged use. The easiest solution for this is to reassign a less used key as the Ctrl key. Most people choose the Caps Lock key for this purpose. It is surprisingly not that much useful and soon you will forget that such a key ever existed.

<img class="alignright" src="http://farm1.static.flickr.com/77/166430479_6c71422feb_m_d.jpg">

Whenever I searched, I found that most people swap the Ctrl and Caps Lock keys. However, this is irritating as I might still want to use the old Ctrl key if I press it accidentally. Here is how to *replace* Caps Lock with the Ctrl Key.

Copy the following lines to a .reg file say `replace_caps.reg` and open it to add the changes to the registry. Now just reboot and you are done!

{% highlight scheme %}
    REGEDIT4

    [HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Keyboard Layout]
    "Scancode Map"=hex:00,00,00,00,00,00,00,00,02,00,00,00,1d,00,3a,00,00,00,00,00
{% endhighlight %}


Yes, it takes some time to "unlearn" and "learn" the new key position, but trust me it's worth the effort.

#### Tip #4: Use a Spell Checker

A spell checker is something I feel should be a part of any editor. Here is how to enable on the fly spell checking in Emacs.

1. Install [aspell](http://aspell.net/win32/)
2. Add the following lines to your .emacs file (adjust the path to aspell accordingly)

Elisp:

{% highlight scheme %}
    ;; aspell is the spell checker that works for me
    (setq-default ispell-program-name "D:\\Arun\\Home\\bin\\aspell.exe")
    (setq text-mode-hook '(lambda()
                             (flyspell-mode t)       ; spellchek (sic) on the fly
                             ))
{% endhighlight %}

#### Tip #5: Setup a Postscript Printer

By default, you can pretty-print all your documents directly from emacs. But this requires configuring a postscript printer. There is a nice package called Ghostscript which takes care of doing this.

1. Download and install [Ghostscript](http://pages.cs.wisc.edu/~ghost/doc/GPL/gpl860.htm) from [here](http://mirror.cs.wisc.edu/pub/mirrors/ghost/GPL/gs860/gs860w32.exe) say at D:\gs

2. Download and install [GSView](http://pages.cs.wisc.edu/~ghost/gsview/get49.htm) from [here](http://mirror.cs.wisc.edu/pub/mirrors/ghost/ghostgum/gsv49w32.exe) say at D:\gs\gsview

3. Then add the following lines to your .emacs file:

Elisp:

{% highlight scheme %}
    (if (string= system-name "CORPLAPTP65") ; Works in office only
        (progn
          ;;  Windows printer
          (setq-default ps-lpr-command (expand-file-name "/gs/gsview/gsprint.exe"))
          (setq-default ps-printer-name t)
          (setq-default ps-printer-name-option nil)
          (setq ps-lpr-switches '("-query")) ; show printer dialog
          (setq ps-right-header '("/pagenumberstring load" ps-time-stamp-mon-dd-yyyy))))
{% endhighlight %}

Caveat: Be sure to switch to a light background color scheme before you print, else your fonts will be so light that they won't be readable!
