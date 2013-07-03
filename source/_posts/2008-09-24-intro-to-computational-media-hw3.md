---
layout: post
featured: false
title: "Intro to Computational Media - HW3"
permalink: /2008/09/24/intro-to-computational-media-hw3/
dsq_thread_id:
  - 17673077
categories:
  - assignments
  - ITP
  - ITP - ICM
blurb: "In order to understand recursion,"
show_blurb: true
---
I further expanded on my previous Koch Snowflake Processing sketch to allow for dynamic zooming and moving. This Dynamic Snowflake is also at [OpenProcessing][1].

To deal with memory issues for huge numbers of points, it only draws down to the level of 2px-long edges. Thus, only so many pixels are visible at a given time. Additionally, the zoom factor has an upper limit so that it does not increase indefinitely (but you can still keep zooming). 

I rewrote nearly the entire program to implement these changes, and found the previous Edge class and heavy use of recursion not practical for the problems I was trying to solve. This surprised me given the highly recursive and self-similar nature of a fractal, and I think these projects were valuable case studies for me in algorithm choice.

 [1]: http://openprocessing.org/visuals/?visualID=414
