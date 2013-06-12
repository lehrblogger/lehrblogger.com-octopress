---
layout: post
featured: false
title: "Programming A to Z - Delvicious, Django and Assignment #8"
permalink: /2009/03/31/programming-a-to-z-delvicious-django-and-assignment-8/
dsq_thread_id:
  - 17673220
categories:
  - ITP - A2Z
  - assignments
  - ITP
  - projects
---
*project page [here][1] with overview and previous posts*

Since I had already worked with XML and web services for my [midterm project][2], I decided to take [this week's assignment][3] for Programming A to Z as an opportunity to continue work on that project. I thought that a good next step would be to use App Engine's Datastore to store the necessary information about all of a user's bookmarks, and I would again access that data initially as an XML document obtained from the Delicious API.

I had already begun to learn the Python web framework [Django][4] for the Textonic project for Design for UNICEF, and it seemed like it would provide a rich set of useful tools for this project as well. The Datastore does not work, however, like the relational databases with which I am more familiar. Django relies by default on a relational database and is thus incompatible with Google's Datastore out-of-the-box, but there are two software projects that aim to reconcile these differences. Google's App Engine Helper ([tutorial][5], [code][6]) seemed less well- and less actively-developed than app-engine-patch ([tutorial][7], [code][8]), so I decided to go with the latter.

Django is quite powerful and gives you a lot of functionality for free, but when trying to branch out from various tutorials I encountered the somewhat strange challenge of figuring out exactly what it did for you and what it didn't. It took me a quite a while to get the hang of working with Django on App Engine, so I didn't have time to actually get the XML stored in a reasonable set of Models in the database. I have, however, gotten successful storage of Delicious logins to work, which is a good first step. The updated code is available on [GitHub][9], and I should be able to make additional improvements soon.

 [1]: /delvicious/
 [2]: /2009/03/10/programming-a-to-z-delvicious-initial-implementation-details/
 [3]: http://www.decontextualize.com/teaching/a2z/a-significant-markup/
 [4]: http://www.djangoproject.com/
 [5]: http://code.google.com/appengine/articles/appengine_helper_for_django.html
 [6]: http://code.google.com/p/google-app-engine-django
 [7]: http://code.google.com/appengine/articles/app-engine-patch.html
 [8]: http://code.google.com/p/app-engine-patch/
 [9]: http://github.com/lehrblogger/delvicious/