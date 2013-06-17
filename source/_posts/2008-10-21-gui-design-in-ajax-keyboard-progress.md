---
layout: post
featured: false
title: "GUI Design in AJAX - Keyboard Progress"
permalink: /2008/10/21/gui-design-in-ajax-keyboard-progress/
dsq_thread_id:
  - 17673096
categories:
  - assignments
  - ITP
  - ITP - AJAX
excerpt: "Javascript performance issues, already."
show_excerpt: true
---
I made substantial progress on the main layout and animation for my keyboard portfolio. The keyboard is built dynamically from what is now an array of letters, and I used the MooTools tween/morphing functionality to handle the animation. Tweening of both the size and location of keys on the full keyboard at 24 fps seems to be more than my browser can handle, however, and I need to figure out a way to improve performance. There are three versions below - the first is without any tweening, the second is with tweening for only a part of the keyboard, and the third is with tweening for the whole keyboard.

In all versions, clicking on or typing a letter will zoom in on that letter, and spacebar zooms out keeping that letter in the upper left. I'm using Firefox 3.0.3 to view these, and I'm not sure if other browsers will work.

(It was much trickier than I expected to get the keys to change and move correctly, so I didn't have time to modify the Flickr/GoogleMaps/YouTube/Twitter examples -- I will later this week.)

HW6 Part 1 (no tweens): <{{site.url}}/projects/fall08/ajax/hw6/part1_notweens>  
HW6 Part 1 (partial keyboard): <{{site.url}}/projects/fall08/ajax/hw6/part1_partial>  
HW6 Part 1 (all): <{{site.url}}/projects/fall08/ajax/hw6/part1_all>  
HW6 Part 2: <{{site.url}}/projects/fall08/ajax/hw6/part2>

 