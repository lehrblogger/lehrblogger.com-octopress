---
layout: post
featured: false
title: "GUI Design in AJAX - Keyboard Content Management Pages"
permalink: /2008/11/04/gui-design-in-ajax-keyboard-content-management-page/
dsq_thread_id:
  - 17673111
categories:
  - assignments
  - ITP
  - ITP - AJAX
blurb: "Reinventing the CMS-wheel."
show_blurb: true
---
I set up a local MySQL database to store the information about the keys, and I made two web pages to interact with that database. The first displays a table of the current contents of the database (currently, what text is associated with each key) and the second allows you to add, update, or delete database entries for the keys.

Much of the work involved was learning how to use PHP and MySQL , and the functionality I implemented is effectively just a tiny subset of what you might find in [phpMyAdmin][1]. It will be necessary later, however, for dynamically re-generating the HTML page for the actual keyboard site whenever I update the content; this will allow search engines to index the content in their crawls. In addition, I can also generate the images of the keys (based on their content) that will be used to create a smooth key resizing effect.

I'm not going to create a web-hosted database and upload the files and get everything working for this update, but the new files can be viewed on github: <http://github.com/lehrblogger/keyboard-portfolio/>

 [1]: http://www.phpmyadmin.net/home_page/index.php
