---
layout: post
featured: true
title: The Problem with Circles and the Pleasure of Carbon Copy
permalink: /2011/07/06/the-problem-with-circles-and-the-pleasure-of-carbon-copy/
dsq_thread_id:
  - 351705043
categories:
  - commentary
  - ITP
  - ITP - thesis
  - Wanderlist
excerpt: "People don't want to sort their friends in real life or on Google+."
thanks:
  - name: Jorge Just
    link: "http://twitter.com/jorgej"
  - name: Abel Allison
    link: "http://groovemechanic.net/"
  - name: Jorge Ortiz
    link: "http://twitter.com/jorgeo"
  - name: Ninakix
    link: "http://ninakix.posterous.com"
updates:
  - date: 2011-07-11
    body: Added thanks to Nina for [some great comments on her posterous](http://ninakix.posterous.com/60309089).
---
A week ago Google launched its much-anticipated social network, [Google+][1]. I think they executed remarkably well, given the size of the company ([24,200 employees][2]), the stakes involved (see [the ever-hyperbolic TechCrunch][3]), and their history with social ([Buzz][4], [Wave][5]). It was important that they launch something good, and I think what they launched *is* good. New features include a cross-service toolbar, Hangouts, Huddles, and Sparks, but here I'm going to talk about Circles. If you're not on Google+ yet, the below video gives a good sense of the feature and its interface, but you should sign up and try it for yourself.

{% iframe_embed youtube ocPeAdpe_A8 %}

Wanderli.st, the ITP thesis project I [presented last May][6], grew out of similar ideas about social contexts. It was an application that would let us socialize within online contexts that are like our offline contexts, and a tool for managing and synchronizing relationships across social websites. I'm no longer working on it for a variety of reasons, but the most important of them is this: **Regardless of the interfaces and features of Lists on Facebook or Circles on Google+, I don't think people actually want to sort their contacts.**

Since we are so good at deciding what is appropriate to say to a given group, it seems backwards for our applications to make us define those groups before we even know what we're going to say. In real life, the thing we want to share and the group with whom we want to share can influence each other, so our software should work the same way. There are several issues with manual sorting of contacts:

1.  I know *at least* several hundred people, and it's a lot of work to go through them one at a time and categorize them into Circles.
2.  When I begin that task, I can't anticipate which Circles I will need, and which will be useful for sharing. Will I want one for each place I've lived, school I've attended, job I've had, and topic I'm interested in? If I start with too few, I'll have to go through my list of contacts again when I remember the Circle(s) I forgot, which is daunting. If I start with too many, the whole process will take much longer, since I have to decide for each of those hundreds of people if they belong in each of a dozen or more Circles.
3.  Relationships are not always symmetric, and I don't want to publicize how I group my contacts. As a result, Google+ Circles are private, and each user must undertake this task for him/herself.
4.  Relationships change, and it's even even more work to continually maintain my Circles so that they mirror my current real world relationships.

Others, such as Foursquare's Harry Heymann, [have expressed similar sentiments][7]: 

> It doesn't matter how slick your UI is. No one wants to manually group their friends into groups.

Even Mark Zuckerberg [said today][8] that that many users don't manually build their social graphs:

> A lot of our users just accept a lot of friend requests and don’t do any of the work of wiring up their network themselves.

Facebook offers a comparable but relatively unused feature, Lists, that lets users organize their friends, but Circles has a superior user interface that makes the categorization work much more enjoyable. Former Facebook employee Yishan Wong, however, [makes a slightly different critique Google+ and Circles][9]:

> Besides such features being unwieldy to operate, one's "friend circles" tend to be fluid around the edges and highly context-dependent, and real humans rely often on the judgment of the listener to realize when something that is said publicly is any of their business, or if they should exercise discretion in knowing whether to get involved or just "butt out."

Google's ideas around Circles can be partially attributed to former employee Paul Adams, who [gave a compelling presentation about social contexts last year][10]. He left Google for Facebook several months later, but [wrote a new blog post that asks "two big questions"][11]:

> 1.  Our offline relationships are very complex. Should we try and replicate the attributes and structure of those relationships online, or will online communication need to be different?
> 2.  If we do try and replicate the attributes of our relationships, will people take the time and effort to build and curate relationships online, or will they fall back to offline interactions to deal with the nuances?

I now think the answer to first question is "No" and the answer to the second question is "Neither." **Offline relationships are too complex to be modeled online, but I also don't think those models are important to online social interaction.** It's worth noting how simple my social interactions feel offline -- I can see all of the people within ear shot, so I know who can hear me and who might overhear, and this allows me to adjust the things I say accordingly. Furthermore, creating these contexts is straightforward -- if I want to talk about something with a specific group of people, I'll organize a time when we can all talk face-to-face. **Offline I only need to keep track of my relationships with individuals, and I can adjust my group behavior based on the individuals present.**

With email, my online conversations can work in a similar way. If I have something to say, I'll think of precisely the people I want to say it to, and compose/address my message accordingly. Each person who receives it can decide if they feel comfortable responding to the initial group, or to some other group. Furthermore, email threads do not span the entirety of a group's communication, so it's easy to add or remove someone for a different conversation about a different topic, just as we can do in face-to-face conversations. **With email, the group does not persist longer than the conversation.** Facebook's recently revised Messages and Groups features address some of these issues of social context, but those groups are still uncomfortably permanent, and the single-threaded conversation history feels unnatural.

Email, notably, has no explicit representation of a relationship at all. Anyone can email anyone else, yet we've reached a functional equilibrium through a combination of social conventions, email address secrecy, and filters. Despite this lack of explicit data, email has rich implicit data about our relationships, and in 2009 Google [launched a new feature in Gmail Labs][12] with little fanfare: "Suggest more recipients". Wired.com [wrote about Google+ shortly after launch][13], and hinted to the future of this data:

> It’s conceivable that Google might indeed provide plenty of nonbinding suggestions for who you might want it your Circles. “We’ve got this whole system already in place that hasn’t been used that much where we keep track of every time you e-mail someone or chat to them or things like that,” says Smarr. “Then we compute affinity scores. So we’re able to do suggestions not only about who you should add to a circle, or even what circles you could create out of whole cloth.” 

Rather than use this data to make static Circles that will inevitably become irrelevant for future conversation, Google should let the list of individuals in each previous conversation serve as a *suggestion* for future conversations. If Gmail is able to make guesses about who should be included in a conversation based on who else has already been included, **it could also leverage the content that I intend to share to make dynamic suggestions.** It can help me remember who I might want to carbon-copy on a message before I send it, and it can do this without overburdening me with the overgeneralized Circles of my past[^1]. Once the spatial boundaries of that conversation have been defined, the discussion can continue until no one else has anything left to say or until a subgroup wants to split off and have a side conversation, much like a social interaction in real life. The fundamental design of email has shown more promise than the categorization-based alternatives[^2].

We want some of the things we say on the Internet to be public and accessible to anyone who is interested[^3]. For everything else, explicit persistent groupings of the people I know are tedious to maintain and unnatural to use. **Each discussion is different, so we need discussion tools that support robust privacy control on a per-message basis.**

[^1]: There are many ways to improve this recipient suggestion interface, and profile photo thumbnails would be a good place to start. It could also suggest some Circle-like groups, such as my family, and even let me upload my own photo to make those groups easier to identify. It should not, however, present me with a list of all of my groups, because then that is something to manage -- I only need to see the groups when I am addressing a message.
[^2]: It is important not to let our thinking get bogged down by the current limitations of our inbox interfaces. What if, when you searched for a person in Gmail, you got a grid of attached photos in addition to a list of conversations? What if Gmail was as "real time" as Gchat or Facebook? What if Gmail didn't make you feel like you needed to read every message? What if Gmail searches were, dare I say it, fast? Some of these changes would break how we currently use our inboxes, so perhaps a separate tool that was modeled after email would be better, but that's a detail. Other changes, such as streamlined [Rapportive](http://rapportive.com/)-style contact information for the people in a conversation, are already beginning to be built-in.
[^3]: I have some ideas on this, but that's a separate blog post. See [Pinterest](http://pinterest.com/) and [Subjot](http://subjot.com/) in the interim :)

 [1]: http://plus.google.com/
 [2]: http://en.wikipedia.org/wiki/Google
 [3]: http://techcrunch.com/2011/06/03/facebook-google-out-of-business/
 [4]: http://en.wikipedia.org/wiki/Google_Buzz#Reception
 [5]: http://en.wikipedia.org/wiki/Google_wave#Reception_and_end_of_development
 [6]: /2010/05/23/wanderlist-thesis-presentation/
 [7]: https://twitter.com/#!/harryh/status/85766219583590400
 [8]: http://www.livestream.com/facebookannouncements/video?clipId=pla_c9a5e167-4317-40b3-a722-38d61a8321a0
 [9]: http://www.quora.com/Yishan-Wong/How-Google+-Shows-That-Google-Still-Doesnt-Understand-Social
 [10]: /2010/07/03/paul-adams-on-the-real-life-social-network/
 [11]: http://www.thinkoutsidein.com/blog/2011/07/just-the-beginning/
 [12]: http://gmailblog.blogspot.com/2009/04/new-in-labs-suggest-more-recipients.html
 [13]: http://www.wired.com/epicenter/2011/06/inside-google-plus-social/all/1
