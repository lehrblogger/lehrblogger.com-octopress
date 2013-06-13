---
layout: post
featured: false
title: "Sociable Objects - Rock Paper Scissors"
permalink: /2008/06/15/sociable-objects-rock-paper-scissors/
blogger_blog:
  - lehrburger.blogspot.com
blogger_author:
  - Steven Lehrburgerhttp://www.blogger.com/profile/01324094738204359728noreply@blogger.com
blogger_permalink:
  - /2008/06/sociable-objects-rock-paper-scissors.html
dsq_thread_id:
  - 17673056
categories:
  - assignments
  - ITP
  - ITP - SocObj
---
For this assignment, Armanda and I each built a circuit with an Arduino, an XBee radio, four switches, and several LEDs to play the game [Rock Paper Scissors][1].

Play proceeds as follows: one player selects a choice using one of the switches, the choice is transmitted to the other player, an LED lights up on the other player's board to indicate to the second player that the first player is waiting to receive a choice from the second player, the second player chooses a score that is transmitted to the first player, and when each player has the other players score a light indicates what the other player has chosen. An additional light on each board indicates the winner -- if there is a tie then both lights are on, otherwise thxe winner is the player with the illuminated light, and either player can press a New Game switch to reset his own game and tell the other player to reset.

We extended the project to build a third circuit to keep score of the game. A third Arduino and XBee were used with a modification of the [Binary Counter][2] project I had built before. Each board keeps track of its own score and transmits that score to the scorekeeper when the New Game button has been pressed. Scores up to 16 for each player are indicated on two sets of four LEDs.

The Arduino code for each the two players is online [here][3], and the code for the scorekeeper is online [here][4]

Video with scorekeeper:  
{% iframe_embed youtube nJ8kfZUNQD4 %}

Video without scorekeeper:  
{% iframe_embed vimeo 1139999 %}

<a href="http://lehrburger.com/SocObj_RPSLab/SANY0005.jpg"><img src="http://lehrburger.com/SocObj_RPSLab/SANY0005.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

<a href="http://lehrburger.com/SocObj_RPSLab/SANY0004.jpg"><img src="http://lehrburger.com/SocObj_RPSLab/SANY0004.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

<a href="http://lehrburger.com/SocObj_RPSLab/SANY0002.jpg"><img src="http://lehrburger.com/SocObj_RPSLab/SANY0002.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>
  
 [1]: http://en.wikipedia.org/wiki/Rock_paper_scissors
 [2]: http://lehrburger.blogspot.com/2008/05/pcomp-binary-counter.html"
 [3]: http://lehrburger.com/RPS_final.pde
 [4]: http://lehrburger.com/RPS_scorekeeper.pde
