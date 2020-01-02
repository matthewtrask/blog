---
extends: _layouts.post
section: content
title: Software Lessons I learned in 2019
date: 2019-12-29
description: A look back at the lessons I learned in 2019
categories: [software, skills]
cover_image: /assets/img/laptop.jpg
featured: true
---

I looked back on things I did in the last year in my life. Things like amount of books I read, miles I cycled, how many trips to Ikea in Atlanta I took etc. I figured that it would also be good to look back on lessons I learned about software design. 

### Never Let Perfect be the enemy of Shippable

I always thought code had to be a: perfect, b: complicated and c: elegant. I don't know where these ideas came from but they stuck with me for years. Elizabeth Smith tried hard to instill in me the complete opposite: the best code is the code that works, gets the job done, and creates value. 

These days the deploy processes are getting easier and quicker. PRs can be created quickly and your team can get to a point where you can get a PR deployed to production in under an hour. With all that said, the focus should be getting code that creates value out in production first, and then going back to refactor it to a better solution. 

### YAGNI

A good friend of mine, [Jason McCreary](https://twitter.com/jasonmccreary) preaches this and I think it needs to be one of the first things to consider when building a feature. No, Im not saying that you aren't going to need the feature, but rather you probably aren't going to need everything you are planning on doing when creating the feature. 

Lets look at a potential Laravel application. The ways I've been taught over the years are wide and varied. Some people who use Laravel prefer the path of least possible resistance, so their code path may look like: 

```php
request -> router -> controller -> response
```

where in the controller they do all the business logic from querying their models, request validation and anything else they may need to do all in the controller action. The way I prefer looks like:

```php
request -> router -> validation -> controller -> service -> repository -> service -> controller -> response
```

That's a lot of moving parts for what is probably an application that doesn't need half of that. However I put a lot of emphasis on SOLID and Clean Design. But! In the real world (read the job that gives me money), there is a balance of getting code shipped to create value and maintaining code that other developers can understand. Thats where I bring in YAGNI, or "You Aren't Gonna Need It". I don't need a service layer or the repository layer if I want to get the job done quick. However, I can probably pick one of those two layers and break things up to make it a little more clean (in my opinion) and readable for other developers. 

This goes hand in hand with the first point. If you get down in a rabbit hole, stop yourself and ask "Do I need this? Can the feature ship without it?". If the answer is "yes" and "yes", call YAGNI and don't worry about being perfect. 

### HATOEAS is a terrible acronym

I came up with a saying, and a sticker, this year called "HATEOAS and chill". I thought about writing a talk but Im not sure there is enough content. However one conclusion I came to is that `HATEOAS` is a terrible acronym for something that has been over complicated to the point of avoidance. What is HATOEAS? It stands for ```Hypermedia As The Engine Of Application State```. That's a lot to say that your REST API should provide links with your resources for discoverability. Why should your API return links, or hypermedia? It comes from a core concept of REST wherein the API is stateless, so it does not store data about the "session" or request. So to provide information on where the client should go next, the response should have links to give hints as to where to go next. 

Links. Thats all it is. Lets use a users response as an example (this is just plain JSON, not JSON:API or anything like that for the sake of the example): 

```
{
  "_metadata": 
  {
      "page": 5,
      "per_page": 20,
      "page_count": 20,
      "total_count": 521,
      "Links": [
        {"self": "/products?page=5&per_page=20"},
        {"first": "/products?page=0&per_page=20"},
        {"previous": "/products?page=4&per_page=20"},
        {"next": "/products?page=6&per_page=20"},
        {"last": "/products?page=26&per_page=20"},
      ]
  },
  "records": [
    {
      "id": 1,
      "name": "Widget #1",
      "uri": "/products/1"
    },
    {
      "id": 2,
      "name": "Widget #2",
      "uri": "/products/2"
    },
    {
      "id": 3,
      "name": "Widget #3",
      "uri": "/products/3"
    }
  ]
}
```

In the example, we show the client some links it may find interesting such as the current uri, how to get the next set of paginated data, the previous, the first and last. These links may also be used for relational data like pointing to a user's profile in a list of users. 

But the point is that HATEOAS, while it sounds cool, complicates something to the point where people are unsure how to use it. So let's stop saying HATEOAS, and instead say "links" and uncomplicate this concept. All we are doing is returning links, which in of itself is pretty straight forward. 

### You can build scalable things with boring tech

The job I had at the beginning of the year was a massive application built on Symfony, Doctrine, Plain PHP Objects, and jQuery. It worked well and worked pretty fast. Was it the latest and greatest technology? Nope. Did it get the job done? Yes. Was there any kind of fear around upgrading things like the framework, PHP version, or anything else? Nope because this stuff was so boring it was routine to upgrade things. 

You don't need the latest and greatest things to build applications that make money. It's totally cool to use something old and reliable. Why do you think there are so many old Honda Accords on the road? It's not because they are flashy and show off status! It's because they work, any mechanic can work on it, and it will probably survive the a nuclear explosion. 

One thing that resonated with me this year is that software is not a popularity contest. You shouldn't pick a tech stack because it's popular and all the rage, but because it solves the problem you have and gives you confidence that it will be maintainable for years to come. If you think that the most popular framework solves that problem, then have fun. But don't sleep on the older, less cool tools. They are still out there creating value. 

### OpenAPI is gonna change the API Ecosystem

I was introduced to OpenAPI sometime in 2018 and gave a talk at a conference about it. It was eye opening how brilliant a specification around API tooling and documentation is. Judging by the tools on [OpenAPI.tools](https://openapi.tools), people agree with that statement. We merge at least a project a week with people coming up with new ways to building tooling around the specification. If you are building a REST API in 2020, look at OpenAPI before you write a single line of code. The way the spec is laid out, you will save time up front by thinking through what the endpoint, the request, the headers, and the response will look like.

### Developers need financial knowledge

American high schools are shit when it comes to tangiable, actionable skills for later in life. The average person probably never uses anything they learned in Algebra 2, physics or world history. What is rarely taught are things like how to deal with emotions, how to maintain friendships and what to do with your money. Developers generally make a high salary and yet most have no idea what to do with it. Sure you need to cover bills, but what else? Many people I know aren't sure how to do a budget, what a 401k is or why you should care, and how to make sure you will have enough to retire on. 

I dont know a good resource for this but I wish I could figure it out, because its a topic I know I never was taught so I imagine its the same for others. 

What did you learn this year?

Cheers!