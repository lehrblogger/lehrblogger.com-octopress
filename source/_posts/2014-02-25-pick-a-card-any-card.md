---
layout: post
featured: true
title: "Pick a Card, Any Card"
permalink: /2014/02/25/pick-a-card-any-card/
categories:
  - commentary
  - web ideas
blurb: "Making better choices faster using Tinder-like mobile interfaces."
show_blurb: true
thanks:
  - name: Nina
    link: "http://youngandbrilliant.net/"
  - name: Bryan
    link: "http://blence.com/"
styles: |
  #main .entry .entry-content p>img.iphone {
    background-image: url('/images/2014/02/iphone_frame.png');
    background-repeat: no-repeat;
  }
  #main .entry .entry-content p>img.iphone.browseriphone {
    max-width: 185px;
    background-size: 220px auto;
    padding: 69px 16px 62px 19px;
    margin-top: -3px;
  }
  #main .entry .entry-content p>img.iphone.iphoneiphone {
    max-width: 285px;
    background-size: 340px auto;
    padding: 105px 25px 101px 30px;
  }
  #main .entry .entry-content p>img.browser {
    /* Use browser windows that are 1030x1023 to scale down to 460x457 */
    -webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.5);
    box-shadow: 0 0 16px rgba(0, 0, 0, 0.5);
    background-color: rgba(0, 0, 0, 0.15);
  }
  #main .entry .entry-content p>img.browser.browserbrowserbrowser {
    max-width: 220px;
  }
  #main .entry .entry-content p>img.wireframe {
    float: right;
    width: 340px;
    margin: 0 0 20px 20px;
  }
  #main .entry .entry-content p>img.alpha,
  #main .entry .entry-content p>img.center {
    margin-right: 10px;
  }
  #main .entry .entry-content p>img.omega,
  #main .entry .entry-content p>img.center {
    margin-left: 10px;
  }
  #main .entry .entry-content p.clearfix:before,
  #main .entry .entry-content p.clearfix:after {
      content:"";
      display:table;
  }
  #main .entry .entry-content p.clearfix:after {
      clear:both;
  }
  /* For IE 6/7 (trigger hasLayout) */
  #main .entry .entry-content p.clearfix {
      zoom:1;
  }
---
>What movie should I watch?

>Where should I eat dinner?

>Who should I go on a date with tonight?

To help users answer that last question, the mobile app [Tinder][1] provides a unique [cased-based interface][2][^1]. Upon opening the app a user sees a deck of cards, and each card shows basic information about one potential match – photo, first name, age, and number of mutual friends. These cards are already filtered by location, and the user can tap into a card to find out more. The user can also swipe the card left if she's not interested in a date, or swipe right if she is interested. If two users share mutual interest, they are both notified and can exchange messages through the app. The app is designed to help the user make choices as quickly and easily as possible, and then gets out of the way. (These are the iPhone screenshots that Tinder provided for [the App store][3].)

<p class="clearfix">
{% img iphone iphoneiphone six columns alpha /images/2014/02/tinder_mobile_1.png %}
{% img iphone iphoneiphone six columns omega /images/2014/02/tinder_mobile_2.png %}
</p>

Technology is not only making it easier for users to find dates, but it is also providing users with instant access to nearly every movie ever made and telling users about restaurants they might previously have walked by without noticing. Users face an increasing abundance of choices in a widening variety of contexts, and a similar card-based interface could be adapted to help users answer the questions about what to watch or where to eat[^2].

##### Shortcomings of Existing Interfaces

These choices – what to watch, where to eat, and who to go on a date with – all share common characteristics: there are many options, preferences are very personal, and they are important to short-term happiness. On most services, results that consist of text, images, and locations are displayed in lists, grids, and maps, respectively.

<p class="clearfix">
{% img browser four columns alpha  /images/2014/02/google_list.png %}
{% img browser four columns center /images/2014/02/google_grid.png %}
{% img browser four columns omega  /images/2014/02/google_map.png %}
</p>

When people are trying to choose what they want to do, however, these interfaces make the process more difficult than it needs to be. They provide minimal information about ten or more results at a time, and the user has to decide which warrant a closer look, or if they want to clear all of the results and move to the next page. Computer-savvy users searching from a web browser can open promising results in different tabs, but users searching from mobile apps aren't so lucky, and instead have to remember their favorites for the duration of the search. The experience only worsens if the user wants to tweak the original query, since these interfaces do not keep any 'state' and with each revision the user is essentially starting over.

