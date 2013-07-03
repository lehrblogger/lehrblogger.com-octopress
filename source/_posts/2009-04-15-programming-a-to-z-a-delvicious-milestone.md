---
layout: post
featured: false
title: "Programming A to Z - A Delvicious Milestone"
author: Lehrblogger
permalink: /2009/04/15/programming-a-to-z-a-delvicious-milestone/
dsq_thread_id:
  - 17673225
categories:
  - projects
  - ITP
  - ITP - A2Z
blurb: "Proof-of-concept for full-text search of my bookmarks."
show_blurb: true
---
*project page [here][1] with overview and previous posts*

I've had to focus on other projects for the past couple of weeks, but I finally got to turn my attention back to Delvicious. It will now:

 * keep track of Delicious login information for a particular Google account
 * fetch those bookmarks using the Delicious API and store them in the GAE Datastore
 * serve the bookmarks back as an XML file to a user-specific URL

There's enough functionality to make it worth visiting the appspot page [here][2]. Sign in with Google, enter your Delicious credentials, and fetch your bookmarks - you should see them displayed in a list. You could then make a custom search engine, go to the advanced tab on the left side bar, and add a URL of the form `delv-icio-us.appspot.com/delvicious/annotations/[your_delicious_username].xml` as an annotations feed. Your bookmarks should then start appearing in your search results. Test out the new version (that searches memento85's small number of Delicious bookmarks) below:

<form action="http://www.google.com/cse" id="cse-search-box">
<div>
<input type="hidden" name="cx" value="009810118062903062392:bn2n4nvhjck" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="text" name="q" size="31" />
<input type="submit" name="sa" value="Search" />
</div>
</form>
<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>

I need to clean up the interface navigation, but the real next step is to dive into the CSE API [documentation][3] and automate the creation of the search engine so that one is automatically paired with a Google users Delicious account.

 [1]: /delvicious/
 [2]: http://delv-icio-us.appspot.com/delvicious/
 [3]: http://code.google.com/intl/en/apis/customsearch/docs/dev_guide.html