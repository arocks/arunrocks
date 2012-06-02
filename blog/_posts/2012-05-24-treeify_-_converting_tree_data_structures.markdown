---
layout: post
title: Treeify - Converting Tree Data Structures
date: 2012-05-24 22:34:31
tags: [python, datastructures, tree]
---

Some of the most interesting algorithms in Computer Science are involving trees. They are simple and often leverage recursion. For instance, pre-order traversal of a tree, of any complexity, can be written as follows:

{% highlight cpp %}
    void preorder(tree t)
    {
            if(t == NULL)
                    return;
            printf("%d ", t->val);
            preorder(t->left);
            preorder(t->right);
    }
{% endhighlight %}
 
For a hobby project, I was faced with an interesting problem of converting a flat representation of a tree into a nested data structure. A flat representation of a tree looks like this:

    0
    0
    1
    1
    2
    3
    2
    1

Each number refers to the nesting level within a tree. After conversion to a nested structure, it should look as follows (square brackets is the Python syntax for a list):

    [ 0,
      0,
      [ 1,
        1,
        [ 2,
          [ 3 ],
        2],
    1]]

<img src="/blog/img/tree.jpg" width="500" height="500" alt="Tree" title="Tree Landscape (photo by flickr.com/photos/cubagallery)" class="alignright"/>

I expected this algorithm to be fairly easy to find, but I didn't have much success with Google. So, as any self respecting programmer would, I rolled up my sleeves and wrote a Python implementation:

{% highlight python %}
    def treeify(cs):
        cur = 0
        tree = []
        stack = [tree]
        for c in cs:
            if c['level'] > cur:
                l = [c]
                stack[-1].append(l)
                stack.append(l)
            elif c['level'] < cur:
                while 1:
                    stack.pop()
                    cur = stack[-1][0]
                    if c['level'] == cur['level']:
                        break
                stack[-1].append(c)
            else:
                stack[-1].append(c)
            cur = c['level']
        return tree
{% endhighlight %}
 
I have tried to make the best use of Python lists by treating them like lists in LISP. Basically, both languages treat variables as references to actual data. So the lists are nothing but lists of references. This leads to some very useful properties. For e.g. in the above code:

* cs: Flat tree structure. This is slightly different from our previous example. It is a list with elements which are hash tables or dictionaries of the form {'level': 0, ...}. This is better if your node contains other data that can be easily stored in a dictionary.

* tree: Nested tree structure. This is what we would finally return back

* stack: A stack of trees. Top of the stack is the lowermost node of the tree where the next item of the same level can be added as its child. Next element is the stack is its parent node and so on.

Go ahead and read the source for a mind bending experience!

