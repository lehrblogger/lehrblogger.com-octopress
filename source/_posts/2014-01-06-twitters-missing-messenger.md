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
Communication is a core human need, and people use a variety of online services to talk with others who are far away. Twitter has established itself, and [thinks of itself][1], as a "global town square" where users shout their thoughts to anyone listening (through tweets), have public and open side conversations (through @-replies), and whisper to specific individuals (through Direct Messages, or DMs). This variety of use cases has allowed Twitter to do wonderfully well. It has over 230 million active users, and [growth is healthy][2].

Yet people have communication needs that Twitter does not yet satisfy, and these missing features present both strategic risks and opportunities to Twitter. Specifically, shortcomings in Twitter's products for interpersonal, private, and extended conversation are forcing users to go elsewhere.

And go elsewhere they have! A horde of upstart messaging apps, including [WhatsApp][7], [Kik][8], [WeChat][9], [Line][10], and [KakaoTalk][11], each have at least 100 million users. While their features differ slightly, in general users can exchange text, photo, audio, video, and sticker messages privately both with other individuals and with groups through an SMS- or chat-like interface. While Twitter's existing @-reply and DM features have recently improved to offer a more comparable experience, it still has major shortcomings that prevent it from competing effectively.  

##### Shortcomings of @-Replies

Twitter's existing @-replies (also known as @-mentions) are great for short, public conversations involving just a small handful of participants. It has recently added continuity to conversations by [drawing vertical blue lines between @-replies][12] in the home feed and by showing all threaded @-replies on tweet detail pages. While these changes make it easier for users to observe a conversation as it happens, the best conversations overwhelm the medium, and as a result participants move those conversations to some another service. Obstacles presented by Twitter's current @-replies include:

* The 140-character limit makes it difficult to compose messages, slowing down an otherwise free-flowing exchange.
* Conversations rarely grow to have more than a few participants, and rarely last long if they do, because so many of the 140 characters are used up by the participants' @usernames.
* Users have different notification settings for different types of @-replies, making it difficult to know if/when the other participants will respond.
* Twitter's standard reverse-chronological feed with new messages at the top is awkward for long conversations, which traditionally occur in chronological feeds with new messages at the bottom.
* In long conversations, the obfuscated @-reply threading becomes ambiguous and confusing, so participants can't tell what tweets a particular reply is in response to.
* Because all messages are public, participants are forced to censor themselves because they don't know who might be listening.

##### Shortcomings of Direct Messages

Twitter also offers DMs as an alternative to @-replies, which allow pairs of users to exchange private, 140-character messages. For years DMs were hidden in the official website and apps, but Twitter, to its credit, has recently tried to [resurrect its private messaging product][13] by moving it to a prominent place in the UI and adding support for photos.

<blockquote class="twitter-tweet" lang="en"><p>One weird thing about DMs-as-chat is that a lot of the ones I get are now like <a href="https://twitter.com/MagicRecs">@MagicRecs</a>. In other words, not chat at all.</p>&mdash; MG Siegler (@parislemon) <a href="https://twitter.com/parislemon/statuses/410559292593274880">December 10, 2013</a></blockquote>
<blockquote class="twitter-tweet" lang="en"><p>The other weird thing, of course, is that DMs have long been the stepchild locked in the basement that the parent wished would go away...</p>&mdash; MG Siegler (@parislemon) <a href="https://twitter.com/parislemon/statuses/410559697121325056">December 11, 2013</a></blockquote>
<blockquote class="twitter-tweet" lang="en"><p>Can you revive such a product to become a core feature after years upon years of not only neglect, but contempt?</p>&mdash; MG Siegler (@parislemon) <a href="https://twitter.com/parislemon/statuses/410559920388317185">December 11, 2013</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

Yet, as TechCrunch columnist MG Siegler notes, there are lingering user perceptions that the company has yet to overcome. Twitter has trained users to think of DMs as a last-resort communication method, used only when the matter is urgent (traditionally, DMs would trigger in-app, email, and SMS notifications) or when the sender has no other way of contacting the recipient. Even with the recent changes, Twitter is still thinking of DMs as email, merging the email envelope icon with the messaging chat bubble icon in its new iOS tab bar:

