---
layout: post
featured: false
title: "Programming A to Z - Delvicious Alpha"
permalink: /2009/05/04/programming-a-to-z-delvicious-alpha/
dsq_thread_id:
  - 17673227
categories:
  - projects
  - ITP
  - ITP - A2Z
excerpt: "Theoretically this thing should still work."
show_excerpt: true
---
*project page [here][1] with overview and previous posts*  
#### <http://delv-icio-us.appspot.com/>

A very alpha version of Delvicious is live at the above link! You can currently sign in with your Delicious account (or use one of the ones I posted towards the bottom of the [GitHub page][2]), tell it to fetch all of your bookmarks (making a copy of the URLs in Google's datastore), and then perform searches of those pages using a Google Custom Search Engine that is created on the fly[^1] from XML files that are automatically generated and served by App Engine. I've had a little trouble getting the CSE's to work the first time a user tries to use the search box, and I suspect that the search engines are not immediately ready for use after their (implicit) creation (which I think happens when the user first tries to do a search). One of the first of many next steps is to find a way to initialize that search engine automatically and inform the user (via email) when it is ready. If it's not working for you, wait a little while and try again later.

There's a lot of other functionality I want to add, and other next steps include:

 * automatic updating of a user's Delicious bookmarks, modifying only the necessary entries in the Datastore to reflect the changes on Delicious
 * leveraging Delicious tags to improve search results - both by using them as [refinements][3], and by being sure to return results that have the tag you are searching for (I'd love to have support for a "tag:tagname" operator in the search box)
 * an option to leverage the number of other users on Delicious who have bookmarked a site to improve search results, since presumably heavily bookmarked pages are more useful
 * Delicious results optionally displayed side-by-side with the Google results, both for comparison, and to make sure that all useful results are found (currently Delicious finds things that Google doesn't) (I might use the [Beautiful Soup][4] HTML parser to scrape the results from the Delicious search pages since they aren't exposed by the API)
 * improve authentication with Delicious
 * explore ways to support the searching of private bookmarks (but I'm not sure this is possible, since Google needs public XML files to create the search engines)
 * do the graphic design for the various pages

I will continue to work on the project over the summer, and I hope to launch an initial version within the next month or two.

[^1]: I did this using [Linked Custom Search Engines][5], and it's worth noting that this was not the original plan. I had intended to ask users to authenticate with both Google *and* Delicious, and use the Google authentication for the creation of and interaction with CSE's using HTTP requests. CSE's only support [Client Login][6] authentication, however, which is intended for desktop/mobile applications and requires users to manually type in their usernames and passwords. I knew that I would not be able to convince users to give me their unencrypted Google login information (nor did I really want to possess it), so, without the ability to authenticate Google users on a google.com Google sign-in page, I was going to need an alternate solution.

 [1]: /delvicious/
 [2]: http://github.com/lehrblogger/delvicious
 [3]: http://code.google.com/intl/en/apis/customsearch/docs/refinements.html
 [4]: http://www.crummy.com/software/BeautifulSoup/
 [5]: http://www.google.com/coop/docs/cse/cref.html
 [6]: http://code.google.com/intl/en/apis/gdata/auth.html#ClientLogin