Consider, for example, a user searching for a movie to watch. iTunes offers only grids and lists based on what's popular, regardless of the user's mood or interests. While Netflix offers some personalization, it's still *structured* like a brick-and-mortar Blockbuster store, and both the desktop browser and mobile app interface organize movies in horizontal shelf-like genres.

<p class="clearfix">
{% img browser browseriphone eight columns alpha /images/2014/02/itunes_desktop.png %}
{% img iphone  browseriphone four  columns omega /images/2014/02/itunes_mobile.png %}
</p>

<p class="clearfix">
{% img browser browseriphone eight columns alpha /images/2014/02/netflix_desktop.png %}
{% img iphone  browseriphone four  columns omega /images/2014/02/netflix_mobile.png %}
</p>

Just as in a store a customer would have to physically remove the movie from the shelf, turn it over, and read the back to get more information, iTunes and Netflix require users to work to get more info. Furthermore, none of these interfaces provide a good way for users to keep track of 'finalist' candidates while they look at more options. In the store, the user can physically carry around a handful of movies, but will either need to put them back later or ask an employee to do it for her.

Netflix does let each user keep a List of movies to watch, but this feature has evolved from the DVD rental queue, and feels more like a 'list of movies to watch one day' and less like 'a way to keep track of movies to watch now.' The latter implies movies for a certain day, mood, and audience, and consequently requires a more selective process. Most users to resort to the inelegant practice of opening each potential movie for 'right now' in a new tab, which also requires a delicate hover-move-right-click and makes it easy to accidentally start playing the movie instead. The custom iTunes Store browser is even worse: it doesn't even let users open multiple tabs, and it buries its Wish List feature deep in the UI. 

As another example, consider a user who wants to try a new restaurant for dinner. Users can take advantage of services such as Foursquare and Yelp to help them make these choices. While there is some variation the interfaces, results are usually provided in both list and map formats. In the browser, there's enough space to show them side-by-side (note that the Yelp map can be expanded), but on mobile users toggle between the different views (on Foursquare, scrolling the list minimizes the map, and tapping the map minimizes the list; Yelp offers a List/Map button in the upper right).

<p class="clearfix">
{% img browser browseriphone eight columns alpha /images/2014/02/foursquare_desktop.png %}
{% img iphone  browseriphone four  columns omega /images/2014/02/foursquare_mobile.png %}
</p>

<p class="clearfix">
{% img browser browseriphone eight columns alpha /images/2014/02/yelp_desktop.png %}
{% img iphone  browseriphone four  columns omega /images/2014/02/yelp_mobile.png %}
</p>

These interfaces are designed to show good options of a certain type in a certain area, but they make it difficult for the user to make informed choices, especially on mobile. While the browser makes it easy to see the basic information about each venue along with where it's located, the separate list and map views in the mobile interfaces force the user to either tap through to the venue detail page or cross-reference between the two screens in order to see where anything is.

In addition, neither interface helps the user narrow down their possibilities to a single result, and instead they treat each new query as a brand new search. For example, imagine a user looking for Japanese food on the way home from work. First she scrolls through all of the results in her initial search area near their office, and takes mental notes of a few promising-looking places. Then she drags the map closer to her apartment to see more results, but if the two maps overlap and the results near her office happen to rank highly, then she'll have to look at those same results a second time. Even worse, if she's using the map view in the mobile app rather than the list view, she'll have to explicitly tap each pin again to see if it's one that she's already looked at. Similarly, if the user decides halfway through the search that she wants ramen rather than sushi, she'll have to look through many of the same results. The entire process requires a lot of tapping, a lot of cognitive effort, and a lot of duplicated effort. If these services maintained state for each new decision and kept track of what the user had seen, then the user would only need to look at each option once.

##### Decks for Decision Making

Rather than the list, grid, or map interfaces that are currently common, services could repurpose Tinder's card-based interface to help users make better choices faster. To understand how this would work, it's helpful to break the interface down into specific features used in sequence:

{% img wireframe right /images/2014/02/card_wireframe_mobile_1.png %}
{% img wireframe right /images/2014/02/card_wireframe_mobile_2.png %}

