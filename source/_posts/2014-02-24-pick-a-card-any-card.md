---
layout: draft
featured: true
title: "Pick a Card, Any Card"
permalink: /2014/02/24/pick-a-card-any-card/
categories:
  - commentary
  - web ideas
blurb: "Making better choices faster using Tinder-like mobile interfaces."
show_blurb: true
styles: |
  #main .entry .entry-content p>img.iphone.right {
    float: none;
    max-width: 165px;
    background-image: url('/images/2014/02/iphone_frame.png');
    background-repeat: no-repeat;
    background-size: 198px auto;
    padding: 62px 17px 59px 17px;
    margin-top: -3px;
  }
  #main .entry .entry-content p>img.iphone.pair {
      max-width: 277px;
      background-image: url('/images/2014/01/iphone_frame.png');
      background-repeat: no-repeat;
      background-size: 330px auto;
      padding: 100px 24px 100px 29px;
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
  }
  #main .entry .entry-content p>img.center {
    display: inline-block;
  }
  #main .entry .entry-content p>img.right {
    float: right;
  }
  #main .entry .entry-content p>img.iphone.pair.right {
    margin-left: 20px;
  }
TODO: replace photos in foursquare screenshots of my friends with generic facebok photos?
---

>What movie should I watch?

>Where should I eat dinner?

>Who should I go on a date with tonight?

To help users answer that last question, the popular mobile dating app Tinder provides a novel [cased-based interface][1][^1]. Upon opening the app a user sees a deck of cards, and each card shows basic information about one potential match – photo, first name, age, and number of mutual friends. These cards are already filtered by location, and the user can tap into a card for more information. The user can also swipe the card left if she’s not interested in a date, or swipe right if she is interested. If two users share mutual interest, they are both notified and can exchange messages through the app. The app is designed to help the user make choices as quickly and easily as possible, and then gets out of the way. (These are the iPhone screenshots that Tinder provided for [the App store][2].)

{% img iphone pair left  /images/2014/02/tinder_mobile_1.png %}
{% img iphone pair       /images/2014/02/tinder_mobile_2.png %}

A similar card-based interface could be adapted to help users answer the other two questions above[^2]. Users face an increasing abundance of choices in a widening variety of contexts. Technology is not only making it easier for users to find dates, but it is also providing users with instant access to nearly every movie ever made and telling users about restaurants they might previously have walked by without noticing.

While web and mobile services such as iTunes, Netflix, Foursquare, and Yelp have helped users wade through the rising tide of options they have presented, their interfaces make the process more difficult than it needs to be. By repurposing and modifying Tinder’s card-based interface, these services could help users make better choices faster.

##### Shortcomings of Existing Interfaces

These choices share common characteristics: there are many options, they are very personal, and they are important to short-term happiness. Results that consist of text, images, and locations tend to be displayed in lists, grids, and maps, respectively.

{% img browser left   thirds /images/2014/02/google_list.png %}
{% img browser center thirds /images/2014/02/google_grid.png %}
{% img browser right  thirds /images/2014/02/google_map.png %}

When people are trying to choose what they want to do, however, these interfaces are overwhelming. They provide minimal information about ten or more results at a time, and the user has to decide which warrant a closer look, or if they want to clear all of the results and move to the next page. Computer-savvy users searching from a web browser can open promising results in different tabs, but users searching from mobile apps aren't so lucky, and instead have to remember their favorites for the duration of the search. The experience only worsens if the user wants to tweak the original query, since these interfaces do not keep any ‘state’ and with each revision the user is essentially starting over.

Consider, for example, a user searching for a movie to watch. iTunes offers only grids and lists based on what’s popular, regardless of the user’s mood or interests. While Netflix offers some personalization, it's still *structured* like a brick-and-mortar Blockbuster store, and both the desktop browser and mobile app interface organize movies in horizontal shelf-like genres.

{% img browser left /images/2014/02/itunes_desktop.png %}
{% img iphone right /images/2014/02/itunes_mobile.png %}

{% img browser left /images/2014/02/netflix_desktop.png %}
{% img iphone right /images/2014/02/netflix_mobile.png %}

Just as in a store a customer would have to physically remove the movie from the shelf, turn it over, and read the back to get more information, iTunes and Netflix require users to hover or tap for more info. Furthermore, none of these interfaces provide a good way for users to keep track of ‘finalist’ candidates while they look at more options. In the store, the user can physically carry around a handful of movies, but will either need to put them back later or ask an employee to do it for her. In the Netflix browser the user can open movies in new tabs, but it’s a delicate maneuver to hover and then right-click the title, and it’s easy to accidentally start playing the movie instead. In the Netflix mobile app, clever users might think to repurpose the Watch List feature, but this is awkward, unintuitive, and requires cleanup later. iTunes users are out of luck on both platforms.

As another example, consider a user who wants to try a new restaurant for dinner. Users can take advantage of services such as Foursquare and Yelp to help them make these choices. While there is some variation the interfaces, results are usually provided in both list and map formats. In the browser, there’s enough space to show them side-by-side (note that the Yelp map can be expanded), but on mobile users toggle between the different views (on Foursquare, scrolling the list minimizes the map, and tapping the map minimizes the list; Yelp offers a List/Map button in the upper right).

{% img browser left /images/2014/02/foursquare_desktop.png %}
{% img iphone right /images/2014/02/foursquare_mobile_1.png %}

