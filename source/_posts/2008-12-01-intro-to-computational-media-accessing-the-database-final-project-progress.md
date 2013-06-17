---
layout: post
featured: false
title: "Intro to Computational Media - Accessing the Database (Final Project Progress)"
permalink: /2008/12/01/intro-to-computational-media-accessing-the-database-final-project-progress/
dsq_thread_id:
  - 17673124
categories:
  - assignments
  - ITP
  - ITP - ICM
excerpt: "More Mysql."
---
*project page with previous posts [here][1]*

I rewrote my Scala code from the Midterm to access a MySQL database for its tweet data instead of the Twitter search API's XML feeds. I used [Lift][2], the Scala web framework, to access the database -- [this tutorial][3] and [this one][4] were helpful, but I would not have been able to get it working without Jorge Ortiz's help. (Thanks!)

The current version is relatively rudimentary, and simply iterates through each of the root tweets in the database (those without a parent) and displays them. It uses the parent_id fields of the children to recursively build trees for each root, and then draws the lines corresponding to the locations of the tweets in that tree on the globe. I have functionality for filtering these trees by the minimum distance between tweets, but later I want to improve it to show only the most interesting/compelling tweets. I also need to figure out how to animate the globe to show the tweets in a smooth and appealing way.

The submission deadline for the ITP Winter Show is Monday December 1st, and I have re-posted the text of my submission over on TwiTerra's [project page][1] -- I'll be likely be updating it as the show approaches.

 [1]: /twiterra/
 [2]: http://liftweb.net/
 [3]: http://liftweb.net/index.php/HowTo_create_a_basic_CRUD
 [4]: http://liftweb.net/index.php/HowTo_configure_lift_with_MySQL
