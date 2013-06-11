---
layout: post
featured: false
title: Cloud Writing with Dropbox and WriteRoom
permalink: /2011/09/04/cloud-writing-with-dropbox-and-writeroom/
dsq_thread_id:
  - 404646046
featured: false
categories:
  - lifehacks
excerpt: Companies that are secretive about their in-progress products are at a significant disadvantage.
---

I've been living my life in the cloud for nearly two years now, and loving it. I'm synchronizing state between my home computer, my work computer, and multiple iDevices using a setup I described in [this post][1], but I wanted to elaborate here on what I'm doing with my in-progress text files.

[Dropbox][2][^1] is great for making transparent backups of whatever I'm working on, for syncing my Application Support folders, and also for giving me access to unfinished blog posts, shopping lists, email drafts, and other things while on the go. The [Dropbox iOS app][3] lets you view but not edit files, so I tried out [PlainText][4] by [Hogs Bay Software][5]. I've been using their Mac OS X app, WriteRoom, for years, and decided it was worth the $4.99 to get rid of the ads and upgrade to the [WriteRoom iOS app][6]. 

My Dropbox folder looks like this:

[<img src="/images/2011/09/dropbox-folder.png" alt="~/Dropbox/sync/WriteRoom/" title="~/Dropbox/sync/WriteRoom/" width="656" height="201" />][7]

I wanted mobile access to everything *except* the `other`, `sync`, and `work-src` directories. I didn't want WriteRoom to have to do the extra work of syncing the tens-of-thousands of Application Support files, and I didn't want them taking up space on my iPhone or iPad. I reached out to Hogs Bay to see if there was a way to perform a "Sync All Now" on only some directories, and Grey Burkart got back to me with some helpful suggestions.

Since the Dropbox API only gives iOS client applications access to a single directory path, he suggested I make a new directory for WriteRoom to sync with (you specify that directory when you set up the app for the first time). Mine is called `~/Dropbox/sync/WriteRoom/`, and GoBoLinux users might call it the `~/Dropbox/Depot/`, but you can use whatever you like. I then made [symbolic links][8] from the directories containing the text files I wanted to be able to edit to this new `Depot` directory. When I'm using the WriteRoom iOS app it can only see the directories I've told it about, while at my other computers I see the full tree. Note that some directories such as `notepad docs` are located elsewhere in Dropbox, but I can still make the appropriate symlinks. It's a bit of a hack to set up, but works perfectly. 

Thanks, Grey! And others should feel free to comment or contact me if you have any questions or tips.

[^1]: <http://db.tt/wwbWOwB> is a referral link! Use it when you sign up and we both get 250MB more free space :)

 [1]: /2009/10/09/my-life-in-the-cloud-a-four-computer-syncing-scheme/
 [2]: http://db.tt/wwbWOwB
 [3]: http://itunes.apple.com/us/app/dropbox/id327630330?mt=8
 [4]: http://itunes.apple.com/us/app/plaintext-dropbox-text-editing/id391254385?mt=8
 [5]: http://www.hogbaysoftware.com/
 [6]: http://itunes.apple.com/us/app/writeroom/id288751446?mt=8
 [7]: /images/2011/09/dropbox-folder.png
 [8]: http://unixhelp.ed.ac.uk/CGI/man-cgi?ln