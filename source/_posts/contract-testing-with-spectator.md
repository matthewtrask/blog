---
extends: _layouts.post
section: content
title: Testing your OpenAPI Contract with Spectator
date: 2021-02-13
description: A nice Laravel test runner that takes your OpenAPI contract and tests it against your actual API.
categories: [laravel, programming]
cover_image: /assets/img/galaxy.jpg
featured: true
---

Near the end of last year, a package was released from [Adam Campbell](https://twitter.com/hotmeteor) that integrated with the Laravel test runner and allowing for a developer to take the OpenAPI spec file (or contract) and run tests against it. Let's first take a look at the API I built. 

### National Parks API

One thing I have found a love for is the American National Parks system. Various areas in the country preserved for their beauty, the landscapes range from lakes to valleys; mountains and forests; volcanos and deserts. It is my goal to visit every single national park in the United States. When I thought about writing this blog post, I figured building a quick API for the National Parks would be fun, and it was. While it's not deployed yet, the code is viewable [here](https://github.com/matthewtrask/national-parks-api). Right now there are two operations supported: `GET /api/national-parks` and `GET /api/national-parks/{uuid}`. As of now, it is just the designated National Parks, but considering the United States has national forests, national military parks, historic places and more, the API will more than likely expand to support those as well as `POST, PUT, and DELETE` operations.

A sample response (limited to 5 objects for brevity):

```json
  "data": [
    {
      "parkUuid": "0b6124e0-53ae-46f2-8a12-d5d6bafd51d0",
      "name": "Acadia",
      "yearEstablished": 1916,
      "state": "Maine",
      "lastUpdated": "2021-02-13T17:20:25.000000Z"
    },
    {
      "parkUuid": "b4670075-c753-4abb-9e01-655bd62deacd",
      "name": "American Somoa",
      "yearEstablished": 1988,
      "state": "American Somoa",
      "lastUpdated": "2021-02-13T17:20:25.000000Z"
    },
    {
      "parkUuid": "428cc8cd-b118-4ff9-9ba2-31892d9be9f5",
      "name": "Arches",
      "yearEstablished": 1929,
      "state": "Utah",
      "lastUpdated": "2021-02-13T17:20:25.000000Z"
    },
    {
      "parkUuid": "7aa48240-06f8-4d8a-a596-aa087afae234",
      "name": "Badlands",
      "yearEstablished": 1939,
      "state": "South Dakota",
      "lastUpdated": "2021-02-13T17:20:25.000000Z"
    },
    {
      "parkUuid": "5a14dcb1-6bb7-4ef1-99be-0a75092200b7",
      "name": "Big Bend",
      "yearEstablished": 1944,
      "state": "Texas",
      "lastUpdated": "2021-02-13T17:20:25.000000Z"
    }
  ],
  "links": {
    "first": "http:\/\/localhost\/api\/national-parks?page=1",
    "last": "http:\/\/localhost\/api\/national-parks?page=13",
    "prev": null,
    "next": "http:\/\/localhost\/api\/national-parks?page=2"
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 13,
    "links": [
      {
        "url": null,
        "label": "&laquo; Previous",
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=1",
        "label": 1,
        "active": true
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=2",
        "label": 2,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=3",
        "label": 3,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=4",
        "label": 4,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=5",
        "label": 5,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=6",
        "label": 6,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=7",
        "label": 7,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=8",
        "label": 8,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=9",
        "label": 9,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=10",
        "label": 10,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=11",
        "label": 11,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=12",
        "label": 12,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=13",
        "label": 13,
        "active": false
      },
      {
        "url": "http:\/\/localhost\/api\/national-parks?page=2",
        "label": "Next &raquo;",
        "active": false
      }
    ],
    "path": "http:\/\/localhost\/api\/national-parks",
    "per_page": "5",
    "to": 5,
    "total": 63
  }
}
```

Along with this, I have created an OpenAPI Contract as well. While I won't dive deep into OpenAPI this time, the big takeaway to know is that the OpenAPI document is a contract created that you the API developer agree to support. Documenting your responses and abiding by the contract you've laid out is a fantastic way to develop trust with your API consumers.

A sample of the contract:

<img src="/assets/img/openapi-contract.png" alt="image of an openapi contract for the national parks api being demoed in this blog post">

In the contract I am promising a few things: 

* The response data object will always follow the example in the image with an array of objects under a `data` key, HATEOAS links under a `links` object, and meta data about pagination under a `meta` object.
* supported query params for the following: state, year, and count. This allows the API to be filtered by state, parks established by a certain year, and or by a specified amount.

### Using Spectator

Up until now, most developers using Laravel are hopefully familiar with testing their APIs. Laravel provides a rich API to test HTTP actions and Spectator ties in very nicely with those. The best part is that Spectator also allows us to clean up our tests by removing some asserts. In order to use Spectator, you need to first run 

```bash
composer require --dev hotmeteor/spectator && php artisan vendor:publish --provider="Spectator\SpectatorServiceProvider"
```

which will publish the config. Looking in your config file for Spectator, you have a few options:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Spec Source
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default spec source that should be used
    | by the framework.
    |
    */

    'default' => env('SPEC_SOURCE', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Sources
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many sources as you wish, and you
    | may even configure multiple source of the same type. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'sources' => [
        'local' => [
            'source' => 'local',
            'base_path' => env('SPEC_PATH'),
        ],

        'remote' => [
            'source' => 'remote',
            'base_path' => env('SPEC_PATH'),
            'params' => env('SPUR_URL_PARAMS', ''),
        ],

        'github' => [
            'source' => 'github',
            'base_path' => env('SPEC_PATH'),
            'repo' => env('SPEC_GITHUB_REPO'),
            'token' => env('SPEC_GITHUB_TOKEN'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    | Configure path defaults, like prefixes.
    |
    */

    'path_prefix' => '',
];
```

Nothing out of the ordinary, and for this example I am using the `local` option. At work, we use the `remote` option with our Github Actions which works really well too.

After all of this has been configured, and it takes minutes or so, we can start developing and testing.

First, lets take a look at a test _before_ we use Spectator. 

```php
    public function testCanGetParksWithoutSpectator(): void
    {
        $res = $this->json(
            'GET',
            '/api/national-parks'
        );

        $res->assertOk()
            ->assertJson([
                'data' => true,
                'meta' => true,
                'links' => true,
            ])
            ->assertHeader('ETag')
            ->assertJsonCount(15, 'data')
            ->assertJsonCount(4, 'links')
            ->assertJsonCount(8, 'meta');
    }
```

In the example above, we are asserting many things, all of which we promise in our contract. What does this test look like with Spectator though?

```php
    use Spectator\Spectator;

    public function testCanGetParks(): void
    {
        Spectator::using('openapi.yml');

        $res = $this->json(
            'GET',
            '/api/national-parks'
        );

        $res->assertValidRequest()
            ->assertValidResponse(200);
    }
```

The API for Spectator is clean, and removes a lot of the assertions I was preforming before hand. Why can I do this? Because the two methods Spectator provides, 
`assertValidRequest()` and `assertValidResponse()` handle it all for us. Under the hood, Spectator takes the spec file we have told it to use with the `Spectator::using('openapi.yml');`
accessor and runs a check on both the request and response. Now, for this request I dont have a body or headers I am checking for, but the response has a body I have agreed to with the contract. Had I created a `POST` action, the request validation assertion would have been incredibly useful to make sure my request body matches what the contract states it should be. You aren't limited to just these two assertions either, you have the full suite of Laravel HTTP JSON assertions and more at the ready. However because I completed the contract with both models of the parks object and meta object, Spectator will use those to compare the response from the API to what I say it should be. 

Spectator is another tool in the API developers tool box, and a powerful one at that. It has helped us uncover bugs in our SOA project at work, and freed up time we would normally spend testing so we can move on to working on other problems. You can find the repo [here](https://github.com/hotmeteor/spectator) where Adam does a wonderful job managing the issues and pull requests. 

If you are looking to start a new API with Laravel adding Spectator, the <a href="/blog/openapi-initializer/">Primitive/OpenAPI-Initializer</a> package to scaffold your contract, and [Stoplight's Studio and Spectral](https://stoplight.io) for desiging and linting your contract; to your project will help you develop faster and with more confidence that your API will respond the correct way. 

Cheers!