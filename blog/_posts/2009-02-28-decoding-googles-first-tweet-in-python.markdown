---
author: Arun Bhai
date: '2009-02-28 14:40:29'
layout: post
slug: decoding-googles-first-tweet-in-python
status: publish
tags: [featured]
title: Decoding Google's First Tweet in Python
wordpress_id: '140'
---

Most of you must have read the news that [Google finally jumped into the Twitter Bandwagon][gtweet]. In their trademark style, they have chosen to announce this in a cryptic way. Their [first tweet][ftweet] was essentially this:

> I'm 01100110 01100101 01100101 01101100 01101001 01101110 01100111 00100000 01101100 01110101 01100011 01101011 01111001 00001010

I will explain in this post how to crack this simple code with the help of some Python one-liners (Google's favourite language). If you are a Google aspirant (who isn't? ;) ), this might help you clear the interview. So pay attention.

To most people it is immediately obvious that it is a text encoded in binary. Since each binary word is 8 characters long, it is most probably written in the extended 8-bit ASCII code. In fact, it is and you can read this with a simple [ASCII chart][asctab].

But they have made it slightly difficult for you by writing in binary. Since most charts would provide you a lookup from decimal or hexadecimal numbers to ASCII representations only. So how do you convert from binary to decimal? It's quite simple:

{% highlight python %}
    decimal = lambda s: sum(int(j) * pow(2,i) for i,j in enumerate(reversed(s)))
{% endhighlight %}

This line defines a function `decimal` which works in a manner similar to how we would manually convert binary numbers into decimal. Each position is multiplied by increasing powers of two from the right. Then, these numbers are added together. for e.g. '1010' will be 1 * 8 + 0 * 4 + 1 * 2 + 0 * 1 = 10.

Next, we split the binary part of the tweet string and apply the `decimal` function on each part

{% highlight python %}
    tweet = "01100110 01100101 01100101 01101100 01101001 01101110 01100111 00100000 01101100 01110101 01100011 01101011 01111001 00001010"
    print ''.join(chr(decimal(s)) for s in tweet.split())
{% endhighlight %}

The result is something that you might have already guessed seeing the first 2 words:

> "I'm feeling lucky\n"

Hope you learnt some interesting python constructs. If there are other ways of decoding this in Python, please comment below.

[gtweet]: http://thenextweb.com/2009/02/26/googles-tweet-official-twitter-account/ (The news about google's tweet)
[ftweet]: http://twitter.com/google/status/1251523388 (Link to Google Twitter account)
[asctab]: http://www.cdrummond.qc.ca/cegep/informat/Professeurs/Alain/files/ascii.htm (ASCII chart)
