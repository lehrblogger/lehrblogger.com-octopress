---
layout: draft
featured: true
title: "Twitter's Missing Messenger"
permalink: /2014/01/06/twitters-missing-messenger/
categories:
  - commentary
  - Dashdash
blurb: "A strategic analysis of the market and a vision for what Twitter should build."
show_blurb: true
thanks:
  - name: Nina
    link: "http://youngandbrilliant.net/"
  - name: Bryan
    link: "http://blence.com/"
  - name: Karina
    link: "http://twitter.com/kvanscha/"
styles: |
  #main .entry .entry-content iframe.twitter-tweet {
    float: right !important;
    margin: 0px 0px 20px 20px !important;
    display: inline-block !important;
    max-width: 330px !important;
  }
  #main .entry .entry-content img.ios_tab_bar {
    display: inline-block;
    max-width: 340px;
  }
  #main .entry .entry-content p>img.iphone {
    max-width: 277px;
    background-image: url('/images/2014/01/iphone_frame.png');
    background-repeat: no-repeat;
    background-size: 330px auto;
    padding: 100px 24px 100px 29px;
  }
  #main .entry .entry-content p>img.left {
    float: left;
    margin-right: 20px;
    margin-bottom: 32px;
  }
  #main .entry .entry-content p>img.right {
    float: right;
    margin-left: 20px;
    margin-bottom: 32px;
  }
  h5 {
    clear: both;
  }
---
Communication is a core human need, and various online services have provided various ways for their users to talk to each other. Twitter has established itself, and [thinks of itself][1] as a "global town square" that allows users to shout their thoughts to anyone listening (through tweets), have public and open side conversations (through @-replies), and whisper to specific individuals (through Direct Messages, or DMs). This variety of use cases has allowed Twitter to do wonderfully well. They have over 230 million active users, and [growth is healthy][2]. In two months their stock rose to [more than double][3] [the IPO price][4], and there are [new advertising opportunities][5] they are just beginning to explore.

Yet people have a variety of communication needs that Twitter does not yet satisfy, and these missing features present a strategic risk, and a strategic opportunity, to Twitter. Specifically, Twitter's products for interpersonal, private, and extended conversation are insufficient, forcing users to go elsewhere.

And go elsewhere they have! A [horde of upstart messaging apps][6], including [WhatsApp][7], [Kik][8], [WeChat][9], [Line][10], and [KakaoTalk][11], each have at least 100 million users. While the features differ slightly between them, in general users can exchange private text/photo/audio/video/sticker messages both with other individuals and with groups through an SMS- or chat-like interface. While Twitter's existing @-replies and DM feature have recently improved to offer a more comparable experience, they still have both minor shortcomings and major flaws that prevent Twitter from competing effectively.  

Twitter's existing @-replies (also known as @-mentions) are great for short, public conversations involving just a small handful of participants. They have recently added continuity to conversations by [drawing vertical blue lines between @-replies][12] in the home feed and by showing all threaded @-replies on tweet detail pages. While these changes make it easier for users to observe a conversation as it's happening, the best conversations overwhelm the medium, and as a result participants move the conversation some another service. Obstacles presented by Twitter's current @-replies include:

1. The 140-character limit makes it difficult to compose messages, slowing down an otherwise free-flowing exchange.
2. The character limit puts a cap on the number of participants, since the more people there are, the harder it is for participants to fit anything in the tweet's remaining characters.
3. Users have different notification settings for different types of @-replies, making it difficult to know if/when the other participants will respond.
4. Twitter's standard reverse-chronological feed with new messages at the top is awkward for long conversations, which traditionally occur in chronological feeds with new messages at the bottom. (JORGE, FINISH YOUR BLOG POST)
5. In long conversations, @-reply threading becomes ambiguous and confusing, so participants can't tell what tweets a reply is in response to.
6. Because all messages are public, participants are forced to censor themselves because they don't know who might be listening.

Twitter also offers DMs as an alternative to @-replies, which allow pairs of users to exchange private, 140-character messages. For years DMs were hidden in the official website and apps, but Twitter, to its credit, has recently tried to [resurrect its private messaging product][13] by moving it to a prominent place in the UI and adding support for photos.

