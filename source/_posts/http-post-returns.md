---
extends: _layouts.post
section: content
title: Thoughts on what to return when you make a POST request?
date: 2020-04-26
description: Tons of stack overflow posts give varying advice so this is what I do when I make a POST Request in an application.
categories: [coding, http]
cover_image: /assets/img/indian-elephants.jpg
featured: true
---

As one of the HTTP Verbs, a lot as been written around the POST action and what should be done. One thing that doesn't seem clear though is what should you return. The [RFC](https://tools.ietf.org/html/rfc7231#page-25) from Dr. Fielding covers what they thought was ideal back in 2014 which is this:

> If one or more resources has been created on the origin server as a
   result of successfully processing a POST request, the origin server
   SHOULD send a 201 (Created) response containing a Location header
   field that provides an identifier for the primary resource created
   (Section 7.1.2) and a representation that describes the status of the
   request while referring to the new resource(s)


How would you do this in Laravel? Something like this: 

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

         ->withHeaders(['Location', sprintf('/api/users/%', $user->id)])
            ->setStatusCode(201);
    }
}