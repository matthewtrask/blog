---
extends: _layouts.post
section: content
title: Thoughts on what to return when you make a POST request?
date: 2020-04-26
description: Tons of stack overflow posts give varying advice so this is what I do when I make a POST Request in an application.
categories: [coding, http]
cover_image: /assets/img/indian-elephants.jpg
featured: false
---

As one of the HTTP Verbs, a lot as been written around the POST action and what should be done. One thing that doesn't seem clear though is what should you return. The [RFC](https://tools.ietf.org/html/rfc7231#page-25) from Dr. Fielding covers what they thought was ideal back in 2014 which is this:

> If one or more resources has been created on the origin server as a
   result of successfully processing a POST request, the origin server
   SHOULD send a 201 (Created) response containing a Location header
   field that provides an identifier for the primary resource created
   (Section 7.1.2) and a representation that describes the status of the
   request while referring to the new resource(s)


How would you do this? Something like this (example is Laravel but can easily have the classes changes for Symfony, Laminas or Zend): 

```
<?php 

declare(strict_types=1);

use App\User;
use App\Services\UserService;
use Controller;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    private Response $response;

    private UserServoce $serivce;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    // ...

    public function create(CreateUserRequest $request) : Response
    {
        // pass data to a service to create a user
        $user = $this->service->createUser($user);

        return $this->response
            ->withHeaders(['Location', sprintf('/api/users/%', $user->id)])
            ->setStatusCode(201);
    }
}
```

In the example, we get a user back from the CreateUserService class where in it we may have done things like set flags on the user for permissions and roles, sent emails alerting the user and others of their account, and maybe set a temp password for them to login. 

The real question is what is the benefit of doing the above versus taking the user we get back, shoving it in to the response and moving on? Well, from my understanding, this is to take advantage of what REST aims for: discoverability. Why send the entire user back if there is potential we won't need it/want it? Instead we can tell the client "Hey good news! The user was created. We are going to assume you don't need to do anything with it now, so if you look at the headers, you can find the location of the newly created resource. Otherwise, keep doing a great job!". While a user record _may_ not be overly heavy, if you are creating multiple users for a system, think HR inviting users to a new benefits platform for instance, we can work faster if we dont need to keep returning the user record _every single time_. The last bit is the status code, which above is set to 201. 201 means "Created" which is the purpose of POST. We shouldn't POST to get data, edit data, or to delete data. 

Conversely, there may be times that we want to return the data on top of the Location header. The RFC does say `should`, which is meant to be read as "please do this, but its flexible and we won't get mad if you return the content created by the request". What would be an exmaple of a time you are wanting to return the content? Perhaps one example would be if you have multiple steps that depend on each other and you don't want to make a request every time. Think a shopping cart: you create the user if they dont exist and then we need to confirm their shipping and billing addresses. Now we create the user, and send back the address information so that way the user can quickly confirm it, which now streamlines the process slightly and eliminates a request. There absolutely are other use cases as well, so don't think the RFC is rigid, or we need to follow it 100% of the time. However it is good to try and follow the RFC/Standard as best as we can, to get the most of out REST.

Hopefully this gives you some ideas for writing your APIs going forward and guide you through some fun challenges!