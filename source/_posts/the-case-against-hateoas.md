---
extends: _layouts.post
section: content
title: The Case Against HATEOAS
date: 2019-02-14
description: I want to make the case against HATEOAS. But not in the way you think I'm going to try and do it.
categories: [rest, hypermedia, api design]
cover_image: /assets/img/camera.jpg
featured: true
---

One thing I love about API Design is talking about HATEOAS. HATEOAS is magical, and generally considered the hardest part of API Design. I wonder why that could be though? Could it be that dynamically creating a link to a resource is that hard? No, I don't think so. Could it be that Hypermedia isn't taught? Perhaps. More importantly: HATEOAS is a daunting term. Breaking it down HATEOAS becomes "Hypermedia As The Engine Of Application State". Let's let that sink in just a bit. 

I am going to suggest something here: let's stop using HATEOAS and instead just use ```links``` or ```hypermedia```. Breaking this whole thing
down to the simpliest term will help developers down the road.

I remember a year ago I went to the Nashville Software School to talk about what it's like to be a developer in the wild. 
I did a free form AMA and one question was, and I paraphrase, "how do you remember all the acronyms that are associated to development?". I paused for a bit
and gave some answer along the lines of "you just kind of remember them as you go". As I look back, that answer is garbage. It is in a similar vein
of playing guitar where you eventually remember the different chord positions. What is different though is that you wont always use the
acronyms in daily use. HATEOAS is absolutely one of them. The worst part is that HATEOAS is not at all part of everyone's job like DI, CI, HTTP and others.

At it's core, what exactly is HATEOAS? Well, to understand HATEOAS, you need to understand REST. REST, or Representational State Transfer is the idea of stateless
data transfer either between a machine and human or machine to machine. By design, your REST API should remain stateless, and not remember what the previous request was. 
This poses a problem though: if our API doesn't remember the last request made, how can we tell a user what other endpoints they may be interested in? This is where hypermedia, or links, come into play. 
A great example of this is the Foxy.io API, borrowed from [here](https://api.foxycart.com/docs):

```json
{
    "_links": {
        ...
        "fx:customers": {
            "href": "https://api.foxycart.com/stores/41000/customers",
            "title": "Customers for This Store"
        },
        "fx:transactions": {
            "href": "https://api.foxycart.com/stores/41000/transactions",
            "title": "Transactions for This Store"
        },
        "fx:subscriptions": {
            "href": "https://api.foxycart.com/stores/41000/subscriptions",
            "title": "Subscriptions for This Store"
        },
        ...
    },
    ...
}
```

What we get here is part of the response payload, where the Foxy.io developers point out that while you are looking at the current data, here are some links of interest that you may want to utilize. Looking at what is available, the main response is for some sort of store endpoint, and now we can see that we may be interested in the store's customers, transactions or subscriptions as well. This is HATEOAS. If we 
request the ```/store``` endpoint again, the same links will be present, but the service we requested data from will not remember what we did. This is ideal. 

### The Case Against HATEOAS

Now, after reading all of that, you are probably thinking "ya that makes sense", which is great. However now Im going to make it a point to stop using HATEOAS. Why? Because people dont know it off hand like
CI, DI, HTTP, and other things. Instead, lets just call it `links` or `hypermedia`, and remove a barrier to learning something that we consider crucial to API Design. 

If we can make it easier for one person, we make APIs better for a lot of people.



