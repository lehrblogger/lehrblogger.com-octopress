---
layout: post
featured: false
title: "Programming A to Z - Assignment #1 Coupled Couplets"
permalink: /2009/01/26/programming-a-to-z-assignment-1-coupled-couplets/
dsq_thread_id:
  - 17673172
categories:
  - ITP - A2Z
  - assignments
  - ITP
---
The first assignment was posted [here][1], and was to

> Use a combination of the UNIX commands discussed in class (along with any other commands that you discover) to compose a text. Your “source code” for this assignment will simply consist of what you executed on the command line. Indicate what kind of source text the “program” expects, and give an example of what text it generates. Use man to discover command line options that you might not have known about (grep -i is a good one).

I decided to work off of the [sonnets.txt][2] file that Adam Parrish (the instructor) had provided as a resource -- it's just a long list of (Shakespearean?) sonnets, with the ending couplets notable indented by two spaces. I decided to extract only these couplets and then reorder the lines slighty so that the AABBCCDDetc rhyme scheme was changed to ABABCDCDetc. It wasn't going to be a fascinating work of 'procedural poetics,' but it seemed like an interesting challenge that would teach me a little more about the command line.

I had to Google around a lot and looked at the man pages to figure out how to make it work -- it was somewhat frustrating dealing with UNIX syntax. The code with detailed comments is [here][3], and the code without the comments is [here][4] (if you want to run it yourself, use the latter -- it wasn't working with the comments, and I need to ask Adam about it on Tuesday).

The output of the file when sonnets.txt (above) is used as the input is [here][5]. It should accept any input file with the couplets indented by two spaces and the other lines not indented, regardless of whether or not they are true sonnets. If there are an odd number of couplets, it will ignore the last one.

(I realize that the punctuation at the end of the lines gets somewhat messed up. This is fixable -- I could put commas at the end of one line and periods at the end of the next -- but probably isn't worth the effort.)

 [1]: http://www.decontextualize.com/teaching/a2z/getting-in-line/
 [2]: http://a2z.decontextualize.com/texts/sonnets.txt
 [3]: /projects/spring09/a2z/assignment1/assignment1_comments.txt
 [4]: /projects/spring09/a2z/assignment1/assignment1_code.txt
 [5]: /projects/spring09/a2z/assignment1/assignment1_output.txt