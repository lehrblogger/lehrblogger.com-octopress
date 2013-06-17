---
layout: post
featured: false
title: "Intro to Computational Media - Midterm Part 1"
permalink: /2008/10/15/intro-to-computational-media-midterm-part-1/
dsq_thread_id:
  - 17673091
categories:
  - assignments
  - ITP
  - ITP - ICM
excerpt: "Display on a globe? How hard can it be?"
---
For my midterm project I want to build a visualization of the geographic paths followed by ideas and conversations on Twitter. Users can refer to other users in their tweets using the @username syntax, and people often post public replies to or 'retweet' other user's posts. Twitter also associates some geographic information with users and with specific tweets. I plant to combine these two types of data to show the 'jumps' that an idea makes across a country or around the world.

I started off focusing on the 'retweeting' keyword that people use on Twitter to indicate that they are reposting something written by someone else (of the form "Retweeting @username text"). I wrote a Processing sketch (again in Scala) that gets the 15 most recent retweets from Twitter, prints them one by one, and continuously checks for new retweets in real time. I've posted a [Processing page][1], but note that all output is just going to the computer's console, and that they grey applet will not change.

A next step is to extract the author of the retweet and the author of the author of the original tweet, and possible previous authors if the post has been retweeted repeatedly. [Twittervision.com][2] has a geographic display of Tweets that is somewhat similar to my idea (without the conversational threading), and they also have an [API][3] that anyone can use to get location data for a specific user. Given the tweet, the series of users, and their (general) locations, the final task is (effectively and attractively) displaying it on a map/[globe][4].

 [1]: /projects/fall08/icm/hw6/
 [2]: http://twittervision.com/
 [3]: http://twittervision.com/api.html
 [4]: http://twittervision.com/maps/show_3d
