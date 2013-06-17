---
layout: post
featured: false
title: "Sociable Objects - Tick Tock Tock"
permalink: /2008/06/30/sociable-objects-tick-tock-tock/
blogger_blog:
  - lehrburger.blogspot.com
blogger_author:
  - Steven Lehrburgerhttp://www.blogger.com/profile/01324094738204359728noreply@blogger.com
blogger_permalink:
  - /2008/07/sociable-objects-tick-tock-tock.html
dsq_thread_id:
  - 17673058
categories:
  - assignments
  - lifehacks
  - ITP
  - ITP - SocObj
excerpt: "\"There will be time, there will be time.\""
show_excerpt: true
---
My final project for my first ITP class involved the automated manipulation of time to improve a user's behavior in coordinating with other people. People are often late, and in an effort to make themselves less late they set their watches and clocks fast. This causes people to think that they have less time than they actually do, and as a result they hurry more and are less late, which is theoretically good for everyone.

This approach is imperfect, however, because the person who set his/her clock fast would know how fast it was and would account for that adjustment in subconscious judgments of how much time they had to complete the given task. The alternative method of "closing your eyes and holding down the button" is still imperfect, since the offset is then random and not necessarily useful. People are also not always in a hurry, and a fast clock in those situations can be inconvenient. Finally, the delusion about the actual time becomes even more fragile when other clocks are involved that either display the correct time or were randomly set to a different incorrect time.

The goal of my project was to prototype an *immersive and dynamic delusion about time. I would use the XBee radios to synchronize the time between multiple devices, and Arduinos would interface with the XBees and handle displaying that time. I would use a sensor on a watch device to gauge the user's stress level -- measures of galvanic skin response, heart rate, speed of motion, and watch-checking-motions were considered. Then each device in the network would then offset its own current time by an amount that was a function of the user's stress level. (Note there is an alternative possibility of slowing down time as the user got more stressed in an effort to calm him/her down. Both this laid-back and the other approach have interesting psychological consequences, but the fundamental techincal details are the same.)

Thus, as the user got more stressed, time would speed up, the user would hurry more, become more efficient, and would be less late. As the user calmed down again, the offset would slowly return to zero and the time would return to its accurate setting. (The function calculating the offset would approach a limit to prevent the problem of a positive feedback loop.) Changes would be gradual enough to go unnoticed by the occasional observer, and thus the user would act as if the time displayed on the devices was correct.

I made substantial progress in the implementation of this device network. I hacked a digital watch so that it was possible to set its time from an Arduino by rapidly sending high voltage pulses to the button contacts in the same pattern as a person would use to set the watch. I configured a serial LCD screen to receive and display a time and date (in the same manner as an alarm clock) and keep its own internal count of the time. My computer was then able to send out a time and date to the other two devices, and they would then set their own times to be (roughly) in sync with the computer. After the initial times were set, the watch could then instruct the LCD to change its time by a specified offset (I ran into difficulties setting the System Time in Mac OS X using Processing, but it would work in theory) corresponding to a users stress level. Accurate gauging of an individual's stress level is a project in and of itself (including calibration for each person), so a simple push button was used as a placeholder for that signal.

Additional work on the project could include multiple types of devices (how would one accurately set an analog wall clock without being able to see the hands) and the introduction of multiple users into the system (what's a clock to do if one person in the room is stressed, and the other is not).

[Arduino code for Watch][1]  
[Arduino code for SerialLCD][2]  
[Processing code for Computer][3]

Following are the slides that I used for my in-class presentation, a demo video of the entire project, a demo video of only the watch component, and several images.

<iframe src="http://280slides.com/Viewer/?user=4512&amp;name=ITP_SocObj_final" style="border: 1px solid black; padding: 0pt;" height="328" width="400"></iframe>

{% iframe_embed vimeo 1262325 630 421%}

{% iframe_embed vimeo 1262447 560 421%}
  
###### <a href="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-2.jpg"><img src="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-2.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

###### <a href="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-5.jpg"><img src="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-5.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

###### <a href="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-10.jpg"><img src="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-10.jpg" alt=" " id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

###### <a href="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-14.jpg"><img src="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-14.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

###### <a href="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-16.jpg"><img src="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-16.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

###### <a href="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-19.jpg"><img src="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-19.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

###### <a href="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-21.jpg"><img src="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-21.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

###### <a href="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-24.jpg"><img src="http://lehrburger.com/SocObj_FinalProject/SocObj_FinalProject-24.jpg" alt="" id="BLOGGER_PHOTO_ID_5205122160176868562" /></a>

 [1]: http://lehrburger.com/FP_Watch_web.pde
 [2]: http://lehrburger.com/FP_SerialLCD_web.pde
 [3]: http://lehrburger.com/FP_Computer_web.pde
