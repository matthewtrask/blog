---
extends: _layouts.post
section: content
title: The New PhpVersions
date: 2019-02-19
description: After nursing the project for over a year, I stopped being lazy and rewrote the damn thing.
categories: [new year, new me]
cover_image: /assets/img/selfie.jpg
featured: true
---

About 2 ish years or so ago, I got access to the [PhpVersions.info](http://phpversions.info) project started by my good friend
[Phil Sturgeon](https://twitter.com/philsturgeon). There was always an open issue for a rewrite of the project. The reason being that the project was started in Jekyll to take advantage of Github's free hosting. That worked _great_ for a few years, but it became obvious we should use PHP since the whole project was about getting people on to the latest and greatest PHP version. 

I started to examine options out there, and there are some great options out there. Ultimately, I chose Laravel with Vue.Js, mainly because at the time that was the stack I was working full time in and knew I could get going with it fairly quickly. Say what you will about Laravel, and there is plenty to be said, one thing Laravel does great is "Rapid Application Development", in which you can get up and running in no time. It's pretty fantastic. Now, if you can at least plan for a little bit in the future,you can also future proof your application from growing stale with a framework. With that, I set out to write the project. 

It wasn't til I was sitting at WordCamp Kent when I seriously put in the time to do it. I was speaking at the conference and the talks weren't really relevant to me so I just hung out working on it. I got the bulk down and then it was time to come back to reality. The project was worked on in between organizing a conference, speaking and other things. Finally, [Colin O'Dell](https://twitter.com/colinodell) stepped up to helo manage the v1 instance pull requests so I could dedicate my time to the new stuff. 

### Tech Stack

As I mentioned above, the back end portion of the project is currently powered by Laravel. Will that remain the same as time passes I do not know. I'd like to think I wrote it in a way where we can start to remove the underlaying Laravel code after a while and move to packages. On the other hand, Laravel clearly is not going anywhere. I am not terribly concerned one way or another. The database is just MySQL. Woo. One of these days I need to get back to Postgres. 

The front end is powered by Vue.js, a reactive front end framework started back in 2014. Its comparable to React, but has some really nice differences. I did a talk about Vue.js at Sunshine which was fun. The CSS framework is Tailwind CSS, which I have absolutely enjoyed using, the font is Questrial and the icon font is Zondicons.

It all runs on a Digital Ocean droplet with PHP 7.3 installed, and I absolutely plan on moving to 7.4 as soon as it is avaiable. 

If you have questions, ideas or want to contribute check out the [repository](https://github.com/phpversions/phpversions.info).

Cheers!