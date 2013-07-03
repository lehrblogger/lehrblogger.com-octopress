---
layout: post
featured: false
title: "Programming A to Z - Delvicious, Initial Implementation Details"
permalink: /2009/03/10/programming-a-to-z-delvicious-initial-implementation-details/
dsq_thread_id:
  - 17673200
categories:
  - projects
  - web ideas
  - ITP
  - ITP - A2Z
blurb: "Delicious API + Google Custom Search Engine + Google App Engine"
show_blurb: true
---
For my midterm project for [Programming A to Z][1] I decided to start working on a Delicious / Google Custom Search Engine mashup that I've been wanting to make for a few months. It will be called Delvicious, and a complete description of the project can be found on its [project page][2]. This post will primarily be about the initial implementation details and the progress I've made so far, but will conclude with some future plans.

I started off by looking at various options for getting a user's bookmarks on the Delicious [Tools][3] page. I decided to use RSS feeds for the very first version, but those are limited to 100 bookmarks and I knew that I'd have to switch to something else later. I spent a long time familiarizing myself with Google's [Custom Search Engine][4] tools -- there are a lot of options for customizing the sites available to the custom searches. I ultimately decided that I needed the power and flexibility of a self-hosted XML file of annotations that would contain the URL's of the sites to be searched. In addition, this seemed like a good project to start learning a programming language called [Python][5].

I dusted off an old Delicious account, [memento85][6], and added a few random bookmarks. I made a Python script that retrieved the most recent 100 bookmarks for a user as a JSON object and wrote the url's from those bookmarks to a properly formatted annotations XML file. It took some trial and error, but Python was generally painless and you can see the script that I used [here][7] as a txt file. I then set it to run a few times an hour as a cron job on my server, and this made sure that my annotations XML file would be updated when my bookmarks changed. (Note that changes to the XML are not immediately reflected in the CSE, but this is ok -- people can remember the sites that they've been to in the last few hours on their own).

Once that was working I set up a second CSE to use another Delicious account, [lehrblogger][8], that had many more of my bookmarks imported. The annotations file made by bookmarksearch.py for this account looked like [this][9]. Adding this xml as the annotations feed in the CSE results in the following functional custom search engine -- try it out below or go to the search's <a href=" [homepage][10].

<form action="http://www.google.com/cse" id="cse-search-box">
<div>
<input type="hidden" name="cx" value="009810118062903062392:kucrzepmu5o" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="text" name="q" size="31" />
<input type="submit" name="sa" value="Search" />
</div>
</form>
<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>

But why, exactly, is such a thing especially useful? Let's say that I am looking for a specific site that I am sure that I had bookmarked a while ago and want to find again. I know it has something to do with SMS, but can't be sure of any other keywords. If I do a search for 'sms' on my Delicious account, I get [only one result][11]. It is returned by the search because I tagged this result with 'sms', but perhaps it is not the site I was looking for and I am still certain that the other site is in my bookmarks. I could use the Custom Search Engine to search the full text of these same bookmarks, and this returns [these four results][12], the one found by Delicious and three others. If I had been looking for, say, the first result, it would have been very difficult/tedious to find with only the tools offered by Delicious.

After that initial part of the project was both working and useful I started to think about ways in which it could be expanded. The Google CSE supports [refinements][13], or categories of search results, which allow a user to quickly filter for results of a given topic. I thought there was a nice parallel between refinements and Delicious' tags, and it seemed like a good next step to use the tags as refinements by pairing them in the annotations XML file with their respective URLs.

This feature also requires, however, that the main file that defines the CSE list all of the refinements. Google does provide an API for easily modifying this file, but a user must be authenticated with Google as the owner of CSE. I needed the updates to happen regularly as part of a cron job, and it would not work for each user to need to authenticate (i.e. type in her Google username and password) each time the CSE was updated. Even if I found a way to use authentication data as part of the cron job, I was concerned about storing that sort of sensitive information on my own server.

