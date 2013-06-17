---
layout: post
featured: false
title: "Programming A to Z - Assignment #9 Evolvocabulary"
permalink: /2009/04/09/programming-a-to-z-assignment-9-evolvocabulary/
dsq_thread_id:
  - 17672880
categories:
  - assignments
  - ITP
  - ITP - A2Z
excerpt: "Analayzing the papers I wrote in college."
show_excerpt: true
---
The last of the weekly assignments was relatively open ended -- 

> Acquire some text. Visualize it. Source and methodology are up to you, but be prepared to justify your choices.

I decided to use my papers from college as my source text. I copy pasted the contents of the papers into plain text files, and had hoped to see how my vocabulary evolved through time (hence the project name... not the most clever one I've come up with, but it will do for a weekly assignment). (Note I didn't include the writing I did for certain technical Linguistics, Computer Science, and Physics classes. I also didn't include papers that were group-authored.)

In week four of the class we had looked at how to represent word counts as a hashmap of words to the number of times that they occurred in a text (see the WordCount class in the [notes][1]). WordCount extends TextFilter, however, and TextFilter is built to only be able to read data from a single file. I thought about combining the files into one or trying to use multiple TextFilters, but it seemed easier and more elegant to start from scratch.

Scala seemed like it would be well-suited to this sort of problem, and I was eager to find a use for it since it had been a couple months since I last worked on TwiTerra. My aforementioned friend [Jorge][2] pointed me towards a class written to parse Ruby log files; [that code][3], which uses a Scala community library called [Scalax][4], served as a useful starting point. 

You can see the full source code for the assignment [here][5], but I've pasted a particularly interesting function below. There's some "deep Scalax magic" going on here (as Jorge says), which I'll explain --

{% gist 5760112 %}

The function takes a list of the names of the files mentioned above, and returns a map that has each word mapped to another map, and each of those maps has the names of the files in which that word occurred mapped to the number of times that word occurred in that file. There are three parts of the function:

1.  The first part of the function goes through all the files in that list, and then through each line in that file, and then through each token in that line (delimiting tokens by non-alphabetic characters), and puts each of those words in a list as a pair with the file in which they occurred. Thus `wordsInFiles` is a long list of words and file names, with an entry for every word on every line of every file.
2.  The function then initializes an empty map (`emptyMap`) with default values for the words and file names, and 0 for the word counts. This eliminates the need for a lot of hassle later on checking to see if words/file names are in the map -- we can just assume they are there and trust it to use the default values if they aren't.
3.  Finally, it operates on each pair in the `wordsInFiles` list and updates the map accordingly. `foldLeft` is explained thoroughly on the Ruby log file example linked above, but I'll go through this specific case. It starts off with the `emptyMap`, goes through each pair in the `wordsInFiles` list, and performs a function on the pair of that map paired with that pair from the list (`(map, (word, filename))`) to fold that list pair into the map. The result of that fold is a map that is then used in the fold of the next item in the list, and this process continues for each `(word, filename)` pair in the `wordsInFiles` list.
    
    The function performed on each item in the list is not as complicated as it looks, and note that each of the commented lines is equivalent to the uncommented one -- I left them to show the progressive application of syntactic sugar (which I won't go into here). The purpose of this next line is to increment the count of the number of occurrences of the current word in the current file.
    
    The outermost `map.update` finds the word in the map and replaces the map with which it is associated with a new one. This new map needs to be an updated version of the previous map, which we retrieve with `map.apply(word)`. We want to update only one of the values corresponding to the file names in that words' map of filenames to occurrence-counts, so we need to get the previous count (using two `map.apply`'s to get to the value of a key in a map within a map) and increment it before the resulting map is sent to the update.

... "deep Scalax magic."
    
I've saved the results of the visualization in the below images. The program didn't quite create the effect that I had intended -- that of showing how my vocabulary evolved over time -- but I did give some sense of the topics about which I was thinking and the words I used to describe them. I thought about eliminating common words, but it seemed like it would be hard to make those decisions in a non-arbitrary manner. Click each image for a larger version in which the differences are more visibly apparent, and I recommend opening the below images in tabs and cycling through them with shortcut keys so that it's easier to make quick comparisons. 

[<img src="/projects/spring09/a2z/assignment9/images/freshman.png"  width="170" alt="freshman year"  />][6]
[<img src="/projects/spring09/a2z/assignment9/images/sophomore.png" width="170" alt="sophomore year" />][7]
[<img src="/projects/spring09/a2z/assignment9/images/junior.png"    width="170" alt="junior year"    />][8]
[<img src="/projects/spring09/a2z/assignment9/images/senior.png"    width="170" alt="senior year"    />][9]

 [1]: http://www.decontextualize.com/teaching/a2z/flight-of-the-concordance/
 [2]: http://github.com/jorgeortiz85
 [3]: http://pastie.org/420714
 [4]: http://scalax.scalaforge.org/
 [5]: projects/spring09/a2z/assignment9/Evolvocabulary.txt
 [6]: /projects/spring09/a2z/assignment9/images/freshman.png
 [7]: /projects/spring09/a2z/assignment9/images/sophomore.png
 [8]: /projects/spring09/a2z/assignment9/images/junior.png
 [9]: /projects/spring09/a2z/assignment9/images/senior.png