<blockquote class="twitter-tweet" lang="en"><p>One weird thing about DMs-as-chat is that a lot of the ones I get are now like <a href="https://twitter.com/MagicRecs">@MagicRecs</a>. In other words, not chat at all.</p>&mdash; MG Siegler (@parislemon) <a href="https://twitter.com/parislemon/statuses/410559292593274880">December 10, 2013</a></blockquote>
<blockquote class="twitter-tweet" lang="en"><p>The other weird thing, of course, is that DMs have long been the stepchild locked in the basement that the parent wished would go away...</p>&mdash; MG Siegler (@parislemon) <a href="https://twitter.com/parislemon/statuses/410559697121325056">December 11, 2013</a></blockquote>
<blockquote class="twitter-tweet" lang="en"><p>Can you revive such a product to become a core feature after years upon years of not only neglect, but contempt?</p>&mdash; MG Siegler (@parislemon) <a href="https://twitter.com/parislemon/statuses/410559920388317185">December 11, 2013</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

Yet, as TechCrunch columnist MG Siegler notes, there are lingering user perceptions they have yet to overcome. Twitter has trained users to think of DMs as a last-resort communication method, used only when the matter is urgent (traditionally, DMs would trigger in-app, email, and SMS notifications) or when the sender has no other way of contacting the recipient. Even with the recent changes, Twitter is still thinking of DMs as email, merging the email envelope icon with the messaging chat bubble icon in their new iOS tab bar:

{% img ios_tab_bar /images/2014/01/twitter_tab_bar.png %}

The upstart messaging apps are successful, however, precisely because they are *not* email. Like email, DMs must be 'composed' because it takes extra effort to break up a thought into 140-character snippets, while the messaging apps try to replicate the casual, instantaneous nature of face-to-face interaction. Typing notifications, for example, create a sense of mutual presence and attention, while stickers convey emotion when body language cannot.

More importantly, DMs are still dependent on Twitter's existing follow graph: a user must follow another user in order to receive DMs from him. Twitter can either be a place where you follow the people you're interested in, or a place where you follow the people you want to talk with, but it can't be both. Messaging is about conversation, so there's no point in a user being able to contact someone who can't respond. Twitter has [experimented with giving users the option to relax this restriction][14], but they [reverted the change][15] several weeks later, suggesting that another solution is needed. Until Twitter resolves this issue, the subtle social friction and persistent fear of embarrassment will drive users to other messaging products.

While these problems with Twitter's messaging products are solvable, they are not simple, and Twitter has focused on other user needs. This is understandable, especially because messaging has historically been difficult to monetize, because messaging is a commodity that is not central to Twitter's core broadcasting product, and because richer messaging features could overcomplicated [Twitter's already-confusing product][16]. The upstart messaging apps, however, pose a significant threat of [disruptive innovation][17], as described by Clayton Christensen in his book [The Innovator's Dilemma][18]. If you're unfamiliar, watch the first ten minutes of this talk, but skip the two minutes of intro music!

