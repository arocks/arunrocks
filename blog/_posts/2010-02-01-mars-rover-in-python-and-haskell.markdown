---
author: Arun Bhai
date: '2010-02-01 02:02:52'
layout: post
slug: mars-rover-in-python-and-haskell
status: publish
tags: [python, technical]
title: Mars Rover in Python and Haskell
wordpress_id: '234'
---

Last week I tried to do something which I've been planning for quite sometime. Porting a Python program into Haskell. In case you didn't know, [Haskell](http://www.haskell.org/) is a purely functional programming language that's recently become a hot favourite. It has a lot of cutting edge ideas from the academic world esp laziness and strong typing. It has an interesting way to solve the 'multi-CPU problem'.

Mars Rover is a famous programming problem used by [Thoughtworks](http://www.thoughtworks.com/) in their recruitments. I first solved the problem in Python and later attempted to solve the same in Haskell. I cannot say that I ported it from Python because the approach I've used is completely different.

### The Problem

> A squad of robotic rovers are to be landed by NASA on a plateau on Mars.
> 
> This plateau, which is curiously rectangular, must be navigated by the rovers so that their on-board cameras can get a complete view of the surrounding terrain to send back to Earth.
> 
> A rover's position and location is represented by a combination of x and y co-ordinates and a letter representing one of the four cardinal compass points. The plateau is divided up into a grid to simplify navigation. An example position might be 0, 0, N, which means the rover is in the bottom left corner and facing North.
> 
> In order to control a rover , NASA sends a simple string of letters. The possible letters are 'L', 'R' and 'M'. 'L' and 'R' makes the rover spin 90 degrees left or right respectively, without moving from its current spot. 'M' means move forward one grid point, and maintain the same heading.
> 
> Assume that the square directly North from (x, y) is (x, y+1).
> 
> INPUT:
> 
> The first line of input is the upper-right coordinates of the plateau, the lower-left coordinates are assumed to be 0,0.
> 
> The rest of the input is information pertaining to the rovers that have been deployed. Each rover has two lines of input. The first line gives the rover's position, and the second line is a series of instructions telling the rover how to explore the plateau.
> 
> The position is made up of two integers and a letter separated by spaces, corresponding to the x and y co-ordinates and the rover's orientation.
> 
> Each rover will be finished sequentially, which means that the second rover won't start to move until the first one has finished moving.
> 
> OUTPUT
> 
> The output for each rover should be its final co-ordinates and heading.
> 
> INPUT AND OUTPUT
> 
> Test Input:  
> 
> 5 5  
> 1 2 N  
> LMLMLMLMM  
> 3 3 E  
> MMRMMRMRRM  
>   
> Expected Output:  
>   
> 1 3 N  
> 5 1 E  

### The Python solution

The Python solution is actually smaller than the problem itself. The readability isn't that great, but it is quite extensible. In fact, adding a new instruction like `B(ackward)` would need just one additional line. You can also extend the four cardinal directions to eight with minimal changes to the code.

{% highlight python %}
    dirs = "NESW"                   # Notations for directions
    shifts=[(0,1),(1,0),(0,-1),(-1,0)] # delta vector for each direction
    # One letter function names corresponding to each robot instruction
    r = lambda x, y, a: (x, y, (a + 1) % 4)
    l = lambda x, y, a: (x, y, (a - 1 + 4) % 4)
    m = lambda x, y, a: (x + shifts[a][0], y + shifts[a][1], a)
    raw_input()                     # Ignore the grid size
    while 1:
        # parse initial position triplet
        x, y, dir = raw_input().split() 
        pos = (int(x),int(y),dirs.find(dir))
        # parse instructions
        instrns = raw_input().lower() 
        # Invoke the corresponding functions passing prev position
        for i in instrns: pos = eval('%s%s' % (i, str(pos)))
        print pos[0], pos[1], dirs[pos[2]]
{% endhighlight %}

### The Haskell solution

I am a beginner in Haskell, so apologies for any bad coding practices. You might notice that rather than using Reflection as in the Python code, I have used Type-inference to invoke the correct function for each instruction. Yet again, this scales well while adding new instructions.

{% highlight haskell %}
    import Data.List
    
    dirs = "NESW"
    
    shifts 0 = (0, 1)
    shifts 1 = (1, 0)
    shifts 2 = (0, -1)
    shifts 3 = (-1, 0)
    
    instrn (x, y, a) 'R' = (x, y, mod (a + 1) 4)
    instrn (x, y, a) 'L' = (x, y, mod (a - 1 + 4) 4)
    instrn (x, y, a) 'M' = (x+fst (shifts a), y+snd (shifts a), a)
    
    showpos (x, y, a) = show x ++ " " ++ show y ++ " " ++ [dirs !! a]
    finddir dirchar = 
        case elemIndex dirchar dirs of
          Nothing -> error "invalid direction"
          Just position -> position
    readpos line = (x, y, a)
            where a = finddir $ head $ drop 1 line3
                  [(y,line3)] = reads line2 :: [(Integer, String)]          
                  [(x,line2)] = reads line :: [(Integer, String)]
    
    robo = do
      posn <- getLine
      instrns <- getLine
      putStrLn (showpos (foldl instrn (readpos posn) instrns))
      robo
    
    main = do
      skip <- getLine               -- Skip reading the grid size
      robo
{% endhighlight %}

### Key learnings

Since some of you might be interested in Haskell, I have tried to summarize my experience in Haskell programming

1. There are no loop constructs. So everything must be done using recursion!
2. Haskell I/O is very hard. This is because of my little knowledge of Monads. In fact, I solved the logic pretty quickly. It took me a while to figure out the input parsing.
3. Type inference catches a lot of errors. This is quite handy but error messages are sometimes confusing
4. I could have used Abstract Data Types for directions but it would have made the code lengthier

In short, programming in Haskell is a mind-bending exercise. Highly recommended!