Thus it made sense to make a much larger jump forward in the project than I intended so early on: I decided to rebuild the application to run on Google's [App Engine][14]. App Engine is a scalable hosting/infrastructure system on which to build rich web applications, and it offers substantial free bandwidth and CPU time as well as a competitively priced payment plan for larger/more popular applications.

App Engine uses Python and is well documented, so I dove in with the Hello World example. A good first step seemed to be to get the annotations XML file populated by the bookmarks returned by Delicious API call made by App Engine, and next I needed a way to serve that file at a persistent URL for the CSE to use. These things were more challenging than I expected -- I had difficulty authenticating with Delicious, parsing the XML (as opposed to JSON) data that came back, and finding a way to serve those URLs as a properly formatted XML file. I initially looked for a way to write the URLs to a [static file][15], but eventually found a detailed [tutorial][16] on writing blogging software for the App Engine, and I was able to adapt the RSS publishing portion of that example for my purposes.

The annotations XML files were now being published to URLs such as <http://delv-icio-us.appspot.com/annotations/memento85> but currently it only works for that one user and you can actually put whatever you want after "annotations/". Once I had App Engine making a call to the Delicious API and serving the resulting bookmark URLs in an annotations XML file, it was easy to set up a new custom search engine, this time for the handful of bookmarks of [memento85][6].

<form action="http://www.google.com/cse" id="cse-search-box2">
<div>
<input type="hidden" name="cx" value="009810118062903062392:k4ronzyjnvs" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="text" name="q" size="31" />
<input type="submit" name="sa" value="Search" />
</div>
</form>
<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box2&lang=en"></script>

Because the process of getting the above working involved so much trial-and-error, and because I intend to continue developing the project into a more complex application, I set up a [GitHub project][17] for the App Engine portion of Delvicious. There are many, many things left to do before the project is complete. I will need to:

 * understand Google's Datastore so that I can store information about the Google accounts of users and the Delicious accounts paired with them. 
 * also store the bookmark data for each user in the Datastore -- too many API calls are required to fetch the entire list of bookmarks each time the XML is served, and it makes much more sense to store the bookmarks again and update them as new bookmarks are added. This also saves the need for the cron job -- I can simply fetch new bookmarks whenever the CSE requests the annotations XML.
 * design the various pages of the application, including signup and account management.
 * develop the search page -- ideally I can present the user with a single search box that will use both the built-in Delicious search and the Custom Search Engine and present the results side-by-side.

I'm excited about implementing these features and hope to continue this project for the remainder of the course. Delvicious will be a good opportunity to learn Python, familiarize myself with building web applications using the App Engine, and create a mashup that people might find truly useful.

 [1]: http://a2z.decontextualize.com/
 [2]: /delvicious/
 [3]: http://delicious.com/help/tools
 [4]: http://www.google.com/coop/cse/
 [5]: http://python.org
 [6]: http://delicious.com/memento85
 [7]: /projects/spring09/a2z/midterm/bookmarksearch.txt
 [8]: http://delicious.com/lehrblogger
 [9]: /projects/spring09/a2z/midterm/annotations.xml
 [10]: http://www.google.com/coop/cse?cx=009810118062903062392:kucrzepmu5o
 [11]: http://delicious.com/search?p=sms&u=lehrblogger&chk=&context=userposts&tag=&fr=del_icio_us&lc=0
 [12]: http://www.google.com/cse?cx=009810118062903062392%3Akucrzepmu5o&ie=UTF-8&q=sms&sa=Search
 [13]: http://code.google.com/intl/en/apis/customsearch/docs/refinements.html
 [14]: http://appengine.google.com/
 [15]: http://code.google.com/appengine/docs/python/gettingstarted/staticfiles.html
 [16]: http://brizzled.clapper.org/id/77
 [17]: http://github.com/lehrblogger/delvicious/