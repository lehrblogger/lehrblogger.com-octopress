---
layout: post
featured: false
title: "Intro to Computational Media - Midterm Part 2"
permalink: /2008/10/23/intro-to-computational-media-midterm-part-2/
dsq_thread_id:
  - 17673100
categories:
  - assignments
  - ITP
  - ITP - ICM
excerpt: "NASA is the best for open-sourcing that library."
show_excerpt: true
---
For my midterm project, I started to combine the work with Twitter retweets from [last class][1] with a map/globe-based visualization. Since many Twitter users have geographic information associated with their accounts (made particularly easily accessible through the [TwitterVision API][2]), I wanted to explore mapping certain conversation patterns on Twitter to their actual locations. My intention was to show how retweets create links between different geographic locations over time, perhaps even forming chains or trees. I considered using a two dimensional map, but I thought the globe was much better for conveying the connectedness of the world.

NASA has made their [World Wind][3] globe available as an open source project, and it functions much like the more common Google Earth. After a fair amount of struggle (and assistance from Jorge), I got it to work with Scala in Eclipse. I then integrated my Jumping Tweets code from the previous week, and was ultimately successful in displaying these as Annotations at (random) locations on the map, with Polylines between a specific location (arbitrarily set to NYC) and each tweet's location. For next week, I hope to get the actual location data, improve the line quality, and add other options.

Since I did not use Processing at all for this project (instead relying on World Wind for the graphical interface), I was not able to export a embeddable Java Applet. Instead, a video I screen-captured is embedded below. I have also posted the Scala files, and feel free to contact me if you have any questions about how I got this working in Eclipse.

{% iframe_embed vimeo 2049975 700 398 %}  
[ICM Midterm - Jumping Tweets][4] from [me][5] on [Vimeo][6] (you can watch a high definition version there)

(Sorry for the graphic strangeness at the beginning of the video -- I think that happened during the import to FCP, and I'm not sure how to fix it (or if it's worth the trouble).)

*   [WWJApplet.scala][7]
*   [TweetHandler.scala][8]
*   [Tweet.scala][9]

Another post is coming soon about my plans for continuing this for my final project.

 [1]: /2008/10/15/intro-to-computational-media-midterm-part-1/
 [2]: http://twittervision.com/api.html
 [3]: http://worldwind.arc.nasa.gov/
 [4]: http://vimeo.com/2049975?pg=embed&sec=2049975
 [5]: http://vimeo.com/user574059?pg=embed&sec=2049975
 [6]: http://vimeo.com?pg=embed&sec=2049975
 [7]: /projects/fall08/icm/midterm/WWJApplet.scala
 [8]: /projects/fall08/icm/midterm/TweetHandler.scala
 [9]: /projects/fall08/icm/midterm/Tweet.scala