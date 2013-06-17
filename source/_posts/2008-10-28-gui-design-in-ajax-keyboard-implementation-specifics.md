---
layout: post
featured: false
title: "GUI Design in AJAX - Keyboard Implementation Specifics"
permalink: /2008/10/28/gui-design-in-ajax-keyboard-implementation-specifics/
dsq_thread_id:
  - 17673109
categories:
  - assignments
  - ITP
  - ITP - AJAX
excerpt: "I have a GitHub account now!"
show_excerpt: true
---
**recently**: [current upload][1]  
*previously*: [initial idea][2], [implementation experiments][3], [early progress][4]

I've been having some issues with browsers other than Firefox, and I think most of them were stemming from my use of console.log for debugging in Firebug. David Nolen (the course instructor) posted a [solution][5] to this issue, and all past projects should now be working. I also fixed a few other Safari-specific issues in the keyboard project.

I decided to use [Git][6], a popular [version control system][7], for the continuation of the project. This will allow me to keep track of changes and progress in a sane and flexible way. I'm also going to use [GitHub][8], a collaborative code hosting service, to make it easier for others to comment on and contribute to the project as it moves forward. You can visit the GitHub repository of the project here: <http://github.com/lehrblogger/keyboard-portfolio>.

I began to explore the powerful Flickr API, and plan to use it as the source of the photos for the portfolio. Provided that it proves to be fast enough, it should simplify image uploading, facilitate various file sizes, and create a unified place for comments. Image names and captions on Flickr will also be displayed on the website. Image categories and projects will be tracked using tags. (Each category and tag will probably have a 'slug' in the database (more on that later), and the tag should use that slug.) I've used 'category2', project1' and 'image1' in this example, which just pulls a single image from Flickr using the API -- <<{{site.url}}/projects/fall08/ajax/hw6/part2>.

I started to think in detail with David about how I was going to implement various parts of the site, and I set up Apache and a MySQL database on my local machine to facilitate testing. All of the page content will be managed through interaction with the database (possibly through a content management page). Saving this page will automatically generate new Javascript and HTML for search engines to crawl and index.

Each standard keyboard key will always have an entry in the database, and this won't be changeable from the CMS (content management system). Each key will have one of four possible modes -- category, project, blank, and hidden -- and other available table entries will depend on which type of key. Most punctuation keys will be hidden, but I will provide support for them in case I need the space for additional content later. Blank keys will have no other data associated with them, and will likely be greyed out on the site. Project keys will have the most associated data -- the project will need a title, descriptive text (with limited HTML formatting), and some number of associated Flickr photos. Category keys will have a category name but no other content.

Note that there will be no difference in how each of the latter two types of keys behave. At the second level of zoom, the focused key and the surrounding keys will all be visible. At the third level of zoom, only the primary key will be visible. At the fourth level of zoom, for viewing the images, the interaction is handled through the number keys (1,2,3,4,5,6,7,8,9,0 -- for up to ten images), and these won't do anything on keys without images. A user can press a project key from the top level, but that user would need to press it again to be able to read it.

The automatic generation of the HTML and Javascript will be a challenge to get working, but they will make it much easier to manage the site. It is likely that the best way to get the text resizing to work will be to replace that text with an identical-looking image, resize the image, and then replace it with text at the new zoom level (or not, for smaller zoom levels). Those images would need to be automatically generated from the text saved to the database via the CMS, and (with David's guidance) I've started to look into using Cairo for doing this on a server.

That might be the trickiest part of this whole thing, but if everything works well together it will be really cool. I'm not quite sure that I've been able to fully convey with clarity my idea of melding content and interface, and I'm excited to have a working example.

 [1]: /projects/fall08/ajax/keyboard-portfolio/
 [2]: /2008/10/03/gui-design-in-ajax-project-idea/
 [3]: /2008/10/17/gui-design-in-ajax-assorted-assignments-from-hw5-hw6/
 [4]: /2008/10/21/gui-design-in-ajax-keyboard-progress/
 [5]: http://formconstant.net/introspect/10/21/preventing-consolelog-from-breaking-browsers/
 [6]: http://git.or.cz/
 [7]: http://en.wikipedia.org/wiki/Version_control_system
 [8]: https://github.com/