{% img ios_tab_bar /images/2014/01/twitter_tab_bar.png %}

The upstart messaging apps are successful, however, precisely because they are *not* email. Like email, DMs must be 'composed' because it takes extra effort to break up a thought into 140-character snippets, while the messaging apps try to replicate the casual, instantaneous nature of face-to-face interaction. Their typing notifications, for example, create a sense of mutual presence and attention, while stickers convey emotion when body language cannot.

More importantly, DMs are still dependent on Twitter's existing follow graph: a user must follow another user in order to receive DMs from him. Twitter can either be a place where you follow the people you're interested in, or a place where you follow the people you want to talk with, but it can't be both. Messaging is about conversation, so there's no point in a user being able to contact someone who can't respond. Twitter has [experimented with giving users the option to relax this restriction][14], but it [reverted the change][15] several weeks later, suggesting that another solution is needed. Until Twitter resolves this issue, the subtle social friction and persistent fear of embarrassment will drive users to other messaging products.

##### The Innovator's Dilemma

While these problems with Twitter's messaging products are solvable, they are not simple, and Twitter has focused on other user needs. This is understandable, especially because messaging has historically been difficult to monetize, because messaging is a commodity that is not central to Twitter's core broadcasting product, and because richer messaging features could overcomplicate [Twitter's already-confusing product][16]. The upstart messaging apps, however, pose a significant threat of [disruptive innovation][17], as described by Clayton Christensen in his book [The Innovator's Dilemma][18]. If you're unfamiliar, watch the first ten minutes of this talk, but skip the two minutes of intro music!

