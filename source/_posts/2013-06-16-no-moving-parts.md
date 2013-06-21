---
layout: post
featured: true
title: "No Moving Parts"
permalink: /2013/06/16/no-moving-parts/
categories:
  - admin
excerpt: "A blog redesign and migration from WordPress on DreamHost to Jekyll on S3."
show_excerpt: true
---
It's difficult to describe the serenity of having a website that consists only of static files.

Imagine that going to a specific web page is like purchasing a new car with lots of custom options. A customer's order gets sent to a factory, and that order gets processed alongside many other orders, each of which must travel down an assembly line:

[!["a car assembly line"](/images/2013/06/KUKA_Industrial_Robots_IR.jpg)](http://commons.wikimedia.org/wiki/File:KUKA_Industrial_Robots_IR.jpg)

Assembling web pages isn't *quite* so complicated, but there are still many moving parts: PHP scripts, MySQL tables, password-protected admin interfaces, caching plugins, and so on. Previously, I was assembling my web pages with [WordPress][1] on [DreamHost][2]'s shared hosting infrastructure[^1]. While this is a reliable process, it's often slow, especially when you share the factory/server with other manufacturers/bloggers who may be receiving a lot of requests for cars/web pages.

Fortunately for bloggers, it's much easier to make an identical copy of a web page than an identical copy of a car. Alternatives to publishing platforms like WordPress include static site generators that will assemble every possible web page in advance of any requests. Web pages usually consist of small files, so it's easier and cheaper to store them all than it would be to store every possible car.

Whenever I make a change to my blog, I use a static site generator called [Jekyll][3] to assemble various files on my computer into another set of files which I upload to [Amazon's Simple Storage Service (S3)][4]. While my DreamHost site was assembled by a single server in a single data center, these files on S3 have automatic redundant storage and are designed to remain accessible even if there are hardware failures.

When a visitor's browser asks for a web page, the request goes to [Amazon CloudFront][5], which keeps cached copies of the S3 files in different data centers all around the world, just as a manufacturer might keep finished cars in geographically distributed warehouses. CloudFront chooses the copy nearest to the visitor, and sends the web page back. There's no work required because the web pages are pre-assembled, so the whole process usually happens in *much* less than a second.  

While I was doing this migration, I took the opportunity to redesign the site itself. I had been using a slightly-customized version of [a common WordPress theme][6], but wanted a cleaner layout that focused attention on the posts and projects that were most important. I based the new design on the [Octopress Minimalist theme][7] by [Ryan Deussing][8], but made many changes to the metadata, layouts, fonts, and colors. I hope the new design makes reading and browsing easy, but feedback, and [pull requests][9], are always appreciated!

[^1]: I considered moving to a Virtual Private Server, but DreamHost has [somewhat-regular data center issues](http://status.dreamhost.com/) that [have arisen at inconvenient times before]( http://lehrblogger.com/2009/01/15/dreamhost-downtime/), so I wanted a better solution.

 [1]: http://wordpress.org/
 [2]: http://dreamhost.com/
 [3]: http://jekyllrb.com/
 [4]: http://aws.amazon.com/s3/
 [5]: http://aws.amazon.com/cloudfront/
 [6]: http://wordpress.org/themes/barthelme
 [7]: https://github.com/ryandeussing/octopress-minimalist
 [8]: http://ryandeussing.com/
 [9]: https://github.com/lehrblogger/lehrblogger.com
