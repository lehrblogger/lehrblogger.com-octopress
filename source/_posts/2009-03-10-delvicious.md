---
layout: project
featured: false
title: "Delvicious"
permalink: /delvicious/
alias: /2009/03/10/delvicious/
end_date: 2009-05-04
categories:
  - ITP - A2Z
  - assignments
  - ITP
  - projects
excerpt: "Full-text search for your Delicious bookmarks."
show_excerpt: false
thanks:
  - name: John Rutherford
    link: "http://observationalgastrophysics.blogspot.com/"
thanks_note: "coming up with the name, which is often, but not always, the hardest part of doing anything on the web."
---

#### Delvicious will make it easy to find what you've found before, no matter how disorganized you are.

A mashup of the Delicious API and the Google Custom Search Engine API, Delvicious will allow users to easily perform a full-content search of *only* the sites that they have bookmarked, freeing them to delve fearlessly into muddled memories of poorly-tagged favorites.

Links and Related Posts:

* [Delvicious on Appspot][1] (currently *very* incomplete)
* [Delvicious on GitHub][2]
* 05/04 -- [Programming A to Z -- Delvicious Alpha][3]
* 04/15 -- [Programming A to Z -- A Delvicious Milestone][4]
* 03/31 -- [Programming A to Z -- Delvicious, Django and Assignment #8][5]
* 03/10 -- [Programming A to Z -- Delvicious, Initial Implementation Details][6]

Over the years I have accumulated a couple thousand web bookmarks (also known as favorites in some browsers), and for a few months I've been looking for ways to make them more accessible. The in-browser folder-based bookmark organization tools were overwhelmed long ago by the sheer number of links, and I've more recently been exploring online tag-based services such as [Delicious][7] and [Diigo][8]. These sites offer solid tagging systems, cross-browser compatibility, and some interesting social features. Their search functionality, however, is relatively weak. You can search your bookmarks by tag or keyword, but the tags need to be user-defined and the keywords must be found in the title or description.

One of the many services Google offers is called [Custom Search Engine][9], which allows you to create a Google search of the corner of the internet of your choosing. Google provides a powerful set of configuration options for specifying the site(s) to be searched and tweaking the results to your needs, as well as an API for creating and modifying these search engines programmatically.

My goal with this project is to use the [Delicious API][10] to fetch a user's bookmarks and provide a dynamically-updated custom search tool for that user that indexes only those bookmarks. I plan to host Delvicious on the Google [App Engine][11] so that it can be a scalable tool for both myself and others.

 [1]: http://delv-icio-us.appspot.com/
 [2]: http://github.com/lehrblogger/delvicious
 [3]: /2009/05/04/programming-a-to-z-delvicious-alpha/
 [4]: /2009/04/15/programming-a-to-z-a-delvicious-milestone/
 [5]: /2009/03/31/programming-a-to-z-delvicious-django-and-assignment-8/
 [6]: /2009/03/10/programming-a-to-z-delvicious-initial-implementation-details/
 [7]: http://delicious.com
 [8]: http://diigo.com
 [9]: http://www.google.com/coop/cse/
 [10]: http://delicious.com/help/api
 [11]: http://appengine.google.com/