{% iframe_embed generic http://gartner.mediasite.com/mediasite/play/9cfe6bba5c7941e09bee95eb63f769421d?t=1m43s 532x400 %}

As Christensen might predict, Twitter has seemed happy to let the other messaging companies relieve it of the least-profitable part of its product, so that it could better focus on what was important to the business. Meanwhile, Snapchat pioneered [ephemeral social media][19], Line [generated substantial revenue][20] with virtual stickers (and others promptly copied them), and WhatsApp has shown that people would actually pay money for social apps ([$0.99/year][21] adds up over [400 million users][22]). More problematically for Twitter, these apps are expanding upmarket into other aspects of social networking: Snapchat recently launched [a broadcast feature called Stories][23], Kik is pushing [a platform that enables third-parties to develop social apps][24], and WeChat offers [a Twitter-like Moments feature][25].

As the other messaging apps move upmarket, they will compete directly with Twitter's profitable social and information broadcasting products; they, too, will try to become the global town square. In order to defend its position, Twitter must move its own messaging products back downmarket. While Twitter could continue to incrementally iterate on DMs until it reached superficial feature parity with the competitors, this would not fix the underlying shortcomings described above. 

##### A Vision for a Dedicated Messenger

More drastic changes are needed to revive DMs "after years upon years of not only neglect, but contempt": Twitter should transition DMs into a *separate* application focused on conversation[^1]. People go to Twitter for two main reasons: to find out ["what's happening"][26], and to talk to other people. The timeline in the current app satisfies the first need, and the conversations in this new app would satisfy the second need, similarly to how Facebook has separated its Messenger iPhone app away from its flagship app. How should DMs work, and what should this new app look like?

{% img iphone left  /images/2014/01/twig_contacts_standard.png %}
{% img iphone right /images/2014/01/twig_messages_standard.png %}

The above wireframes show what Twitter's DM app might look like if it were modeled after its successful messaging competitors. On the left, the Contacts tab show's the people with whom the logged-in user can exchange messages, and on the right, the conversation view in the Messages tab shows a standard group messaging interface. The only difference of note is that this new DM app shows the user how many messages she has exchanged with each friend; Twitter has been successful in lightly gamifying its products through the prominent placement of tweet, follow, and follower counts on profile pages, and these message counts are similarly intended to encourage interaction between users.

Twitter can, and will need to, do better than this standard interface in order to create a truly competitive and compelling messaging product. Fortunately, there are several aspects of its current products that it can leverage to create a differentiated user experience unique to its new messaging app. Specifically, Twitter should leverage its existing social graph, seed conversations with tweets, create serendipity through conversation discoverability, and use Twitter as a platform for growth.

##### Leverage the Existing Social Graph

Twitter's social follow graph is both unique and valuable, but, for reasons described above, it must not rely on it for messaging permissions in this new DM app. To solve these problems, rather than overburden its existing interest-based follow graph, Twitter should create a separate, parallel message graph. Users would not want to receive DMs from *anyone*, so some sort of permissioning is necessary. At the same time, there's little point in sending messages to someone who does not have permission to respond. Thus the new message graph could be symmetric: users would add other users as contacts, and if the recipient approves the request, then the two users could then exchange messages.  It's also important that each user's list of approved contacts is private, unlike public follows, because users shouldn't feel pressured into receiving messages they don't really want.

{% img iphone right /images/2014/01/twig_contacts_twitter.png %}
While traditionally a new social graph required substantial manual effort from users, this would no longer be the case. First, Twitter's message graph could be bootstrapped from user's address books[^2], similarly to how other messaging apps create their users' contacts lists. Second, Twitter's new message graph could use the initial follow graph as a starting point, so users would automatically be able to exchange messages with everyone they follow who follows them back, and would automatically have a pending 'friend' request to everyone they follow who does not follow them back. After this one-time import, however, the message and follow graphs would diverge.

Because users would have the same account on both Twitter and this DM app, the follow graph still gives users of the DM app unique social opportunities. Because the current follow graph is asymmetric, users can follow whomever they find interesting, regardless of whether that interest is reciprocated. As a result [Twitter's network has become *aspirational*][27]: users follow the people they wish they knew. Twitter allows users to stumble across someone new, learn about their interests, and interact casually through @-replies. It's natural for users to then want to strengthen these relationships further through lightweight, synchronous, private conversations. This new DM app would provide a social space for these aspirational interactions[^3], which is something that the other messaging apps are not able to offer.

Finally, as in the background of this wireframe, the DM app could leverage Twitter to add additional social richness to the Contacts tab by showing statistics about interactions that happen on Twitter itself. This list could even be auto-sorted by the amount and recency of this user's DMs, @-replies, and tweet favorites with each contact, since a user is more likely to want to talk with friends she interacts with regularly on Twitter.

##### Seed Conversations with Tweets

{% img iphone right /images/2014/01/twig_messages_twitter.png %}
Because the new DM app would integrate directly with Twitter, it could automatically display tweets from a conversation's participants in the thread itself. This is a simple feature, but one that other messaging apps could not offer, and it would give users additional context in a variety of conversations. For large groups that outgrew the constraints of @-replies, these embedded tweets would make it easy for users to see what had already been said. For pairs or smaller groups, these embedded tweets would enrich the conversation by giving participants a sense of what the others were doing and thinking about. Embedded tweets wouldn't trigger notifications like normal messages, and they could be hidden either individually or for an entire conversation, but would make it easier to jump between Twitter's conversation spaces and would facilitate discussion of specific tweets.

At a glance, it might seem like the DM app would not only compete with the other messaging apps, but would also cannibalize Twitter's existing @-replies -- if @-replies appear in the DM app, why bother with both? However, because of the aforementioned obstacles to conversation presented by @-replies, the DM app, as Christensen would say, "competes with non-consumption." In other words, the DM app would enable conversations that otherwise wouldn't happen on Twitter at all, and the public nature of @-replies and private nature of DMs sufficiently differentiate the products.

##### Serendipity through Discoverability

{% img iphone right /images/2014/01/twig_messages_discoverable.png %}
Conversations in the new DM app should remain private so as to provide a social space comparable to the other messaging apps. Users don't always know which of their friends would be interested in a particular conversation, however, and sometimes they want a social space that allows for more serendipity than conversations that are typically both private *and* secret.

Discoverable DM conversations [similar to those on Dashdash][28] would meet this need, since the contacts of the participants could find and join interesting-looking conversations. Discoverability would be enabled on a per-conversation basis, and new participants wouldn't be able to see the messages that were exchanged before they joined.

If a DM conversation had been specified as discoverable, perhaps using an interface like the one to the right, then participants might want to encourage their friends to join the conversation. From discoverable rooms, participants would be able to tweet a link to the DM conversation, and followers who clicked it would seamlessly see the conversation in a new browser window or an in-timeline Twitter card.

##### Use Twitter as a Platform for Growth

There are many ways in which Twitter could expose existing users to its new DM app, ranging from aggressive emails and UI overlays to less intrusive promoted tweets in the timeline, and these provide obvious strategies for rapid growth. The earliest adopters of the new DM app still need to have a good experience, however, before their friends have transitioned from the legacy DMs to the new DMs.

Foursquare, Instagram, and other social services solved this chicken-and-egg problem and grew quickly by making it easy for users to tweet their content. While the new DM app would partially adopt this strategy with the aforementioned tweetable links to conversations[^4], it could also simply degrade gracefully to legacy DMs. If a new DM user wanted to send a message to a legacy DM user, then the sender's messages would be received as a legacy DM (assuming the recipient already follows the sender on Twitter). Perhaps these messages could be preceded by an automated header from Twitter that took advantage of the opportunity for evangelism and invited the recipient to download the new DM app. This backwards compatibility would both accelerate the growth of the DM app and make the experience immediately fun for new users.

##### Summary

WhatsApp, Kik, WeChat, Line, and KakaoTalk are growing quickly despite their focus on the generally-unappealing messaging market. As they've grown, they have begun to move upmarket into the status broadcasting features core to Twitter, and it's important to Twitter's long-term success that it defends and develops its products accordingly. By leveraging its existing social graph, seeding conversations with tweets, creating serendipity through conversation discoverability, and using its core product as a platform for growth, Twitter could create the compelling and viable messaging product it needs.

[^1]: I strongly considered giving this new application a separate name and brand (perhaps 'Twig'), but because the most significant advantages of the new DM app would come from tight integration with the rest of Twitter, a separate name/brand would just confuse users further.<br/><br/>I also considered whether this new app could be built by a third party, rather than by Twitter itself. While all of the functionality I describe needs only the publicly-available APIs, [Twitter has discouraged applications that allow consumers to engage with the core Twitter experience](https://dev.twitter.com/blog/changes-coming-to-twitter-api); this new messaging app falls squarely in that upper-right quadrant. An enterprising third party might be able to get Twitter to grant more than the default 100,000 API tokens, but it would be imperative that the short-term and the long-term incentives of both companies were aligned. For the purposes of this post, it's simpler to assume that Twitter would be as tied to this app as it is to, say, [Vine](https://blog.twitter.com/2013/vine-a-new-way-to-share-video).

[^2]: Users allow these services to have access to the names, emails, and phone numbers stored in their address books, and then the service can match those identifiers across users to quickly and automatically build a reasonably-accurate social graph. This results in connections that are often similar to Facebook's, but without the years of painstakingly sent and accepted Friend requests.

[^3]: [Dashdash](http://lehrblogger.com/2013/07/09/dashdash/), the messaging app I've been working on, provided exactly this sort of social space. Several of my private beta users had only previously known each other through Twitter, but were able to converse freely on Dashdash without needing to exchange additional contact information. While this was not one of the primary features I had in mind when designing the product, it is one of the things that my users have enjoyed the most.

[^4]: It would also be interesting to make it easy for users to cross-post DMs back to Twitter. Perhaps if a user long-pressed on one of their sent messages, then a modal dialogue would appear showing that message as one or more tweets, combined with the usernames of the participants and a link to the conversation.

[1]: https://blog.twitter.com/2013/celebrating-2013-global-town-square
[2]: http://www.sec.gov/Archives/edgar/data/1418091/000119312513424260/d564001ds1a.htm
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

