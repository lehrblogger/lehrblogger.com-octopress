---
layout: post
featured: false
title: "Intro to Computational Media - TwiTerra Milestone (Final Project Progress)"
permalink: /2008/12/04/intro-to-computational-media-twiterra-milestone-final-project-progress/
categories:
  - assignments
  - ITP
  - ITP - ICM
excerpt: "Jumping tweets :)"
---
*project page with previous posts [here][1]*

I resolved a couple of bugs in the line drawing animation, and now my database calls are made for each tree before it attempts to start drawing lines (allowing for a smoother animation). I also got the built-in View state iterator to work and make the globe rotate. Although much needs to be done before the project is ready to present, i think I've found solutions to the major challenges. A video is below:

{% iframe_embed vimeo 2428164 %}  
[TwiTerra Milestone][2] from [me][3] on [Vimeo][4].

I am hoping to do a number of things before presenting it in class next week, but for now I need to spend a few days working on my AJAX keyboard portfolio project. This list includes:

 * the spinning of the globe should follow the animation of the tweet lines, rather than spin continuously (this should eliminate the unwanted pause between rotations)
 * the lines between tweet coordinates are not interpolating correctly due to the way that latitude and longitude correspond to globe positions -- this just needs a little bit of math to fix
 * I need to show the text of the tweet, either as an Annotation object on the globe or somewhere else
 * I want to filter so that I am showing the most interesting trees, based on tree complexity, the distance between tweets and the locations of the tweets

 [1]: /twiterra/
 [2]: http://vimeo.com/2428164
 [3]: http://vimeo.com/user574059
 [4]: http://vimeo.com
