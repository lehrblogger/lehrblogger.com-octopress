---
layout: post
featured: false
title: "GUI Design in AJAX - HW4, HW5"
permalink: /2008/10/17/gui-design-in-ajax-assorted-assignments-from-hw5-hw6/
dsq_thread_id:
  - 17673094
categories:
  - assignments
  - ITP
  - ITP - AJAX
excerpt: "Even more Javascript."
---
I used the first few assignments for experimentation with the canvas tag to begin to think about the implementation of my [keyboard project][1]. For the first part, I used some Javascript and CSS to draw out rows of boxes for a basic keyboard layout. The second example draws and then resizes a simple rectangle within a canvas tag using scale() and translate(), but it should work for any content.

I initially had (in HW5 Part 2a) some question about whether I should use one canvas tag for the entire keyboard or multiple canvas tags for each key. I was thinking that it makes much more sense to use one for the whole keyboard, since everything will be scaling and translating at once (perhaps with photos off the screen not switching to a larger version? hmm). I started to run into problems, however, when I began to look into displaying text on a canvas tag. There [are a][2] [few][3] [alternatives][4], and maybe [something][5] that doesn't work in Firefox yet, but all seem to involve drawing the actual typecface vectors manually. This might work for now, but it would be nice to have selectable text on the pages, and I'm worried about S(earch)E(ngine)O(ptimization) later on, so I decided to look for other ways to make it work.

Instead, I continued to move forward with representing the keys as div tags (in HW5 Part 2b). I made a fair amount of progress displaying the keyboard, adding key listeners, and moving keys around appropriately. Multiple sizes are almost, but not quite, working, and once that is done I can work on tweens. I still need the text to resize smoothly though, and might be able to get something based off of [this idea][6] to work well, but I'm skeptical. Does anyone know of any other solutions? Maybe generating an image for each text field, and replacing the text with that when it's being resized, and shrinking the image, and then replacing the image with text again when it's done resizing?

More on that project later this week -- the last assignment here was to modify the 'animals' example that he presented in class. It was the first example we had seen of a full web project -- using HTML, CSS, and Javascript, as well as PHP and MySQL to pull information from a database. I had an absurd amount of trouble getting it to work on either the Dreamhost or the ITP servers, but I finally resolved the various issues. Getting the naming to work was much more manageable, but I learned the basics of using a database in the process. (The information for the animals is stored in a single database, so all visitors to the site are viewing and modifying the same animals -- refresh the page to see any changes made by others.)

Note that I've noticed these are acting sporadically in browsers other than Firefox 3+, and I'll try to figure out the browser compatibility issues this week.

HW4 Part 1: <{{site.url}}/projects/fall08/ajax/hw4/part1/>
HW5 Parts 1 and 3: <{{site.url}}/projects/fall08/ajax/hw5/parts1and3/>  
HW5 Part 2a: <{{site.url}}/projects/fall08/ajax/hw5/part2a/>  
HW5 Part 2b: <{{site.url}}/projects/fall08/ajax/hw5/part2b/>  
HW5 Part 4: <{{site.url}}/projects/fall08/ajax/hw5/part4/>

 [1]: /2008/10/03/gui-design-in-ajax-project-idea/
 [2]: http://osteele.com/sources/javascript/docs/textcanvas
 [3]: http://canvaspaint.org/blog/2006/12/rendering-text/
 [4]: http://www.federated.com/~jim/canvastext/
 [5]: http://developer.mozilla.org/En/Canvas:Text
 [6]: http://developer.apple.com/internet/webcontent/examples/advanced_letters.html#
