---
layout: post
featured: false
title: "presence monitoring at ITP"
permalink: /2008/05/27/presence-monitoring-at-itp/
blogger_blog:
  - lehrburger.blogspot.com
blogger_author:
  - Steven Lehrburgerhttp://www.blogger.com/profile/01324094738204359728noreply@blogger.com
blogger_permalink:
  - /2008/05/presence-monitoring-at-itp.html
dsq_thread_id:
  - 17673050
categories:
  - web ideas
blurb: "The sort of idea that at least one ITP student has per year..."
show_blurb: true
---
in class today there was discussion of various notification systems for ITP students about the state of particular systems on the floor (the foosball table, free food, etc). text messages provide a pretty easy way to do this, but the system would need a way of knowing not to bother notifying people who were not on the floor

since access to the floor happens (almost?) exclusively through the elevator and adjacent stairwell, it might be feasible to use this bottleneck to make note of people entering and leaving. Rob mentioned previous attempts to have someone swipe a card, but it seems an [E(lectronic )A(rticle )S(urveillance)][1] system similar to those used in retail stores to protect against shoplifters might work well. the units cost one or two thousand dollars new, but they've been around for a while so maybe older/cheaper models are available. then each student could carry an RFID or similarly purposed chip in his/her wallet, and the scanners could note when that person passes through (without, of course, making the noise)

a pretty powerful API could be created for the system that other students could build on. it would be useful to be able to query the system about whether a certain person was on the floor or not (this might avoid the privacy concerns that people had with BlueWay), and individuals could sign up for the notifications that interested them.

 [1]: http://en.wikipedia.org/wiki/Electronic_article_surveillance
