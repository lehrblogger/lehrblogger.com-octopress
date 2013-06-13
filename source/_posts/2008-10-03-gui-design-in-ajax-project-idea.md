---
layout: post
featured: true
title: "GUI Design in AJAX - Keyboard Portfolio"
permalink: /2008/10/03/gui-design-in-ajax-project-idea/
dsq_thread_id:
  - 17673079
categories:
  - ITP - AJAX
  - assignments
  - ITP
  - web ideas
---
For several months now I've been interested in graphical interfaces that use the screen as a window onto a (sometimes infinite) two-dimensional plane. I envision all of the information is displayed on this plane, with the various types of information differentiated by size and location. One would zoom in or out to view the information at different levels in a hierarchy, rather than have separate pages (which are really windows onto finite planes at a fixed zoom level) as in more traditional layouts.

I've seen a few sites with all of their content placed on a plane like this:

 * [Dan Phiffer][1] has a Javascript scrollable plane at a fixed zoom level
 * Shigeru Ban's page for his [Metal Shutter Houses][2] project appears as a piece of paper, and lets you zoom in and out
 * [PRPS][3]'s site is a surface that has different manipulable paper objects

As interesting and innovative as these pages are, I see them all as plagued by awkward interfaces. My idea is to map the website onto an image of the two-dimensional surface of a keyboard. The site would be navigated by single keystrokes, rather than with mouse gestures. Headings would be in large type on the keys, and when one of those keys was pressed, the window would zoom in around that key. The project data on the surrounding keys would then be legible, and a project could be chosen by striking one of those keys. Image thumbnails on the project keys could be enlarged with a corresponding number key. The spacebar could zoom out, and arrow keys could pan horizontally around the plane.

I put together a rough sketch file showing different zoom levels and data ([PDF][4]).

I thought the idea would work well with a personal portfolio, sorting projects into approximately three categories of eight or so projects each (clustered around, say, the 's', 'g', and 'k' keys). I originally thought a Flash implementation would be required, but I will explore how much of it can be done in Javascript.

 [1]: http://www.phiffer.org/
 [2]: http://www.metalshutterhouses.com/content/default.htm#
 [3]: http://www.prpsgoods.com/
 [4]: /projects/fall08/ajax/hw3/apple_layout.pdf
