---
layout: post
featured: false
title: "Intro to Computational Media - Retweet Tree (Final Project Proposal)"
permalink: /2008/11/05/intro-to-computational-media-retweet-tree-final-project-proposal/
dsq_thread_id:
  - 17673113
categories:
  - assignments
  - ITP - ICM
  - ITP
---
*previously:* [midterm progress][1], [initial idea][2], [Twitter/Scala experiments][3]

For my final project I plan to integrate my previous work with NASA's World Wind, Twitter, and Scala into more recent work with PHP and MySQL. I will continue to focus on Twitter '[retweets][4]' and will use a PHP script to search for recent retweets (using a variety of search terms -- 'RT', 'Retweet' and 'RTWT' as well as 'Retweeting") and store them all in a MySQL database. I'll use the database information and additional searches to link retweets to previous retweets that had the same content and to the original source tweet.

I will then use the [twittervision API][5] or the [Twitter API][6] to associate geographic data with each of those tweets, and I will filter the database to keep only linked chains of tweets for which all tweets have an associated location. These chains of tweets can then be further filtered by distance between Tweets, since larger distances will create more interesting visualizations. They can also be filtered by complexity of the chain -- I have some expectation of seeing tree-like branching, in which multiple people retweet a single tweet, and then other people retweet those retweets.

I'll then visualize these retweet trees on a globe. The globe will rotate itself such that the location of the first tweet is visible, that tweet can be marked with a dot and displayed with an annotation, and then a line can be drawn to the next level of tweets and the globe can rotate itself again to illustrate the progress of the idea. After the leaf nodes of the tree are drawn, the entire tweet can fade slightly (but still remain visible), and the process can repeat for another tree. I will use the database information to always have enough retweet trees to create an appealingly dense web around the world.

I also hope to create a web visualization, using a similar but simpler Flash globe visualization with the [Poly9 FreeEarth][7].

The third and final component will be more interactive, and will be based on Twitter's current feature of 'nudging' users who have not tweeted in the past 24 hours (and have expressed that they wish to receive the reminders). I will create a new Twitter account which interested users can follow, and it will watch their tweeting patterns to determine if that user has not posted a new tweet in a certain amount of time. The twitter account can then automatically suggest a much-retweeted tweet for that user to retweet as well. Thus that user can have an awareness of current popular ideas on Twitter, can participate in the viral spread of these ideas, and can interact with the trees of retweets as they grows.

I've figured several things out with World Wind that I was having trouble with in the previous version, but there aren't enough updates for a new video. Current versions of the files, however, are below:

 * [WWJApplet.scala][8]
 * [TweetHandler.scala][9]
 * [RetweetPair.scala][10]
 * [Retweet.scala][11]
 * [Tweet.scala][12]

 [1]: /2008/10/23/intro-to-computational-media-midterm-part-2/
 [2]: /2008/10/15/intro-to-computational-media-midterm-part-1/
 [3]: /2008/10/09/intro-to-computational-media-hw5-2/
 [4]: http://search.twitter.com/search?q=Retweeting
 [5]: http://twittervision.com/api.html
 [6]: http://apiwiki.twitter.com/
 [7]: http://freeearth.poly9.com/
 [8]: /projects/fall08/icm/finalprojectproposal/WWJApplet.scala
 [9]: /projects/fall08/icm/finalprojectproposal/TweetHandler.scala
 [10]: /projects/fall08/icm/finalprojectproposal/RetweetPair.scala
 [11]: /projects/fall08/icm/finalprojectproposal/Reweet.scala
 [12]: /projects/fall08/icm/finalprojectproposal/Tweet.scala
