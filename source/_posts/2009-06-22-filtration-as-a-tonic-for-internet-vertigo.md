---
layout: post
featured: false
title: "Filtration as a Tonic for Internet Vertigo"
permalink: /2009/06/22/filtration-as-a-tonic-for-internet-vertigo/
dsq_thread_id:
  - 22552484
categories:
  - commentary
  - web ideas
updates:
  - date: 2009-06-30
    body: "I've written more about this topic in [this subsequent post](/2009/06/30/the-stream-packet-duality-of-content/)."
---
*I've been thinking about this topic for a while, but was finally inspired to write it by a not quite recent but still very relevant [blog post][1] by John Borthwick (of [betaworks][2], the startup accelerator associated with [bit.ly][3], where I'm currently interning) about real-time distribution via social networks.

> Anyone whose goal is "something higher" must expect someday to suffer vertigo. What is vertigo? Fear of falling? Then why do we feel it even when the observation tower comes equipped with a sturdy handrail? No, vertigo is something other than the fear of falling. It is the voice of the emptiness below us which tempts and lures us, it is the desire to fall, against which, terrified, we defend ourselves.  
> - Milan Kundera, Czechoslovakian novelist (1929 -- ), in *The Unbearable Lightness of Being*

I have vertigo. My somewhat lofty goal is to read and digest all of the information that interests me, as it is created in real time, regardless of medium. My desire to fall is my desire to abandon all of my information sources, not bother keeping up with anything, and fall endlessly into ignorance. And this terrifies me; at the very least, the Internet could come equipped with better handrails.

I am interested in information from a variety of sources -- blogs, people on Twitter, email lists, search terms in the NY Times, etc -- and I subscribe to these things *because I think they are worth reading*. Although I wish I could read all of it, I know I can't. But I want a better way to read only *some* of it, without having to face the infinities that I don't have time to read, without having to make painfully arbitrary decisions about what to read and what to ignore, and thus without having the subsequent vertiginous desire to give up, declare [email bankruptcy][4], and read none of it at all. So the question is, then, one of designing a sturdier handrail that I can grasp while observing information on the Internet as it streams by. And that handrail must be a tool for filtering content, not a source that recommends even *more*.

Recommendation sites/services such as [Digg][5], [Reddit][6] and [StumbleUpon][7] have (as far as I know) user-preference modeling algorithms to make selections of what content to show to users, based on what those users and other users with similar past preferences have liked in the past. Netflix does [something similar][8] to make movie recommendations. They're good systems, and have some cool machine-learning stuff going on, but I find their application to be fundamentally conceptually inverted. 

I want to read the blogs of [danah boyd][9], [Jan Chipchase][10], and[ John Gruber][11]. I want to follow [Alex Payne][12], [Jorge Ortiz][13], and 180 odd others on Twitter. Yet it's too much. As Clay Shirky [pointed out][14] at the Web2.0 Expo, our filters have failed, not because of 'information overload' of ever-increasing magnitudes, but instead because of 'filter failure'. Content was once primarily filtered by the editors and publishers, yet those systems are crumbling and I no longer have effective filters for this smorgasbord of carefully selected and professionally prepared feeds.

And I certainly don't need Digg/Reddit/StumbleUpon to make *additional* recommendations. But given that I'm already not going to see all of the things I know that I care about, why can't those same algorithms be used to filter incoming content instead? These information filtration systems would ideally have a few particular characteristics:

 * They would be cross-platform and encompass all sources of information, including RSS, news, Twitter, Facebook, email lists (but not email addressed specifically to you), etc.
 * The user could make adjustments to the aggressiveness of the filtration algorithm on a feed-by-feed basis.
 * Filters would operate on a per-item level -- i.e. I might be shown only one photo from an album of sixty, or one tweet from a day's worth of a dozen. The content filtered out would not be less-than-worthwhile (you might really wish you could see all of your aunt's vacation photos), but if the user simply doesn't have time for everything, something must give.
 * Users could build their preference models both passively and actively. The system would strongly take into account rating systems (number of stars, voting up/down, etc), but would also take into account how many seconds a user spent looking at a specific piece of content. Eye tracking would be preferable, but that's tough and requires a camera at the very least. Instead, content delivery applications (such as RSS readers and mail clients) could measure how long a person spent with a piece of content open, adjust for word count and relative time for other pieces of content from that source, and assume that more time spent implies more engagement.
 * Preference models would be partially social, but not exclusively. If a friend of mine liked something, it would be more likely to pass my filters. In addition, if some piece of content was enjoyed by a random other person who had shown similar past preferences to myself, it would be more likely to pass my filters too.

I don't see this problem of perceived information overload (and consequent vertigo) getting any better on it's own. Are there other solutions I'm not seeing? Anyone looking for a new giant software project?

 [1]: http://www.borthwick.com/weblog/2009/05/13/699/
 [2]: http://betaworks.com/
 [3]: http://bit.ly/
 [4]: http://www.wired.com/culture/lifestyle/news/2004/06/63733
 [5]: http://digg.com/
 [6]: http://reddit.com/
 [7]: http://www.stumbleupon.com/
 [8]: http://www.nytimes.com/2008/11/23/magazine/23Netflix-t.html
 [9]: http://www.zephoria.org/thoughts/
 [10]: http://www.janchipchase.com/
 [11]: http://daringfireball.net/
 [12]: http://twitter.com/al3x
 [13]: http://twitter.com/jorgeortiz85
 [14]: http://web2expo.blip.tv/file/1277460/