---
layout: post
featured: false
title: "Programming A to Z - Assignments #6 and #7"
permalink: /2009/03/24/programming-a-to-z-assignments-6-and-7/
dsq_thread_id:
  - 17673204
categories:
  - assignments
  - ITP
  - ITP - A2Z
excerpt: "More text processing."
show_excerpt: true
---
*Since it's getting to be that time in the semester when I feel that I should be focusing on final projects, I didn't spend too much time on the [context free grammar][1] and [Bayesian classificiation][2] assignments. My writeups for both are below.*

I've studied context free grammars in the past (ahh undergrad memories of Ling120 (syllabus [here][3], but not the one I had)), so I have a good sense of how they work. I made a few quick modifications to the grammar file used by Adam's ContextFilter class to handle certain conjunctions, adverbs/adverbial phrases, and prepositional phrases. I also made some modifications to support quotations, but they aren't particularly refined -- I couldn't come up with a simple solution to the nesting problem in the below example that didn't involve duplication of many of the other rules:

> this smug dichotomy thought " that smug walrus foregrounds this time that yelled " the seagull that spins this important sea said " that restaurant that sneezes has come " " " 

Thinking about ways to solve this problem highlighted how CFGs can get rather complex rather quickly. When, for example, do you want a period/comma at the end of the quotation? When is one period/comma sufficient for multiple quotations? How do you resolve those situations programmatically? 

My test.grammar file is online [here][4], and you can run it with Adam's Java classes that are zipped [here][5]. I recommend you only test a few of my rules at a time and comment out the others -- otherwise you might get sentences like this:

> the important trombone yelled " wow, the blue amoeba said " oh, this blue thing interprets this seagull that said " wow, the trombone sneezes " " but this amoeba said " this suburb that quickly whines in that sea that daydreams by that corsage that quickly or habitually computes this dichotomy slowly yet habitually vocalizes and damn, that luxurious restaurant habitually prefers this seagull " but that suburb interprets the time yet damn, that sea said " that restaurant tediously slobbers " yet wow, that seagull quickly yet slowly foregrounds the restaurant or the boiling hot time spins this bald restaurant of this trombone but that amoeba computes this smug restaurant but the seagull that quickly or slowly prefers this sea yelled " oh, the thing that spins this restaurant tediously yet quietly whines " or wow, this amoeba coughs through the important sea and oh, that time tediously yet slowly coughs yet oh, that trombone habitually computes that luxurious suburb or wow, that thing that said " my, that amoeba that said " my, that time tediously or slowly sneezes " quietly yet tediously foregrounds that trombone that has come " said " my, the restaurant that habitually but quietly prefers the dichotomy that said " damn, this boiling hot trombone quietly slobbers by the trombone that quietly coughs " said " oh, the amoeba habitually coughs " " yet damn, this seagull that spins the seagull that sneezes for the important trombone quietly coughs but my, this sea that slowly yet habitually has come foregrounds this dichotomy and that blue thing tediously slobbers "
  
  
For the assignment on Bayesian classification I combined Adam's BayesClassifier.java with the previous Markov chain examples to use n-grams instead of words as the tokens for analysis. BayesNGramClassifier.java can be found [here][6] as a .txt file, and you can download all of the required files [here][7]. Note you might have to increase the amount of memory available to Java to run the analysis with higher values for n. Try something like `java -Xmx1024m BayesNGramClassifier 10 shakespeare.txt twain.txt austen.txt sonnets.txt` if you're having trouble.

I compared sonnets.txt to shakespeare.txt, twain.txt and austen.txt as in the example using various values of n for the analysis. The data is below, with the word-level analysis first. Note that higher numbers (i.e. those closer to zero) indicate a greater degree of similarity.