0.  The first thing a user would see would be a text field for entering a query, and perhaps a list of suggested categories or keywords. There would also be a way for the user to see past searches – each search keeps track of its own state, and she might want to return to or continue them later. (Tinder, in contrast, groups all of a user's activity under a single search.)
0.  After entering a query, the user would be presented with a virtual stack of cards, with the top card taking up most of the screen. Each would display the essential information about a particular search result, whether it's a movie (title, image, year, length, rating, etc) or a restaurant (name, location on map, price, rating, etc).
0.  The user could swipe away the current card to reveal the next card, and the app could pre-load the required data to let the user  move quickly. Note that a swipe gesture is not significantly more effort than that required to scroll past an item in a list UI, especially since the user, cognitively, can only evaluate one option at a time.
0.  Cards that were swiped left would not re-appear in the current deck, but cards that were swiped right would go to a separate deck of finalists. This deck would function much like an online shopping cart, except the user would only ultimately 'purchase' one of the items.
0.  This deck would be accessible from a button in the top bar, and the user could switch between the two decks by tapping that button. That button could also show a badge indicating the number of finalist cards. By making it easy for the user to keep track of and review good-enough options, the app will pull her gently towards a decision.
0.  If the user wanted to further refine the query, she could enter in new search terms or locations. Rather than start the entire process over, the new app would instead simply shuffle cards that met the new criteria into the deck. Cards the user had already seen, however, would not re-appear.
0.  The order of the cards in the deck could also take into account a variety of more personalized signals, such as the user's history, her friends' activity, and her past preferences. More interestingly, the app could learn about the user's preferences for *that specific search*[^3]. It might notice, for example, that the user was only swiping right on or tapping into ramen restaurants despite having searched for Japanese, and the app could shuffle more ramen and less sushi into the current deck accordingly. In this way the app might be able to tease out preferences that the user wasn't even consciously aware of.
0.  When the user has made her choice, the app's job is done. Depending on the type of choice being made, it should be easy for the user to begin watching the movie or to get directions to the restaurant.

##### Summary

Technology has made it easier for users to discover an increasing abundance of things they might enjoy, but it has not yet offered equivalently improved tools for wading through this deluge of options.  iTunes, Netflix, Foursquare, and Yelp are not the only services that might benefit from Tinder's card-based interface, since users face similar choices when shopping for clothing, searching for an apartment, and choosing a book to read. By using cards to show enough information for users to make a decision about individual options, and by keeping track of which options the user has seen and which they've liked, services can help users make better choices faster, and ultimately make users happier.

[^1]: Tinder is not the first app to ask the user to rate a succession of items. The first example I can think of is [the Hot or Not of a decade ago](https://web.archive.org/web/20040225003702/http://hotornot.com/), and Pandora also offers a thumbs-up or thumbs-down interface for giving feedback on songs. These are slightly different, but Tinder is the first app I know of to use a card-based interface. Other apps have used a similar interface post-Tinder for other types of content, such as [Branch's link-sharing service Potluck](http://techcrunch.com/2013/11/21/link-sharing-service-potlucks-new-app-combining-messaging-and-news-including-original-content/), but it was focused around content consumption rather than decision making.

[^2]: [Paul Adams recently wrote](http://insideintercom.io/why-cards-are-the-future-of-the-web/) about the trend towards cards as general interactive containers for all types of content, and a startup called [Wildcard](http://www.trywildcard.com) wants to replace the Internet on the phone with a library of cards designed for mobile. While these are compelling visions for the future, they are outside of the scopeof this post; cards can greatly improve the user experience for certain types of choices regardless of their prevalence in other contexts.

[^3]: In high shool, my friends and I would spend nearly as long in the Blockbuster deciding what to watch as we would spend watching the chosen movie itself. Choices about what to watch or where to eat are often made collectively by groups of friends, and per-search adaptation could be especially useful in those circumstances. Perhaps, for example, the user loves sushi, but tonight she happens to be eating with a friend who is vegan. It might be useful for the app to ask the user who she was with, or maybe the app could even let multiple users collaborate on the same search at the same time on their own devices with their own decks of cards, but these features lie too far beyond a minimum viable product.

[1]: http://www.tinder.com/
[2]: http://vimeo.com/84069532#t=0m41s
[3]: https://itunes.apple.com/us/app/tinder/id547702041?mt=8

