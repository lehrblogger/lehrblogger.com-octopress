---
layout: post
featured: false
title: "My Life in the Cloud – A Four-Computer Syncing Scheme"
permalink: /2009/10/09/my-life-in-the-cloud-a-four-computer-syncing-scheme/
dsq_thread_id:
  - 38673972
categories:
  - lifehacks
excerpt: "tl;dr: put your Application Support folderrs in Dropbox"
show_excerpt: true
updates:
  - date: 2011-09-04
    body: "There's a bit more detail about my setup for editing text files in [this new post](/2011/09/04/cloud-writing-with-dropbox-and-writeroom/)."
---
One of the best things about living in New York City is being able to walk everywhere, and walking is much more fun when I am not carrying anything (other than, say, a [notebook][1] and maybe an umbrella). I had been lugging my aging MacBook Pro back and forth between my apartment and work/school for well over a year, and I was tired of the physical and psychological weight (i.e. if I am going out after work, do I want my costly computer with me at the bar, or should I leave it at work and suffer with just my iPhone for a night).

I had been vaguely considering getting two identical computers, keeping one in my locker at school and one at my apartment, and syncing *everything* (files, applications, operating system, all of it) between them, but the expected technical headaches/failures made it impossible to justify the cost of two shiny new Macs. The combined stimuli of a) hearing from lots of people who love [Dropbox][2] (referral link!), b) a growing number of friends at ITP with [Hackintoshed][3] netbooks and c) an offer of an iMac to use at [bit.ly][4] when I started contracting work (as opposed to the previous internship work) made re-examine the problem.

I decided to keep my MBP at home nearly all of the time (to prolong it's lifespan), use the iMac at work, and get a netbook off of craigslist as an experiment to keep in my locker at school (I ended up getting a Dell Mini 9 for $215; installing OS X was mostly [painless][5]). I'd install OS X (one Leopard, two Snow Leopard) on all three computers, install my favorite applications (I was unwilling to use another operating system primarly because I like my Mac-only apps so much), synchronize crazily and seamlessly, and walk without being encumbered. (The fourth computer is my iPhone 3GS.)

It's now been four weeks, and my scheme has been working well. I'm doing different things for different applications, as described below:

 * **[Gmail][6]** is in the cloud as it always has been, but this becomes especially important when you're using multiple computers. I have [Mailplane][7] installed on all three computers to access it, but that doesn't have any data of its own to sync.
 * **[Evernote][8]** handles syncing itself between as many devices as you want, [or so][9] [it has][10] [so far][11].
 * **[Address Book and iCal][12]** are being synced by [MobileMe][13] -- I haven't had to pay for it yet, and am not thrilled about the $99/year, but it's also nice to have these things automatically synced to my iPhone even when I don't plug it in. I might switch over to some sort of free Google-hosted solution instead. (Note that MobileMe had all sorts of problems when I tried to sync my keychains on Snow Leopard. I ultimately ended up turning off that sync, restoring to a pre-install backup, and re-installing the OS... I don't really need to sync my keychains, but it was a pretty big hassle.)
 * **[Things][14]** stores all of it's information about my various to-do lists in an XML file in it's Application Support folder (which is in the Library folder of my user directory). I quit the app, moved its folder into my Dropbox folder, and then made a symbolic link (or alias) to that folder from it's original location (using a Terminal command similar to "ln -s /Users/steven/Dropbox/Things /Users/steven/Library/Application\ Support/Cultured\ Code/Things" on all three computers. Things doesn't know that the files are in a different place, and they have synced so far without any issues. The iPhone sync on Things is still [broken][15] though -- hopefully there is a fix coming [soon][16].
 * **[Adium][17]** needed to be synced so that I could have all of my AIM conversation transcripts in one place (or, really, in all places). Putting the Application Support folder in Dropbox did the trick.
 * **[1Password][18]** also syncs between computers with Dropbox as described above and syncs beautifully over a wifi network with my iPhone. (Note I ran into some trickiness with the Firefox extension -- it expects the actual application to be in the same directory on all three computers, which is only a problem if you try to organize your Applications folder into sub-folders, **which you should never ever do** for unrelated reasons that I won't go into here.)
 * **[Firefox][19]** is the finishing touch -- I have my Application Support folder for this in Dropbox too, and this syncs *everything*: current tabs, bookmarks, history, [AwesomeBar][20], extensions, all of it. It was essential that this application sync properly for the whole thing to be feasible (I use the AwesomeBar constantly), and it's amazing. It even recovers my tabs nicely if it fails for some reason. (An added benefit is that my puny little netbook can't handle lots of tabs, so it forces me to keep things to a reasonable minimum.)

Note that I am very careful to quit all of these applications and let Dropbox do its thing before I shut down any of these computers to go to another place, but it keeps 'conflict copies' of the files in case I forget. I'm also not doing anything at all with my music beyond keeping a good chunk of it on my iPhone, and that hasn't really bothered me yet as I don't often need my whole music library at work or at school.

It's hard for me to accurately describe the psychological freedom that comes with having all of my most important data easily accessible at whatever computer I might find myself in front of (in theory, I could install everything on a new machine without having any access to the others and be up and running completely comfortably relatively quickly). I'm enjoying it and have been quite satisfied.

And one more thing -- I love my netbook. [Train rides][21] aside, it was incredibly practical for traveling in Europe for two weeks with my family, it's super-easy to carry casually in one hand around the floor at ITP, the three hour battery life seems absurdly luxurious (in comparison to the ~30 minutes I get on my MBP), and it was sooo cheap.

Let me know if you have any questions or want help setting this up for yourself!

 [1]: /2009/01/15/4-in-4-day-3-project-3-mleskine/
 [2]: http://www.dropbox.com/referrals/NTE3NTA2MTI5
 [3]: http://en.wikipedia.org/wiki/Hackintosh
 [4]: http://bit.ly/
 [5]: http://www.mydellmini.com/forum/dell-mini-9-guides/
 [6]: https://mail.google.com/
 [7]: http://mailplaneapp.com/
 [8]: http://evernote.com/
 [9]: http://twitter.com/al3x/status/4485783606
 [10]: http://twitter.com/lehrblogger/status/4490243388
 [11]: http://twitter.com/al3x/status/4490399978
 [12]: http://www.apple.com/macosx/what-is-macosx/mail-ical-address-book.html
 [13]: http://www.me.com/
 [14]: http://culturedcode.com/things/
 [15]: http://twitter.com/lehrblogger/status/4608573026
 [16]: http://twitter.com/therealkerni/status/4608765404
 [17]: http://adium.im/
 [18]: http://agilewebsolutions.com/products/1Password
 [19]: http://www.mozilla.com/en-US/firefox/personal.html
 [20]: http://blog.mozilla.com/blog/2008/04/21/a-little-something-awesome-about-firefox-3/
 [21]: http://xkcd.com/642/
