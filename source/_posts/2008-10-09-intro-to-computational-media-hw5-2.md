---
layout: post
featured: false
title: "Intro to Computational Media - HW5"
permalink: /2008/10/09/intro-to-computational-media-hw5-2/
dsq_thread_id:
  - 17673088
categories:
  - assignments
  - ITP
  - ITP - ICM
updates:
  - date: 2008-10-14
    body: "I decreased the number of Tweets that this loads on startup to 20 pages with 15 each, since it seemed to be breaking sporadically. It should behave more consistently now."
blurb: "\"It's a tricky language,\""
show_blurb: true
---
I continued my work with Scala for this assignment, for which we were asked to "Create a Processing sketch that uses input from a text file or URL." Recently I've become increasingly interested in [Twitter][1], and I decided to explore the reactions that people had to Tuesday's presidential debate that they had marked with the '#debate' hash tag. Twitter let's you [search][2] past tweets, and returns up to 1500 results. I downloaded the tweets from Twitter, displayed them in a downward-scrolling list (oldest first), and set the greyscale for each word based on the number of occurrences of that word in other tweets currently on the screen (ignoring other hashtags and certain common words). One can get a rough sense of shifting debate/thought/discussion topics over time by watching which words are darkest as tweets scroll by.

Jorge Ortiz was again extremely helpful (see post on [HW4][3]). He helped me early on by providing and explaining a simple php script to obtain the raw search results via proxy (because otherwise it would be necessary to sign the applet). He also provided the code for the parallel threaded downloading of the tweets from Twitter, which was much faster than the previous implementation, and he answered many random Scala questions. It's a tricky language, but it is also much more expressive, powerful, and intuitive than Java, and I'm getting better.

Since I wrote this assignment in [Coderspiel's Spde][4] rather than Eclipse, I was able to easily export an applet that runs in a browser. See it on this [Processing page][5] (you'll need to wait 20 seconds or so for it to load all of the tweets). (Also, be careful when opening this -- it's crashes browsers at random.. maybe a browser other than your primary one?)

 [1]: http://twitter.com/
 [2]: http://search.twitter.com/
 [3]: /2008/10/09/intro-to-computational-media-hw4/
 [4]: http://technically.us/code/archive/2008/10/#item-5788
 [5]: /projects/fall08/icm/hw5/
