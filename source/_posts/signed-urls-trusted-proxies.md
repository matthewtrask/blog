---
extends: _layouts.post
section: content
title: Using Trusted Proxies with Signed URLs in Laravel
date: 2021-02-13
description: Small issue I ran into that wasn't documented great with signed urls and using somthnig like Ngrok for testing.
categories: [laravel, programming]
cover_image: /assets/img/code.jpg
featured: true
---

I ran across this issue today and it's definitely one of those things that I, and maybe others, will run into again. 

As of Laravel 5.5, there is a middleware in the HTTP stack called TrustProxies.php that allows you to set a list of trusted proxies. The magic of this is that the framework will automagically map the allowed proxies in your list (can either be an array or a string set on the property) to the `X-Forwarded-*` header in the request. Pretty neat stuff!

One thing I just ran into is the app I am currently working on uses the Laravel URL Generator to build a signed url for users registered by an admin to be able to create a password to sign in. I ran into an issue where every attempt at opening the signed url resulted in Laravel throwing a 403. I wasn't totally sure why until I realized the request was being made through [Ngrok](https://ngrok.com) and because the url isn't something Laravel expects, the framework returns a 403. 

The way around this is to use the TrustProxies class and set the `protected $proxies = '*';` so that way as you are testing your signed routes with Ngrok, the framework will not 403 and let you continue on with your work.

*A heads up though!* The `*` value, or better spoken as the Death Star value will let _anything_ get attached to the `X-Forwarded-*` header. So while it is great for testing, make sure you disable it before pushing your code to a staging or prod environment.