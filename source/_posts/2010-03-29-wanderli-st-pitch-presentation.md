---
layout: post
title: 'Wanderli.st -- Pitch Presentation'
permalink: /2010/03/29/wanderli-st-pitch-presentation/
dsq_thread_id:
  - 80330468
categories:
  - ITP
  - ITP - thesis
  - presentations
  - projects
  - Wanderli.st
---
I gave this five-minute presentation at ITP on Saturday as part of the Startup Talk/Pitch Fest organized by faculty member Nancy Hechinger. Ron Conway and his partners at SV Angel, Dennis Crowley of Foursquare, Tom Cohen, and other members of the ITP community were in the audience. I got some good feedback and people were interested in the idea.

A PDF of the one-page handout I passed around is [here][1]. I've included the notes that I followed roughly during the presentation below the fold, since Google makes it hard to find them otherwise. The presentation can be conveniently accessed at <http://bit.ly/wanderlist-20100327>.

{& iframe_embed google dhh97gc8_639hnh6tdw %}
  
Slide Numbers:

1.  Hi!
    
    My name is Steven Lehrburger.
    
    I'm in my last semester at ITP and I code part time at bit.ly.
    
    For my thesis I'm building an alpha version of Wanderli.st,

2.  So that people can wander the Internet, and bring their friends.

3. Wanderli.st will enable us to socialize within online contexts that are like the offline contexts we are so used to.

4. It will be an online tool for managing and synchronizing relationships across social web sites.

5. This xkcd map of online communities suggests a parallel between offline and online social spaces.
   
   Physical space is an essential part of our social interactions -- only the people in this room can hear me now, and I'm able (and expected!) to act differently in different social contexts -- say, if I'm with my family around the dinner table or at a bar with my friends.
   
   (comic from http://xkcd.com/256/)

6. I was looking at this map and thinking about how, on the Internet, we have different websites instead of different spaces.
   
   I have accounts on Facebook and Twitter and Foursquare and Flickr and GitHub and each of them could be for sharing a different sort of thing with a different group of people, just like I get to do with physical space in the real world..
   
   But instead, I have only the vaguest of ideas about what my Internet-wide social graph looks like, across web sites.
   
   I have hundreds more "friends" on Facebook than I actually do in real life, so that graph is hopelessly over-saturated.
   
   On the other hand, there are many websites where I've only bothered to add a handful of friends.
   
   My real-world social contexts don't currently map very well to my online social contexts, and it's too much work to fix.
   
   I don't know know who I'm friends with on which sites, and I don't even know who has accounts on those sites.
   
   I don't know who can see which of the things I share, and I certainly don't have a single place I can go to understand and manage my tangled social graph.
   
   I'm building Wanderli.st to solve this problem.
    
   (photo from http://www.flickr.com/photos/insunlight/3946559430/)

7. So how is this going to work?

8. On one side we have various ways of accessing a user's address book, and Google Contacts is one with a nice API.
   
   On the other side we have the aforementioned social web sites that also have APIs.

9. Wanderli.st will act as a layer between the two, using the APIs on both sides to read in information about a user's social data.
   
   Google essentially has all the email addresses I've ever used, and these web sites have APIs that let you search for a user based on email address.
   
   (And this is essentially how their address book import tools work, but those don't scale when you have to make a decision about hundreds of people for each additional website.)
   
   Wanderli.st could then show me visualizations of the people I know, which sites they use, and where I am friends with them. Which will be pretty cool.

   But there's more!
            
10. What if I could organize my contacts into groups, based on the real-world contexts in which I actually know them?
    
    These are some of the ones I might use, I'd have others as well, and each person could have different contexts.
    
    And many of these web sites have \*write\* APIs for their social data in addition to read APIs.

11. So Wanderli.st could then modify relationships on these other web sites, based on these custom groups, adding and removing other people as friends accordingly.
    
    For example, my classmates at ITP and my coworkers at bit.ly can be my friends on Foursquare and know where I am, but I my ex-girlfriends, not so much.

12. To summarize, this is cool because users get to understand their social lives in a way they couldn't before.
    
    Users can maintain a single list of their friends and contacts
    
    And if they want to join a new site, they can just select the appropriate groups, and this lowers the activation cost of trying new sites.
    
    This is a better way for users to manage their privacy. Rather than deal with confusing settings within an account, users can simply restrict content to be viewable only by their friends, and manage those connections accordingly.
    
    And everything can sync! If you meet someone new it's easy to add them to the places you want and not anywhere else.
                        
    When people can move from one web site to another and take their friends with them, they can go to the places want to be, and have a better social experience on the Internet.

13. So that's Wanderli.st.
    
    Moving forward, I'm looking primarily for a software developer to build this with me, and for a business person to help me run this as a company.
    
    I'd love to hear your feedback, and thank you for listening!

 [1]: http://lehrblogger.com/nyu/projects/thesis/wanderlist_pitch_web.pdf
