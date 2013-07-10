---
layout: post
featured: false
title: "Design for UNICEF - RapidSMS and Mechanical Turk"
permalink: /2009/02/20/design-for-unicef-rapidsms-and-mechanical-turk/
dsq_thread_id:
  - 17673185
categories:
  - projects
  - ITP
  - ITP - Design For UNICEF
blurb: "A system for processing freeform SMS input."
show_blurb: true
crossposts:
  - site: "Textonic.org"
    link: "http://textonic.org/2009/02/20/design-for-unicef-rapidsms-and-mechanical-turk/"
---
This is my first post about Clay Shirky's Spring 2009 class Design for UNICEF ([syllabus][1]). Our task is to design, build, and deploy solutions to improve the lives of people in Africa under the age of thirty. We've spent the first part of the semester in small groups iterating through a huge number of potential ideas, but now things have begun to solidify. 

I'm excited to be working in a group with Thomas Robertson, Lina Maria Giraldo, Amanda Syarfuan, and Yaminie Patodia. Our project in a sentence: **We plan to extend UNICEF's existing RapidSMS platform and RapidSMS-based projects to use Amazon's Mechanical Turk online task marketplace to provide automated correction of malformatted SMS database inputs.**

RapidSMS ([link 1][2], [link 2][3]) is a project developed by Evan Wheeler, Adam Mckaig and others in UNICEF's Division of Communication. It is designed to be an extensible platform for sending and receiving [SMS][4] text messages using a computer server. Mobile phone penetration in Africa is relatively high and growing quickly, and SMS is a powerful tool that can be applied to a wide variety of UNICEF-type projects. It is particularly useful for quickly aggregating large amounts of data from the field; where previous methods required the tedious process of faxing in and compiling paper forms, mobile phones can be used to submit that data quickly via text message, and this ultimately allows coordinators to make better decisions about the allocation of limited resources. RapidSMS allows for automatic insertion of SMS messages into a centralized database, as well as the export of this data in human- and machine-readable formats (such as graphs and Excel files). It has already been deployed for a food supply distribution project in Ethiopia ([link][5]) and a child malnutrition monitoring project in Malawi ([link][6]).

One challenge for such SMS-based database input systems is the problem of malformed texts inputs -- users won't always know the proper message format or might be in a hurry and mis-type a key. It's practically impossible to design a system that can handle all database inputs, so as a result valuable information gets thrown out, even though it is present in the messages. An actual person might be able to successfully parse many of these malformed messages and determine which pieces of information from the SMS goes in which database fields; UNICEF workers, however, generally have more pressing tasks while in the field. 

We plan to extend the open-source RapidSMS system to have the functionality of automatically sending these malformed SMS database inputs to Amazon's Mechanical Turk for conversion into proper database inputs. ([Mechanical Turk][7] is an online marketplace that automatically pairs tasks that are simple (yet too hard for a computer to do) with people who want to do them for money (often just a few cents).) This RapidSMS extension could then be integrated into existing projects mentioned above, making them more scalable and more effective.

I'll post more as the project progresses throughout the semester, and please leave a comment with any feedback!

 [1]: http://itp.nyu.edu/varwiki/Syllabus/UNICEF-S09
 [2]: http://unicefinnovation.org/mobile-and-sms.php
 [3]: http://mobileactive.org/wiki/RapidSMS_Review
 [4]: http://en.wikipedia.org/wiki/Short_message_service
 [5]: http://mobileactive.org/preventing-famine-mobile
 [6]: http://www.globaldevelopmentcommons.net/node/778
 [7]: https://www.mturk.com/
