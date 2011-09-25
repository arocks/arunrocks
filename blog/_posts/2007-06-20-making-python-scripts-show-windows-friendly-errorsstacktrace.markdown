---
author: Arun Bhai
date: '2007-06-20 01:03:41'
layout: post
slug: making-python-scripts-show-windows-friendly-errorsstacktrace
status: publish
tags: [python, technical, py2exe, general]
title: Making Python Scripts Show Windows-friendly Errors/Stacktrace
wordpress_id: '101'
---

Most of us love to distribute our python programs to others once you have finished coding a neat little script. For Windows users we package it using [Py2exe][1] or [cx_freeze][2]. However, many of the end-users will not be happy with a black command window popping up, say, when an error is thrown.

[1]: http://www.py2exe.org/index.cgi/
[2]: http://www.cxtools.net/default.aspx?nav=cxfrlb

Of course the alternative is to write a full blown GUI application using [WXPython][3] or [PyFLTK][4]. Even the latter, though quite lightweight, adds several megabytes to the distribution, when all you need is a simple message-box indicating an error or showing some informational text. Clearly, its an overkill for your throwaway python scripts.

[3]: http://www.wxpython.org/
[4]: http://pyfltk.sourceforge.net/

This is the kind of problem I typically face and I have found a good solution. The answer is [ctypes library][5] which comes as a part of the standard distribution from Python 2.5 onwards. It simply calls the messagebox function from user32.dll (which is always present in a windows installation). With the main problem solved, what remained was to obtain the error text and stack trace.

[5]: http://python.net/crew/theller/ctypes/

Let's see how the code looks like:

{% highlight python %}

    # Importing all the works for a native Win32 Message Box
    from ctypes import c_int, WINFUNCTYPE, windll
    from ctypes.wintypes import HWND, LPCSTR, UINT
    prototype = WINFUNCTYPE(c_int, HWND, LPCSTR, LPCSTR, UINT)
    paramflags = (1, "hwnd", 0), (1, "text", "Hi"), (1, "caption", None), (1, "flags", 0)
    MessageBox = prototype(("MessageBoxA", windll.user32), paramflags)

    # For printing the stack
    import sys
    import traceback
    from time import sleep

    def show_popup(text):
        print text
        MessageBox(text=text, caption="Sample App Says...")

    def mainloop():
        raise "Uff!"

    if __name__ == '__main__':
        try:
            mainloop()
        except:
            type, value, sys.last_traceback = sys.exc_info()
            lines = traceback.format_exception(type, value,sys.last_traceback)
            show_popup("Aiyooooo..... there has been an error!\n" +
                "Exception in user code:\n" +
                "".join(lines) +
                "===== Please mail a screenshot to arunvr@gmail.com ===="
                )
        finally:
            sleep(1) # show the console output for a second so that users can read it
{% endhighlight %}


*EDIT:* This is how it looks like in PyMail, one of my scripts-that-grew-into-an-app ;)

![Screenshot of a Python Stacktrace in a Messagebox](http://i17.tinypic.com/61oz9d3.jpg)<!--12850e4e5bbcaead4138d9450f16213b-->
