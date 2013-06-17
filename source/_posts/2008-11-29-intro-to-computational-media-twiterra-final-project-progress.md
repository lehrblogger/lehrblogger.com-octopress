---
layout: post
featured: false
title: "Intro to Computational Media - TwiTerra (Final Project Progress)"
permalink: /2008/11/29/intro-to-computational-media-twiterra-final-project-progress/
dsq_thread_id:
  - 17673122
categories:
  - assignments
  - ITP
  - ITP - ICM
excerpt: "Collecting metadata about retweets was not easy."
show_excerpt: true
---
*previously:* [project proposal][1], [midterm progress][2], [initial idea][3], [Twitter/Scala experiments][4] 

I've made substantial progress on my Twitter/globe project for ICM. I rewrote and improved the Twitter search code that fetched new retweets in PHP to work with a MySQL database on my Dreamhost web server. For each retweet found by that PHP script, it uses the @username syntax and text of the retweet to find the original retweet. If another retweet is found (i.e. there is a chain of retweets) it recurses back until it finds the original. If all of the tweets in the chain have valid location data, it stores each tweet with a unique ID (assigned by Twitter), the author's username, the text of the tweet, the latitude/longitude, and the time.

It also stores the number of retweets that a tweet has -- in a three tweet chain, the original tweet will have 2 retweets, the first of the two retweets will have 1 retweet, and the final retweet will have 0 retweets. It also stores the ID of the tweet's parent tweet -- in that same example, the original tweet will have no parent, the first retweet will have the ID of the original as its parent, and the second retweet will have the ID of the first retweet as its parent. This data will make it relatively simply to choose and display chains and trees of retweets on the globe by filtering for interesting structures and long distances between tweets.

You can see that PHP script [here][5] (sorry for the lack of comments, I'll add them later), and it's been running a few times an hour for the past several days. I have over 10,000 tweets in my database; about 5,500 of them are leaf nodes and have no retweets, 4,400 of them have one retweet, 500 have two retweets, 100 have three retweets, 30 have four retweets, and 25 have five or more retweets. I'm getting good data and will be able to draw interesting chains and trees on the globe, especially after it has been running for a few weeks.

As a side note, it's been interesting to watch the sort of things that people are retweeting. For example, there was a flood of heavily retweeted content after the terrorist attacks in Mumbai. The three most heavily-retweeted tweets are (with 11, 14 and 11 retweets, respectively):

 * [chrisbrogan][6]: 15 year old girl needs a kidney. She's dying. Can you help? Can you at least retweet? http://tinyurl.com/6bue7f
 * [SantaClaus25][7]: Please re-tweet and make history "Ho Ho Ho @Santaclaus25 and all of us here at the North Pole wish your family a Happy Thanksgiving" 
 * [zigzackly][8]: #mumbai sortable list of injured/dead at http://tinyurl.com/5q23h6 -- please retweet

In addition, I've finalized the name (formerly *Retweet Tre*e) to *TwiTerra*. I registered the [twiterra.com][9] domain, and for now it currently redirects to a WordPress page for the project. A project description and one-line pitch are coming soon, since the submission deadline to be in the show is December 1st.

 [1]: /2008/11/05/intro-to-computational-media-retweet-tree-final-project-proposal/
 [2]: /2008/10/23/intro-to-computational-media-midterm-part-2/
 [3]: /2008/10/15/intro-to-computational-media-midterm-part-1/
 [4]: /2008/10/09/intro-to-computational-media-hw5-2/
 [5]: /projects/fall08/icm/final/getNewRetweets.txt
 [6]: http://twitter.com/chrisbrogan/status/1021173086
 [7]: http://twitter.com/SantaClaus25/status/1026310893
 [8]: http://twitter.com/zigzackly/status/1026615643
 [9]: http://twiterra.com
