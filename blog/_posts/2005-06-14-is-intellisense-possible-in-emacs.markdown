---
author: Arun Bhai
date: '2005-06-14 20:07:17'
layout: post
slug: is-intellisense-possible-in-emacs
status: publish
tags: [python, technical, general]
title: Is Python Intellisense Possible in Emacs?
wordpress_id: '58'
---

Like the search for the Elixir of youth or [philosopher's stone][phst],
I was looking for some kind of [Intellisense][intl]
feature for [Python][6] in [Emacs][5] which I have grown used to since my windows
programming days. Yes I'm referring to the little drop down list
that helps you auto complete class members. I'm also referring the
tool-tip that appears which shows a functions signature when you are
calling it. I know that [PythonWin][7], my python editor of choice,
already does this. But I intend to use Emacs as my IDE.
It seems that you have two alternatives, both have issues
as you will see:

## py-complete - Not yet Windows ready? ##

Firstly [py-complete][3] seems to require [Pymacs][4]. Now, this was
not very obvious. The idea of python helping in completion seems to be
very cool and nearly worked without pymacs. Seems pymacs is not quite
well supported in Windows. As soon as I read this I sort of gave up.

## Semantic Flopped ##

Then, I installed [CEDET 1.0 (beta 3)][1] which gives you [Semantic][8] inspired by this [post][2]. It
seemed to be a pain to install the whole thing until I discovered that
you have to keep certain things in the load-path. Finally this is what
I added to my `.emacs` file

    ;; Set up load path
    (setq load-path (append (list (concat use-home "site/cedet/speedbar")
    (concat use-home "site/cedet/common")) load-path))
    (load-file "~/site/cedet/common/cedet.el") ;; Load CEDET
    (semantic-load-enable-minimum-features)


Now as the post suggests, we have a fully working speedbar but
auto-completion is pretty much weird. For eg: M-x
semantic-analyze-possible-completions describes the scopes you are
currently in.

## Conclusion ##

Both approaches are really good though quite different. They haven't
made use of the emacs tool-tip library either. Since this is a
crucially lacking feature in Emacs, I might as well do a bit of R&D
on this before giving up the dream.

[phst]: http://en.wikipedia.org/wiki/Alchemy "To Wikipedia"
[intl]: http://msdn.microsoft.com/library/en-us/odc_vsto2005_ta/html/officeVSTOCodeSnippets.asp "A Microsoft page regarding the feature"
[1]: http://cedet.sourceforge.net/ "Collections of Emacs Development Environment Tools"
[2]: http://users.binary.net/thehaas/cgi-haas/blosxom.cgi/comp/emacs/semanticandtags.html
[3]: http://cvs.sourceforge.net/viewcvs.py/python-mode/python-mode/
[4]: http://pymacs.progiciels-bpi.ca/index.html "Allows emacs users to automate using python"
[5]: emacswiki.org/ "Emacs Wiki"
[6]: python.org/ "Python: Language"
[7]: http://www.python.org/windows/pythonwin/ "A python IDE"
[8]: http://www.emacswiki.org/cgi-bin/wiki/SemanticSense "Semantic"
