---
layout: post
featured: false
title: "Little Computers - Meetapp (Working Demo)"
permalink: /2009/05/04/little-computers-meetapp-working-demo/
dsq_thread_id:
  - 17673229
categories:
  - projects
  - ITP
  - ITP - Little Computers
blurb: "Baby's first iPhone app."
show_blurb: true
---
*previously:* [project description][1], [initial progress][2]

![Meetapp Screenshot](/projects/spring09/littlecomputers/meetapp_screenshot.png "Meetapp Screenshot")

David Nolen's [Little Computers][3] class is now over, and I've made substantial progress this semester on Meetapp, the iPhone application I have been building for users of [Meetup.com][4]. Currently, it will fetch a list of a user's groups from the API at that user's request, make secondary API requests to fetch the events associated with each of those groups, and then display all of those events (i.e. all of those events that a user might be attending) in a table. It will also filter that table to show only those events that the user is organizing (rather than simply attending), and the user can drill down for more detailed information about both types of events. So far, I have -

 * built a straightforward application that uses a navigation controller, a toolbar, and some tables to organize the information.
 * implemented HTTP communication with the Meetup API using stored credentials for the user.
 * created data structures for managing information about a user's groups and events.
 * designed and re-designed the interface so that it was simpler, cleaner, and better-suited for the functionality I was actually implementing.

The app has some use in it's current form, but there's a lot I still want to do before it's ready to be posted for the public in Apple's App Store.

The most recent code is on [GitHub][5], and please feel free to contact me with questions about my progress so far or future plans. I hope to continue the project later this summer, but [Delvicious][6] will be my prioritized side-project, at least for the time being. I'm looking forward to watching the lectures from [Stanford's iPhone class][7] to brush up when I jump back in to Objective-C in a couple of months.

 [1]: /2009/03/05/little-computers-meetapp-a-meetupcom-iphone-app/
 [2]: /2009/03/24/little-computers-meetapp-initial-progress/
 [3]: http://www.littlecomputers.net/
 [4]: http://meetup.com/
 [5]: http://github.com/lehrblogger/meetapp
 [6]: http://delvicious.com/
 [7]: http://www.stanford.edu/class/cs193p/cgi-bin/index.php
