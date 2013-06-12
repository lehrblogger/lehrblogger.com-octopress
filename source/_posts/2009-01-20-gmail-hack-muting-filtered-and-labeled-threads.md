---
layout: post
featured: false
title: "Gmail Hack - Muting Filtered and Labeled Threads"
permalink: /2009/01/20/gmail-hack-muting-filtered-and-labeled-threads/
dsq_thread_id:
  - 17673170
categories:
  - ITP
  - lifehacks
---
One of the coolest things about Gmail is [the ability to 'mute' a thread][1] -- the 'm' keyboard shortcut will archive a thread and prevent future replies from moving that thread back to your inbox. This is especially useful for managing high-traffic email lists for which one only needs to keep track of a subset of the posts. 

Unfortunately, this feature works only for emails that are in your inbox. If you have the emails going to that list filtered to skip your inbox and go straight to a particular label (which is common practice for dealing with multiple lists), then muting doesn't help -- the emails are already skipping your inbox, and the threads will still show up as unread in that list anyway.

But there is a solution! Albeit a somewhat complicated one, so read on if you have the same problem (note part of it is Mac OS X only):

 1. First, I made a new Gmail account -- the name doesn't matter, as I was the only one who was going to use it. I changed my filter that had previously been applying the 'ITP -- student' label and skipping the primary address' inbox to instead forward the emails to that secondary address *and* skip the primary inbox.  
![](/projects/other/gmailfiltertip1.png)
 2. Then, in the secondary Gmail account, I set up that filter again to apply the same label (although this isn't strictly necessary) but kept everything in the inbox. If I want to mute a conversation, I can just select it and type 'm' (with keyboard shortcuts on), and it won't show up in that inbox any more, unless someone replies to me specifically. So far so good.
 3. What about sending? I want to be able to reply to the list too, and do it as I was replying before. So I went into the Accounts tab of settings of the secondary email address, and added my primary email address as the default address from which to send mail. Since this email account never receives or sends email to individuals and is not synching with my Address Book, whenever I accidentally try to send a regular email from that account the person won't show up in the auto-complete, I'll catch myself, and switch applications. Using a different theme for each account can also help you differentiate.  
![](/projects/other/gmailfiltertip2.png)
 4. But there is a problem -- emails sent from that secondary account will be in that account's sent items, and *not* in the sent items of my primary account. Ah, but when I sent an email to the list it was getting sent back to me anyways, so my primary account will receive that new copy of the email I sent from my secondary account (pretending to be my primary account). They should then be searchable as normal. I even tweaked the filter in my primary account to not forward emails that are both to the student list *and* from my primary account to the secondary account, since I already responded to the thread and don't need to see my response again.  
![](/projects/other/gmailfiltertip3.png)
 5. And finally -- and this is the key piece of the entire puzzle -- I used [Fluid][2] to make a site specific browser application for Gmail, and I use that app to stay logged in to my secondary account. With Firefox logged in to my primary account, I can stay logged into both at all times (if you use Safari as your primary browser it might only let you be logged into one... not sure what the solution to this is). And because Fluid does not behave as a full browser, if I click a link in a list email in my List-specific app, it will open in Firefox (and thus be, forever, in my [AwesomeBar][3] history). As an added bonus, I get a little red flag in the dock saying how many list emails I have unread, and I can simply close the Fluid app and not concern myself with the list if I am too busy for the distraction. *(Update: I am now using [Mailplane][4], which makes it easy to switch between multiple Gmail accounts.)*

Feel free to comment or email if you have any ideas or questions or need help setting it up!

(Note that I tried another solution first -- using Gmail's stars to mark the student list threads as muted, and then trying to match those stars in the incoming filter. So new emails going to that starred thread would theoretically not be re-labeled with the student list label once they were starred and archived once. This doesn't work, however, because the "is:starred" filter does not ever match incoming messages.)

 [1]: http://mail.google.com/support/bin/answer.py?answer=47787
 [2]: http://fluidapp.com/
 [3]: http://blog.mozilla.com/blog/2008/04/21/a-little-something-awesome-about-firefox-3/
 [4]: http://mailplaneapp.com/