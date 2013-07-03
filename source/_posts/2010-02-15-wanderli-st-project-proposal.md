---
layout: post
featured: false
title: "Wanderli.st - Project Proposal"
permalink: /2010/02/15/wanderli-st-project-proposal/
dsq_thread_id:
  - '1699 http://lehrblogger.com/?p=1699'
categories:
  - projects
  - Wanderlist
  - ITP
  - ITP - thesis
blurb: "What I was actually planning to build."
show_blurb: true
updates:
  - date: 2011-10-09
    body: "I'm no longer working on the project, so I let the $87/year wanderli.st domain expire and removed that link to minimize confusion."

---
#### wanderli.st -- wander the [internet][1], bring your [f][2][r][3][i][4][e][5][n][6][d][7][s][8]

I propose to design and build Wanderli.st, a new tool that will enable people to manage their contacts across social web services. Wanderli.st will be a web-based contact management application that synchronizes a user's friend lists on both new and familiar web sites. It will serve as a layer between currently-unconnected applications on the social web, linking existing online contact management tools (such as [Google Contacts][9]) with the myriad sites on which people share content (such as [Twitter][10], [Vimeo][11], [Foursquare][12], and [GitHub][13]). 

Wanderli.st will provide users with an improved interface for organizing their existing contacts (which can number in the hundreds or thousands) into a set of manageable, custom groups. Google Contacts currently provides only a rudimentary user interface for those wishing to organize their contacts in this way, so I will create improved tools to make this initial set-up step as fast and easy as possible.

Once a user has organized her contacts into groups, the user will then authenticate her Wanderli.st account with those third-party web services on which she wants to manage her contacts. The user will make selections from her custom groups and assign them to the different services using [basic set operations][14]; Foursquare, for example, might be assigned everyone who is in either the 'school' or 'family' groups except those people who are also in either the 'coworkers' or 'ex-boyfriend' groups. Wanderli.st will then search for user accounts on each of those web services using the names and/or email addresses of only that set of contacts that they've been assigned, and it will then automatically send friend requests to (or, on sites with asymmetric social networks, simply follow) those users. 

Later, if the user makes a change to one of her groups, either by adding a new person she recently met or moving someone from one group to another, Wanderli.st will automatically synchronize that change on each service to which that group has been assigned. In this way Wanderli.st will both lower the barrier to entry that a user faces when trying out a new web service, and will decrease the thought and effort required to keep one's social graph up-to-date across services. 

By making it easy for the user to understand and manage her contacts, Wanderli.st will enable the user to share content that is either very private or simply not "for" everyone with comfort and certainty about which of the people she knows can see each different piece of content. It will also benefit the third-party web services themselves because their users will more actively share content with the users' more complete and easily-managed list of friends.

I plan to write Wanderli.st in [Scala][15] using the [Lift web framework][16], and I'll host it on the [Stax Networks][17] elastic application platform.

Note: I acknowledge that Facebook offers some of this functionality with Facebook Connect, and that in the future it might allow users to leverage Facebook's Friend Lists to selectively export their social network to other sites; Wanderli.st, however, will differ in several critical ways. First, third-party services will only be required to provide a read/write API for users to add and remove contacts, and they will not need to write custom code as they would for Facebook Connect. Second, Wanderli.st will actually duplicate (and then synchronize) the user's social graph on the third-party service, and this is to the advantage of those services because they will then own their social data, rather than rely on Facebook for continued access to the social graph. Finally, because Wanderli.st will only be a collection of spokes (social connections) without a hub (personal profile data, photos, and other content), users can feel confident about connecting Wanderli.st to third party sites, as there will be no private data that users will risk exposing.

 [1]: http://xkcd.com/256/
 [2]: http://www.facebook.com/home.php#/friends/
 [3]: http://twitter.com/following
 [4]: http://foursquare.com/manage_friends
 [5]: http://www.flickr.com/photos/friends/
 [6]: http://www.google.com/contacts
 [7]: http://www.linkedin.com/connections?trk=hb_side_cnts%20is
 [8]: https://github.com/
 [9]: http://www.google.com/contacts
 [10]: http://twitter.com/
 [11]: http://vimeo.com/
 [12]: http://foursquare.com/
 [13]: http://github.com/
 [14]: http://en.wikipedia.org/wiki/Set_%28mathematics%29#Basic_operations
 [15]: http://www.scala-lang.org/
 [16]: http://liftweb.net/
 [17]: http://www.stax.net/
