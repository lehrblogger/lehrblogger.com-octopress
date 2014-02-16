---
layout: post
featured: true
title: "Pick a Card, Any Card"
permalink: /2013/02/17/pick-a-card-any-card/
categories:
  - commentary
  - web ideas
blurb: "A Tinder-like mobile interface to rescue us from the paradox of choice."
show_blurb: true
styles: |
  #main .entry .entry-content p>img.iphone {
    max-width: 165px;
    background-image: url('/images/2014/02/iphone_frame.png');
    background-repeat: no-repeat;
    background-size: 198px auto;
    padding: 62px 17px 59px 17px;
    margin-top: -3px
  }
  #main .entry .entry-content p>img.browser {
    /* Use browser windows that are 1030x876 */
    max-width: 481px;
    -webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.5);
    box-shadow: 0 0 16px rgba(0, 0, 0, 0.5);
    background-color: rgba(0, 0, 0, 0.15);
  }
  #main .entry .entry-content p>img.browser.thirds {
    max-width: 220px;
  }
  #main .entry .entry-content p>img.left {
    float: left;
    margin-right: 20px;
    margin-bottom: 32px;
  }
  #main .entry .entry-content p>img.center {
    display: inline-block;
    margin-bottom: 32px;
  }
  #main .entry .entry-content p>img.right {
    float: right;
    margin-bottom: 32px;
  }
---
Hello, world.

{% img browser left   thirds /images/2014/02/google_list.png %}
{% img browser center thirds /images/2014/02/google_grid.png %}
{% img browser right  thirds /images/2014/02/google_map.png %}

blah blah

{% img browser left /images/2014/02/test.png %}
{% img iphone right /images/2014/02/netflix_mobile.png %}