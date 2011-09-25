---
author: Arun Bhai
date: '2009-12-13 09:24:02'
layout: post
slug: managing-creative-assets-1
status: publish
tags: [productivity, backup, creativity, distributed version control, lifehacks, version
    control]
title: Managing Creative Assets - 1
wordpress_id: '159'
---

*Managing Creative Assets is a multi-part series on how you can manage your creative works such as a novel or even blog post without impairing your creativity. It highlights the importance of using a version control system as an integral part of one's creative workflow*

## Why Do We Need A Version Control system?

Let me start off by saying that this is article is not for the techies. Despite what the title might tell you, this is an article about how to make computers help your creative process. How does a creative process work? 

Most creative people follow the following simplified process [attributed to Graham Wallas][Wallas] while thinking creatively:

- **Preparation** (preparatory work on a problem that focuses the individual's mind on the problem and explores the problem's dimensions),
- **Incubation** (where the problem is internalized into the unconscious mind and nothing appears externally to be happening),
- **Intimation** (the creative person gets a 'feeling' that a solution is on its way),
- **Illumination** or insight (where the creative idea bursts forth from its preconscious processing into conscious awareness); and
- **Verification** (where the idea is consciously verified, elaborated, and then applied).

[Wallas]: http://en.wikipedia.org/wiki/Creativity#Graham_Wallas "Wallas model"

Obviously, this is an iterative process. Most writers would have a pile of crumpled paper sheets overflowing their waste baskets. Be prepared to reject a lot of ideas (even good ones) when you are involved in some creative process. Sometimes, against your earlier good judgement you would like to go back and retrieve an idea that you had discarded. You may have to rummage your waste basket for that page and if you are lucky, you might find it among the pile.

These days most of the creative works; be it a novel, a movie or even a comic is prepared on a computer. However, the process of throwing away drafts into the waste basket and later digging them out, is still the way we humans work. The various ways people achieve this in practise is:

1. **Saving multiple version**: This results in a whole mess of files grouped by their prefixes. Some prefer to suffix them with version numbers like *file-v0.5.doc*, *file-v1.0.doc* etc, while others prefer to use descriptive suffixes like *file-draft.doc*, *file-sentforreview.doc* etc. As anyone who might have used this system would have experienced, this quickly becomes unwieldy. For example what is the difference between *file-v0.5.doc* and *file-v1.0.doc*? How can I revert to the earliest version while correcting many of the typos I found in the latest version?

2. **Using Undo and Redo**: This is a very simple system to understand and hence quite popular among artists. If something doesn't feel right, keep pressing the Undo button till you are satisfied and then start over. There are many problems with this approach. Firstly, the timeline is linear. You cannot try two different approaches at the same time. Secondly, the Undo history is available only for a single session. Close the application and the undo history is forgotten.

3. **Use a version control system**: This approach relies on an version control system that remembers every version you had ever saved (rather checked-in). This system is the focus of this article.

To extend the analogy further, a version control system can give you a bottomless waste basket with the ability to show you what changes you made from one version to another. Version control systems are powerful enough to allow you to branch out into various versions simultaneously, which is often useful when you are collaborating with others.

In fact, the addition of a version control system makes a profound change to your creative process. You are no longer afraid to make mistakes. You can play around with your creations without the fear of what you had created so far. Most people are afraid to start from scratch, even though, it is often documented that subsequent creations become more refined and hence elegant due to the better understanding of the 'problem' mentioned in the **Preparation** phase above. But be mindful of drifting in the opposite direction too, as in the case of the [Second System effect][secondsys].

In the [next part](http://www.arunrocks.com/blog/archives/2009/12/13/managing-creative-assets-2/), we will be introduced to two kinds of version control systems - Centralized and Distributed; and which one is suited for certain scenarios.

[secondsys]: http://en.wikipedia.org/wiki/Second-system_effect
