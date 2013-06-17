---
layout: post
featured: false
title: "Programming A to Z - Assignment #5 Markov v vokraM"
permalink: /2009/02/24/programming-a-to-z-assignment-5-markov-v-vokram/
dsq_thread_id:
  - 17673190
categories:
  - assignments
  - ITP
  - ITP - A2Z
excerpt: "Rudimentary stastical models of text."
show_excerpt: true
---
The class preceding our fifth assignment was on Markov chains, which involve statistical models of text that can be used to predict what character (or word, or some other unit) would be likely to follow a preceeding series of n characters (or words or other units). (An interesting paper of such an algorithm from the assigned reading can be found [here][1].) Our [assignment][2], with a few suggestions, was simply to:

> Modify, augment, or replace the in-class Markov chain example.

As presented by Adam, the MarkovFilter example looked at each series of, say, three characters to build a model of what the next character is most likely to be, and then used this model to generate *new* lines of text by starting with an initial series of three characters used by the actual text, choosing the next character based on the first three characters, choosing the character after that based on the new most recent three characters (the latter two from the first set of three, and the new fourth character), and so on.

It occurred to me that perhaps it was unnecessary that the algorithm examine the text as we read it, from left to right. Instead, I wanted to rewrite MarkovFilter.java to work backwards -- starting with the last three characters of a line and working backwards instead of forwards, looking at the set of three characters at the (temporary) beginning of the line, choosing a new first character for the line from a modified statistical model about which character is most likely to *precede* them, and repeating until the line is of the desired length. VokramFilter.java represents this reversed Markov filter, and the zip file of all the classes is [here][3].

The text this generated seemed approximately as similar to English as that generated using the forward looking method, and I considered for a while how to be sure this is the case. I suspected that the operation performed by backward-looking Vokram analysis was equivalent to reversing the text that was input to a forward-looking Markov algorithm and then reversing the result, and it seemed like that operation would do the same thing as the Markov algorithm on its own. Yet I couldn't quite work out a more thorough proof of that intuition, and will see if Adam has any insights. I considered doing a comparative analysis of several large texts using both MarkovFilter and VokramFilter (by comparing the Markov analysis of a text generated from applying VokramFilter to an original text to a Markov analysis of that actual original text), but didn't have a chance.

 [1]: http://itp.nyu.edu/~ap1607/a2z/pdf/travesty.pdf
 [2]: http://www.decontextualize.com/teaching/a2z/a-markov-distinction/
 [3]: /projects/spring09/a2z/assignment5/assignment5.zip