{% iframe_embed generic http://gartner.mediasite.com/mediasite/play/9cfe6bba5c7941e09bee95eb63f769421d?t=1m43s 532x400 %}

As Christensen might predict, Twitter has seemed happy to let the other messaging companies relieve it of the least-profitable part of its product, so that it could better focus on what was important to the business. Meanwhile, the aforementioned messaging apps have innovated, grown, and begun to move upmarket. Snapchat pioneered [ephemeral social media][19], Line [generated substantial revenue][20] with virtual stickers (and others promptly copied them), and WhatsApp has shown that people would actually pay money for social apps ([$0.99/year][21] adds up over [400 million users][22]). More problematically for Twitter, these apps are expanding upmarket into other aspects of social networking: Snapchat recently launched [a broadcast feature called Stories][23], Kik is pushing [a platform that enables third-parties to develop social apps][24], and WeChat offers [a Twitter-like Moments feature][25].

As the other messaging apps move upmarket, they will compete directly with Twitter's profitable social and information broadcasting products; they, too, will try to become the global town square. In order to defend its position, Twitter must move its own messaging products back downmarket. While Twitter could continue to iterate on DMs in their current form until they reached superficial feature parity with the competitors, this would not fix the underlying problems for conversation described above. 

More drastic changes are needed to revive DMs "after years upon years of not only neglect, but contempt." Twitter should create a *separate* application focused on messaging[^1].  People go to Twitter for two main reasons: to find out ["what's happening,"][24], and to talk to other people. The timeline in the current app satisfies the first need, and the conversations in this new app would satisfy the second need, similarly to how Facebook has separated its Messenger iPhone app away from its flagship app. Fortunately for Twitter, there are several aspects of its current products that it can leverage to create a differentiated user experience unique to its new messaging app. How should the app work, and what should it look like? 

{% img iphone left  /images/2014/01/twig_contacts_standard.png TODO: add wireframe with standard contact list %}
{% img iphone right /images/2014/01/twig_messages_standard.png TODO: add wireframe with standard conversation view for a group %}

TODO: revise everything after this point based on expanded first half

##### Leverage the Existing Social Graph

Most messaging apps rely on users' address books to bootstrap their networks[^2], but Twitter's social graph is uniquely based on each individual's preferences. Because the graph is asymmetric, users can follow whomever they find interesting, regardless of whether the interest is reciprocated. As a result [the network becomes *aspirational*][25] -- users follow the people they wish they knew. Twitter allows you to stumble across someone new, learn about their interests, and interact casually through @-replies. It's natural for users to want to strengthen these relationships further through lightweight, synchronous, private conversations, so Twitter should provide that social space as well[^3].

{% img iphone right /images/2014/01/twig_contacts_twitter.png TODO: wireframe of contact list sorted by Twitter interactions %}
This use case fits neatly into Twig's Contacts tab, which can include people that the user follows on Twitter in addition to the standard selection of contacts from her address book. The contact list can even be auto-sorted by the amount and recency of the user's Twitter interactions with those contacts, since she is more likely to want to talk with Twitter friends whose tweets she favorites regularly or with whom she exchanges more @-replies.

Users would not want to receive Twig messages from *anyone*, however, so some sort of permissioning is necessary. Rather than overburden their existing interest-based follow graph, Twitter should create a separate social graph of the people that can exchange messages on Twig. The user won't need to do any work to create this graph initially because it could be bootstrapped from the existing follow graph and address books. These relationships should be symmetric, unlike those in the existing follow graph: users would add other users as contacts, and if the recipient approves the request, then the two users could then exchange messages. It's also important that each user's list of approved contacts is private, unlike public follows -- users shouldn't feel pressured into receiving messages they don't really want, and thus the Twig graph would diverge from the Twitter graph over time.

##### Seed Conversations with Tweets

{% img iphone right /images/2014/01/twig_messages_twitter.png TODO: wireframe of conversation with pulled in Tweets, both public and @-reply %}
Because Twig would integrate with Twitter, it could automatically display tweets from a conversation's participants in the conversation itself. This would add context to the conversation, and make it easy for users to discuss specific tweets or to jump back and forth between the public and private conversation spaces.

At a glance, it might seem like Twig would compete with Twitter's existing @-replies. TODO. Because of these restrictions, it's more likely that Twig would, as Christensen would say, "compete with non-consumption." Twig would enable conversations that otherwise wouldn't happen at all.

##### Prefer Private to Public

{% img iphone right /images/2014/01/twig_messages_discoverable.png TODO: wireframe of conversation view toggled-to-public, @-reply in compose %}
Twig conversations should be private by default so that they provide a social space comparable to the messaging apps with which it would be competing. There's a temptation to make conversations either public, like in @-reply threads where non-participant friends can see the entire conversation history and jump in at-will. TODO If a user wants a public conversation, then Twitter's existing @-replies are good enough.

Twig might benefit from [discoverable conversations that are similar to those on Dashdash][26], where users can see what conversations their friends are having, but not what they're saying (as they can with @-replies) until they join that conversation. While Dashdash is used primarily on desktops and laptops, Twig would primarily be a mobile application, where availability for a conversation is more context- and topic-dependent. As a result, it would be better to let Twig users enable this discoverability on a conversation-by-conversation basis.

If a Twig conversation *had* been specified as discoverable, then participants might want to encourage their friends to join the conversation. From discoverable rooms, Twig users would be able to tweet a link to the Twig conversation, and followers who clicked it would see the conversation in a new browser window or an in-line Twitter card. If those followers are already logged in to Twitter, then they would also already be logged into Twig and would have a seamless experience.

##### Use Twitter as a Platform for Growth

Because users would have to download the Twig app separately from the Twitter app, adoption amongst new users would be gradual, and thus it's important that users have a good Twig experience before the rest of their contacts are on the service. Other social services, such as Instagram and Vine, used Twitter to solve this problem and grow quickly by making it easy for users to tweet their content. 

While Twig would partially adopt this strategy with the aforementioned tweetable links to conversations[^5], it could also degrade gracefully to Twitter DMs. If a Twig user wanted to send a message to a non-Twig user, then the sender's messages could simply be received as DMs (assuming the recipient already follows the sender on Twitter). Perhaps these messages could be preceded by an automated header from Twitter, explaining Twig and inviting the recipient to download the app. This backwards compatibility would both accelerate Twig's growth and make the app immediately fun for new users.

##### Summary

WhatsApp, Kik, WeChat, Line, and KakaoTalk are growing quickly despite their focus on the generally-unappealing messaging market. As they've grown, they have begun to move upmarket into the status broadcasting features core to Twitter, and it's important to Twitter's long-term success that it defends and develops its products accordingly. By leveraging their existing social graph, seeding conversations with tweets, focusing on private interactions, and using Twitter as a platform for growth, Twitter could create the compelling and viable messaging product it needs.

[^1]: I strongly considered giving this new application a separate name and brand (perhaps 'Twig'), but ultimately decided it would be too tightly integrated with the rest of Twitter's product, and would ultimately just confuse users further.<br/><br/>I also considered whether this new app could be built by a third party, rather than by Twitter itself. While all of the functionality I describe could be built using the publicly-available APIs, [Twitter has discouraged applications that allow consumers to engage with the core Twitter experience](https://dev.twitter.com/blog/changes-coming-to-twitter-api); this new messaging app falls squarely in that upper-right quadrant. An enterprising third party might be able to get Twitter to grant more than the default 100,000 API tokens, but it would be imperative that the short-term and the long-term incentives of both companies were aligned. For the purposes of this post, it's simpler to assume that Twitter would be as tied to this app as they are to, say, [Vine](https://blog.twitter.com/2013/vine-a-new-way-to-share-video).

[^2]: Users allow these services to have access to the names, emails, and phone numbers stored in their address books, and then the service can match those identifiers across users to quickly and automatically build a reasonably-accurate social graph. This results in connections that are often similar to Facebook's, but without the years of painstakingly sent and accepted Friend requests.

[^3]: [Dashdash](http://lehrblogger.com/2013/07/09/dashdash/), the messaging app I've been working on, provided exactly this sort of social space. Several of my private beta users had only previously known each other through Twitter, but were able to converse freely on Dashdash without needing to exchange additional contact information. While this was not one of the primary features I had in mind when designing the product, it's one of the things that my users have enjoyed the most.

[^4]: It would also be interesting to make it easy for users to cross-post messages from Twig back to Twitter. Perhaps if a user long-pressed on one of their sent Twig messages, then a modal dialogue would appear showing that message as one or more tweets, combined with the usernames of the participants and a link to the conversation.

[1]: https://blog.twitter.com/2013/celebrating-2013-global-town-square
[2]: http://www.sec.gov/Archives/edgar/data/1418091/000119312513424260/d564001ds1a.htm
[3]: https://www.google.com/finance?chdnp=1&chdd=1&chds=1&chdv=1&chvs=maximized&chdeh=0&chfdeh=0&chdet=1388700732781&chddm=14467&chls=IntervalBasedLine&q=NYSE:TWTR&ntsp=0&ei=NuTFUsiXGrK80QGFlAE
[4]: http://money.cnn.com/2013/11/07/technology/social/twitter-ipo-stock/
[5]: http://techcrunch.com/2013/12/04/twitter-retargeted-ads/
[6]: http://lehrblogger.com/2013/07/01/the-last-great-social-network/
[7]: http://www.whatsapp.com
[8]: http://kik.com
[9]: http://www.wechat.com/en/
[10]: http://line.me/en/
[11]: http://www.kakao.com/talk/en
[12]: https://blog.twitter.com/2013/keep-up-with-conversations-on-twitter
[13]: https://blog.twitter.com/2013/photos-in-direct-messages-and-swipe-between-timelines
[14]: http://techcrunch.com/2013/10/15/twitter-direct-messages-all-followers/
[15]: http://thenextweb.com/twitter/2013/11/19/twitter-backtracks-removes-option-let-users-receive-direct-messages-follower/
[16]: http://techcrunch.com/2013/12/06/dick-costolo-admits-twitter-may-be-confusing-to-some/
[17]: http://en.wikipedia.org/wiki/Disruptive_innovation
[18]: http://www.amazon.com/The-Innovators-Dilemma-Revolutionary-Business/dp/0062060244/
[19]: http://blog.snapchat.com/post/55902851023/temporary-social-media
[20]: http://techcrunch.com/2013/05/09/line-reports-q1-2013-earnings-of-58-9m-half-from-game-in-app-purchases-30-from-stickers-80-from-japan/
[21]: https://itunes.apple.com/us/app/whatsapp-messenger/id310633997
[22]: http://blog.whatsapp.com/index.php/2013/12/400-million-stories/
[23]: http://blog.snapchat.com/post/62975810329/surprise
[24]: http://cards.kik.com
[25]: http://www.wechat.com/en/features.html#moments

[26]: https://blog.twitter.com/2009/whats-happening
[27]: http://blog.kissedbyrain.com/post/making-meaning-with-web-products-and-thoughts-on-facebook-messaging
[28]: http://lehrblogger.com/2013/07/09/dashdash/