<table>
  <tr>
    <td>
      <em><strong>n</strong></em>
    </td>
    
    <td>
      <em>shakespeare.txt</em>
    </td>
    
    <td>
      <em>twain.txt</em>
    </td>
    
    <td>
      <em>austen.txt</em>
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>word</strong>
    </td>
    
    <td>
      -59886.12916378722
    </td>
    
    <td>
      -64716.741899235174
    </td>
    
    <td>
      -66448.68994538345
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>1</strong>
    </td>
    
    <td>
      -311.94997977326625
    </td>
    
    <td>
      -348.2797252624347
    </td>
    
    <td>
      -351.8612295074756
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>2</strong>
    </td>
    
    <td>
      -6688.356420467105
    </td>
    
    <td>
      -6824.843204592283
    </td>
    
    <td>
      -7076.488251510615
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>3</strong>
    </td>
    
    <td>
      -46332.8806624305
    </td>
    
    <td>
      -47629.58502376338
    </td>
    
    <td>
      -49557.906858505885
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>4</strong>
    </td>
    
    <td>
      -155190.04376334642
    </td>
    
    <td>
      -161815.95665896614
    </td>
    
    <td>
      -167839.50470553883
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>5</strong>
    </td>
    
    <td>
      -350322.9494161118
    </td>
    
    <td>
      -369897.08857782563
    </td>
    
    <td>
      -379600.90797560615
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>6</strong>
    </td>
    
    <td>
      -581892.4161591302
    </td>
    
    <td>
      -620871.7848829604
    </td>
    
    <td>
      -629557.118086935
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>7</strong>
    </td>
    
    <td>
      -798094.5896325088
    </td>
    
    <td>
      -851043.4785550251
    </td>
    
    <td>
      -856926.3903304675
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>8</strong>
    </td>
    
    <td>
      -977428.4318098201
    </td>
    
    <td>
      -1033391.2297240103
    </td>
    
    <td>
      -1037851.0025613104
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>9</strong>
    </td>
    
    <td>
      -1106125.9701775634
    </td>
    
    <td>
      -1153251.0919529926
    </td>
    
    <td>
      -1159479.8816597122
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>10</strong>
    </td>
    
    <td>
      -1184654.361656962
    </td>
    
    <td>
      -1218599.6808817217
    </td>
    
    <td>
      -1227484.9929278728
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>11</strong>
    </td>
    
    <td>
      -1221770.2880299168
    </td>
    
    <td>
      -1242286.351341775
    </td>
    
    <td>
      -1255024.535274092
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>12</strong>
    </td>
    
    <td>
      -1228641.7908902294
    </td>
    
    <td>
      -1238848.5031651617
    </td>
    
    <td>
      -1254404.827728626
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>13</strong>
    </td>
    
    <td>
      -1214247.043351669
    </td>
    
    <td>
      -1217403.6233457213
    </td>
    
    <td>
      -1235480.9184978919
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>14</strong>
    </td>
    
    <td>
      -1187489.0276571538
    </td>
    
    <td>
      -1186476.2556523846
    </td>
    
    <td>
      -1205959.6178494398
    </td>
  </tr>
  
  <tr>
    <td>
      <strong>15</strong>
    </td>
    
    <td>
      -1153511.2780243065
    </td>
    
    <td>
      -1150529.1594209142
    </td>
    
    <td>
      -1170746.8132369826
    </td>
  </tr>
</table>

When the n-grams become 14 characters long (which is very long, considering the average length of English words) the analysis finally starts to break down, and it no longer correctly classifies sonnets.txt as being most similar to shakespeare.txt. Some values of n certainly perform better than others, but I'd need to delve further into the mathematics of how these numbers are calculated in order to do more detailed analysis.

 [1]: http://www.decontextualize.com/teaching/a2z/context-free-as-in-speech/
 [2]: http://www.decontextualize.com/teaching/a2z/bayesed-and-confused/
 [3]: http://www.stanford.edu/~sag/ling120/
 [4]: /projects/spring09/a2z/assignment6/test.grammar
 [5]: http://a2z.decontextualize.com/code/week06.zip
 [6]: /projects/spring09/a2z/assignment7/BayesNGramClassifier.txt
 [7]: /projects/spring09/a2z/assignment7/assignment7.zip