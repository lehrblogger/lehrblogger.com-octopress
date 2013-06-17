---
layout: post
featured: false
title: "Programming A to Z - Assignment #3 URLFinder.java"
permalink: /2009/02/08/programming-a-to-z-assignment-3-urlfinderjava/
dsq_thread_id:
  - 17673177
categories:
  - assignments
  - ITP
  - ITP - A2Z
excerpt: "Counting links on Twitter."
show_excerpt: true
---
The third assignment was posted [here][1], and was to

> Make a program that creatively transforms or performs analysis on a text using regular expressions. The program should take its input from the keyboard and send its to the screen (or redirect to/from a file). Your program might (a) filter lines from the input, based on whether they match a pattern; (b) match and display certain portions of each line; (c) replace certain portions of each line with new text; or (d) any combination of the above.
> 
> Sample ideas: Replace all words in a text of a certain length with a random word; find telephone numbers or e-mail addresses in a text; locate words within a word list that will have a certain score in Scrabble; etc.
> 
> *Bonus challenge 1:* Use one or more features of regular expression syntax that we didn’t discuss in class. [Reference here.][2]
> 
> *Bonus challenge 2:* Use one or more features of the Pattern or Matcher class that we didn’t discuss in class. Of particular interest: regex flags (`CASE_INSENSITIVE`, `MULTILINE`), “back references” in `replaceAll`. [Matcher class reference here.][3]

I'm planning on doing a much larger project involving analysis of links on Twitter, and I decided to do a very tiny piece of that project for this assignment. I used the XML results from a Twitter search as my input and used a regular expression to look for URLs in the individual tweets. I stored the URLs and the number of times each of them occured in a hashmap, and then printed that information at the end of the analysis.

Usage of Java's HashMap, Set, and Iterator classes came back to me quickly, and the only tricky part was the regular expression. I ended up using  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`<title>.*(http://)(\\S+)(.*)(</title>)+`  
The content of each message posted to Twitter is enclosed in a `<title>``</title>` tag, and including that in the regular expression insures that we don't capture data that are not part of any message but still contain URLs. I require that tag at the beginning of the line and then look for any number of characters before the beginning of the URL, as represented by `.*`. Then I get all of the characters up until the first white space with `(\\S+)`, any characters that happen to be after the end of the URL with `(.*)`, and then finally the closing `</title>` tag, with a `+` to require at least one occurrence because I know it must be present. The .java file is [here][4], and the compiled .class file is [here][5]. You'll need to add Adam's [a2z.jar][6] file to your classpath, so be sure to get that too if you want to recompile it.

The New York Times did a [visualization][7] of tweets during the Superbowl last week, and it was widely circulated on Twitter. A [search][8] for "http superbowl nyt" returns a a list of tweets in which most people are sharing links to that visualization, and the results of that search make suitable example input. One specific tinyurl link to the visualization is shared several times, and it demonstrates that the code is functional. The input file is [here][9], and the output file is [here][10].

 [1]: http://www.decontextualize.com/teaching/a2z/programming-from-to/
 [2]: http://java.sun.com/j2se/1.5.0/docs/api/java/util/regex/Pattern.html
 [3]: http://java.sun.com/j2se/1.5.0/docs/api/java/util/regex/Matcher.html
 [4]: /projects/spring09/a2z/assignment3/URLFinder.java
 [5]: /projects/spring09/a2z/assignment3/URLFinder.class
 [6]: /projects/spring09/a2z/assignment2/a2z.jar
 [7]: http://www.nytimes.com/interactive/2009/02/02/sports/20090202_superbowl_twitter.html
 [8]: http://search.twitter.com/search?q=http+superbowl+nyt
 [9]: /projects/spring09/a2z/assignment3/superbowl.txt
 [10]: /projects/spring09/a2z/assignment3/output.txt