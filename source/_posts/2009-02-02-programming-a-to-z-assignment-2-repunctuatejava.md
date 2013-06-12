---
layout: post
featured: false
title: "Programming A to Z - Assignment #2 Repunctuate.java"
permalink: /2009/02/02/programming-a-to-z-assignment-2-repunctuatejava/
dsq_thread_id:
  - 17673174
categories:
  - ITP - A2Z
  - assignments
  - ITP
---
The second assignment was posted [here][1], and was to

> Create a program (using, e.g., the tools presented in class) that behaves like a UNIX text processing program (such as cat, grep, tr, etc.). Your program should take text as input (any text, or a particular text of your choosing) and output a version of the text that has been filtered and/or munged. Your program should use at least one method of Java’s String class that we didn’t discuss in class.  
> Be creative, insightful, or intentionally banal. Optional: Use the program that you created in tandem with another UNIX command line utility.

Expanding on/explicitly exacerbating the problem of punctuation I had last week with rearranging the couplets (when the couplets were reordered, you'd often get two lines ending with commas and then two lines ending with periods, and it distracted from the semantic munging I had intended), I wrote a quick little Java program to randomly replace marks of punctuation in the input file. It extends Adam's TextFilter library, so it works like the command line tools we used last week. I kept certain characters (such as parenthesis and quotation marks) the same because I wanted to keep the text readable while making more subtle changes to the intonation and flow .

The .java file is [here][2], and the compiled .class file is [here][3]. The original text of Robert Frost's 'Stopping By Woods On A Snowy Evening' can be found [here][4], and the repunctuated text can be found [here][5]. You'll need to add Adam's [a2z.jar][6] file to your classpath, so be sure to get that too if you want to recompile it.

The Repunctuate.java program also works nicely with the various command line utilities from last week. For example  
`grep , <frost.txt | java Repunctuate >output.txt`  
will first filter for only those lines in frost.txt with a comma, and will then repunctuate them and save the output.

 [1]: http://www.decontextualize.com/teaching/a2z/strung-out-on-java/
 [2]: /projects/spring09/a2z/assignment2/Repunctuate.java
 [3]: /projects/spring09/a2z/assignment2/Repunctuate.class
 [4]: /projects/spring09/a2z/assignment2/frost.txt
 [5]: /projects/spring09/a2z/assignment2/output.txt
 [6]: /projects/spring09/a2z/assignment2/a2z.jar