{% img browser left /images/2014/02/yelp_desktop.png %}
{% img iphone right /images/2014/02/yelp_mobile_1.png %}

These interfaces are designed to show good options of a certain type in a certain area, but they make it difficult for the user to make informed choices, especially on mobile. While the browser makes it easy to see the basic information about each venue along with where it’s located, the separate list and map views in the mobile interfaces force the user to either tap through to the venue detail page or cross-reference between the two screens in order to see where anything is.

Furthermore, neither interface helps the user narrow down their possibilities to a single result, and instead they treat each new query as a brand new search. For example, imagine a user looking for Japanese food on the way home from work. First she scrolls through all of the results in her initial search area near their office, and takes mental notes of a few promising-looking places. Then she drags the map closer to her apartment to see more results, but if the two maps overlap and the results near her office happen to rank highly, then she’ll have to look at them all again. Even worse, if she’s using the map view in the mobile app rather than the list view, she’ll have to tap each pin again to see if it’s one that she’s already looked at. Similarly, if the user decides halfway through the search that she wants ramen rather than sushi, she’ll have to look through many of the same results. The entire process requires a lot of tapping, a lot of cognitive effort, and a lot of duplicated work. If these services maintained state for each new decision and kept track of what the user had seen, then the user would only need to look at each option once.

##### Decks for Decision Making

Rather than the list, grid, or map interfaces that are currently commonly used, services could leverage card-based interfaces to help users make choices. To understand how this would work, it’s helpful to break the interface down into specific features used in sequence:

0.  Upon launching the app or navigating to the search feature, the user would be presented with a prominent text field and a list of recent searches. Each of these searches would keep track of its own state so that the user doesn’t have to, and the user could later return to this screen to switch between searches or to start over. This is different from Tinder, which groups all activity under a single search.
0.  After entering a query, the user would be presented with a virtual stack of cards, with the top card taking up most of the screen. Each would display the essential information about a particular search result, whether it’s a movie (image, title, year, length, rating, synopsis) or a restaurant (name, location on map, hours, price, rating, tips.
0.  The user could swipe away the current card to reveal the next card, and the app could pre-load the required data so the user could move quickly through the stack. Note that a swipe gesture is is not significantly more effort than that required to scroll past an item in a list UI, especially since the user, cognitively, can only evaluate options one at a time.
0.  Cards that were swiped left would not re-appear for the duration of the current search, but cards that were swiped right would go to a separate deck of finalists. This deck would be accessible from a button in the top bar, and the user could switch between the two decks by tapping that button. That button could also show a badge indicating the number of finalists. By making it easy for the user to keep track of and review good-enough options, the app will pull her gently towards a decision.
0.  If the user wanted to further refine the query, she could enter in new search terms or locations. Rather than start the entire process over, the new app would instead simply shuffle cards that met the new criteria into the deck. Cards the user had already seen, however, would not re-appear.
0.  The order of the cards in the deck could also take into account a variety of more personalized signals, such as the user’s history, her friends’ activity, and her past preferences. More interestingly, the app could learn about the user’s preferences for that specific search. It might notice, for example, that the user was only swiping right on or tapping into ramen restaurants despite having searched for Japanese, and the app could shuffle more ramen and less sushi into the current deck accordingly. In this way the app might be able to tease out preferences that the user wasn’t even consciously aware of.
0.  When the user has made her choice, the app’s job is done. Depending on the type of choice being made, it should be easy for the user to begin watching the movie or to get directions to the restaurant after tapping into an item for more information.

##### Summary

Technology has made it easier for users to discover an increasing abundance of things they might enjoy, but it has not yet offered equivalently improved tools for sorting through these options. Tinder’s user-interface innovations can be modified and applied in other contexts to help users make better choices faster. By showing enough information for users to make a decision about individual options on cards, and by keeping track of which options the user has seen and which they’ve liked, apps can make users happier.

[^1]: Tinder is not the first app to ask the user to rate a succession of items. The first example I can think of is [the Hot or Not of a decade ago](https://web.archive.org/web/20040225003702/http://hotornot.com/), and Pandora also offers a thumbs-up or thumbs-down interface for giving feedback on songs. These are slightly different, but Tinder is the first app I know of to use a card-based interface. Other apps have used a similar interface post-Tinder for other types of content, such as [Branch's link-sharing service Potluck](http://techcrunch.com/2013/11/21/link-sharing-service-potlucks-new-app-combining-messaging-and-news-including-original-content/), but it was focused around content consumption rather than decision making.

[^2]: [Paul Adams recently wrote](http://insideintercom.io/why-cards-are-the-future-of-the-web/) about the trend towards cards as general interactive containers for all types of content, and a startup called [Wildcard](http://www.trywildcard.com) wants to replace the Internet on the phone with a library of cards designed for mobile. While these are compelling visions for the future, they are outside of the scopeof this post; cards can greatly improve the user experience for certain types of choices regardless of their prevalence in other contexts.

[^3]: TODO: the choice of what movie to watch and what restaurant to go to both get even more complex if the user is trying to make a decision with friends about what to watch or where to go. Maybe lists are sync’d between devices to help with group decision making, we each see same possibilities, compares maybe lists at the end. Wandering around a Blockbuster with friends

[1]: http://vimeo.com/84069532#t=0m41s
[2]: https://itunes.apple.com/us/app/tinder/id547702041?mt=8

