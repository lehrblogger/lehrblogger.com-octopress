---
layout: post
featured: false
title: "Little Computers - Meetapp (Initial Progress)"
permalink: /2009/03/24/little-computers-meetapp-initial-progress/
dsq_thread_id:
  - 17673218
categories:
  - ITP
  - ITP - Little Computers
  - projects
---
*previously:* [project description][1]

I've made some initial progress on organizing the interface for my Meetup.com iPhone Application. I have a tab bar at the bottom, table views with navigation bars for each tab, and an array of strings populating one of table views with sample text. I started off with David's [UITableView][2] tutorial, but ran into a series of problems when I tried to integrate it into Apple's Tab Bar Application project template. I eventually gave up on using Interface Builder and decided to do the entire thing programmatically using [this excellent tutorial][3] that I found online. That worked without any trouble, and I was able to modify the example to serve as the basics of my application.

I have uploaded what I have so far to [a repository][4] on GitHub - more frequent updates will be committed there, but I'll also post here at major milestones.

A side note - Joe Hewitt, the developer of the Facebook iPhone app, recently open-sourced several of the iPhone libraries that he used as the 'Three20 Project'. They look like they might be useful, and the post certainly deserves [a link][5] and a thank you.

 [1]: /2009/03/05/little-computers-meetapp-a-meetupcom-iphone-app/
 [2]: http://www.littlecomputers.net/?page_id=549
 [3]: http://jefferator.blogspot.com/2009/01/iphone-programming-tutorial-creating.html
 [4]: https://github.com/lehrblogger/meetapp
 [5]: http://joehewitt.com/post/the-three20-project/
