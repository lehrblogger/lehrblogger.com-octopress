---
layout: post
featured: false
title: "Intro to Computational Media - HW2"
permalink: /2008/09/17/intro-to-computational-media-hw2/
dsq_thread_id:
  - 17673071
categories:
  - assignments
  - ITP
  - ITP - ICM
excerpt: "Getting more comfortable with complexity."
---
I expanded on my previous Koch Snowflake Processing sketch to allow for simple zooming and moving. This Zoom Snowflake is also at [OpenProcessing][1].

The Snowflake is currently limited to a constant maximum depth (with around 3k edges) -- otherwise it will crash my browser. I considered improving the zooming functionality to only keep track of the edges that were visible, and thus allow for more depth at high levels of zoom, but I didn't have time to implement it this week.

Many complexities arise for the different cases -- zooming out from the whole snowflake, zooming out from a corner, zooming out from a view of the snowflake with two discontinuous pieces, zooming out from a view with no edges, zooming in on a corner, etc -- and handling them all in my existing framework seemed impractical and inelegant.

I think I would have needed to rework the entire algorithm, possibly using a layering system (for the different levels of zoom) and/or a center-centric system (drawing each edge not from its parent edges but instead calculated (with a lot of trig) from the location of the center).

 [1]: http://openprocessing.org/visuals/?visualID=392
