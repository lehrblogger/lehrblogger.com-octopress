---
layout: post
featured: false
title: "Programming A to Z - Assignment #4 Concordance Sorting"
permalink: /2009/02/24/programming-a-to-z-assignment-4-concordance-sorting/
dsq_thread_id:
  - 17673187
categories:
  - assignments
  - ITP
  - ITP - A2Z
excerpt: "How did anyone program anything before Google?"
show_excerpt: true
---
The class prior to the fourth assignment covered concordances, data structures for word counts, and other related topics. I completed one of the more challenging suggested alternative tasks for the [assignment][1]:

> Investigate Java’s [Collections][2] class. See if you can figure out how to use `Collections.sort()` to sort the output of ConcordanceFilter.java—first in alphabetical order, then ordered by word count. (See [the official Sun tutorial][3].)

The Java documentation was relatively clear about what I needed to do using the Collections and Comparator classes to get it working, and Google answered any remaining questions I had about syntax. There are a few files that I edited to run it (including AlphabeticComparator and a WordCountComparator classes), and you can download a zip file of the assignment [here][4]. When run, ConcordanceFilter.java will search for a word within a text and output each line on which that word occurred, then output those lines again in alphabetical order, and then output those lines a third time with the line with the fewest words first. For example:

> $ java ConcordanceFilter place <[lovecraft_dreams.txt][5]  
> All contexts  
> remote place beyond the horizon, showing the ruin and antiquity of the city,  
> over a bridge to a place where the houses grew thinner and thinner. And it was  
> Contexts sorted alphabeticallydsfadsfd  
> over a bridge to a place where the houses grew thinner and thinner. And it was  
> remote place beyond the horizon, showing the ruin and antiquity of the city,  
> Contexts sorted by word count  
> remote place beyond the horizon, showing the ruin and antiquity of the city,  
> over a bridge to a place where the houses grew thinner and thinner. And it was

 [1]: http://www.decontextualize.com/teaching/a2z/flight-of-the-concordance/
 [2]: http://java.sun.com/j2se/1.5.0/docs/api/java/util/Collections.html
 [3]: http://java.sun.com/docs/books/tutorial/collections/index.html
 [4]: /projects/spring09/a2z/assignment4/assignment4.zip
 [5]: http://a2z.decontextualize.com/texts/lovecraft_dreams.txt
