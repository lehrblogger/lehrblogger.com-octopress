---
layout: post
featured: false
title: "Intro to Computational Media - HW4"
permalink: /2008/10/09/intro-to-computational-media-hw4/
dsq_thread_id:
  - 17673086
categories:
  - assignments
  - ITP
  - ITP - ICM
blurb: "Baby's first Scala!"
show_blurb: true
---
(Sorry for the late post -- I was hoping to find a better way to post this online, but no luck so far.)

I had been wanting to try a programming language called [Scala][1] for a while, and recently there were a [few][2] [posts][3] on the Coderspiel blog about a Scala fork for the Processing Development Environment. I decided to take this weeks ICM assignment as an opportunity to try it out. Jorge Ortiz, a friend and Scala programmer extraordinaire, deserves immense credit for teaching me much about the new language and helping me resolve various issues.

For the second Coderspiel post, n8an rewrote Flocking (a simple emergent behavior simulation) in Scala, basing his work on a Processing [applet][4] written by my ICM instructor Daniel Shiffman. I based my work off of n8an's Scala [code][5], worked through everything carefully to get a feel for it, and added a couple of modifications (more on those in a minute). I worked in Eclipse (rather than the Spde that Coderspiel made available), and this was helpful for dealing with the syntax of a new language and a project with multiple classes, but I ran into problems trying to export my applet. I was able to use the [Fat Jar][6] Eclipse plugin (being sure to have both core.jar and scala-library.jar added to my build path) and a couple of semi-hacks recommended by Jorge (scroll to the end of Flocking.scala) to get a working applet. The Scala library jar is ~3.5mb and Fat Jar incorporates the entire thing, and this made my applet much bigger than it needed to be, so I tried to use [ProGuard][7] (as recommended by Coderspiel) to shrink it down. I couldn't get this to give me a jar file that I could run, and I also couldn't get the larger jar file to display in a browser. I needed to move on to other things, and hopefully I can get it working later.

The first modification I made to Flocking was the introduction of multiple species (represented by color). Boids only flock with members of the same species, and they steer away from members of other species. The second modification was collission detection -- when two boids collide (because they were unable to turn quickly enough), both boids are removed from the screen, and there is a quickly shrinking 'poof' to represent the collision.

![](/projects/fall08/icm/hw4/flocking.png "Flocking")

Right click and save this jar to try it out, and let me know if you have any questions about the code.

 * [Flocking_solo.jar][7] (click to make new boids)
 * [Flocking.scala][8]
 * [Flock.scala][9]
 * [Boid.scala][10]
 * [Poofs.scala][11]
 * [Poof.scala][12]
 * [Vector.scala][13]

 [1]: http://www.scala-lang.org/
 [2]: http://technically.us/code/x/runaway-processing/
 [3]: http://technically.us/code/x/flocking-with-spde/
 [4]: http://www.shiffman.net/itp/classes/nature/week08_s06/flocking/
 [5]: http://technically.us/git?p=spde.git;a=blob_plain;f=examples/src/main/resources/examples/Topics/Simulate/Flocking/Flocking.pde;hb=HEAD
 [6]: http://fjep.sourceforge.net/ 
 [7]: /projects/fall08/icm/hw4/Flocking_solo.jar
 [8]: /fall08/icm/hw4/Flocking.scala
 [9]: /fall08/icm/hw4/Flock.scala
 [10]: /fall08/icm/hw4/Boid.scala
 [11]: /fall08/icm/hw4/Poofs.scala
 [12]: /fall08/icm/hw4/Poof.scala
 [13]: /fall08/icm/hw4/Vector.scala
