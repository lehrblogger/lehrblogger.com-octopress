---
layout: project
featured: false
title: "Wanderli.st"
permalink: /wanderlist/
alias: /2009/04/10/wanderlist/
end_date: 2011-07-06
categories:
  - projects
  - Wanderlist
  - ITP
  - ITP - thesis
blurb: "Wander the Internet, bring your friends."
show_blurb: false
thanks:
  - name: "Jorge Ortiz"
    link: "https://twitter.com/jorgeo"
thanks_note: "for the conceptual and technical advice."
---
#### wanderli.st -- wander the [internet][1], bring your [f][2][r][3][i][4][e][5][n][6][d][7][s][8]

Wanderli.st was my thesis project at ITP. It was a social tool that allowed users to manage their relationships and identities across the services where they already share content. A video of my presentation is below, followed by a list of related posts.

{% iframe_embed vimeo 11970364 700x396 %}

<div class="item-list">
{% for item in site.categories["Wanderlist"] %}
{% if item.layout == 'post' %}
{% include item_info.html %}
{% endif %}
{% endfor %}
</div>


 [1]: http://xkcd.com/256/
 [2]: http://www.facebook.com/home.php#/friends/
 [3]: http://twitter.com/following
 [4]: http://foursquare.com/manage_friends
 [5]: http://www.flickr.com/photos/friends/
 [6]: http://www.google.com/contacts
 [7]: http://www.linkedin.com/connections?trk=hb_side_cnts%20is
 [8]: https://github.com/