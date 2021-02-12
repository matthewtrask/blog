---
extends: _layouts.post
section: content
title: OpenAPI Initializer
date: 2021-02-13
description: If you are starting a new project, or want to start using OpenAPI, this package will help you out.
categories: [laravel, programming]
cover_image: /assets/img/sunset.jpg
featured: true
---

Back in November, as I was bootstrapping another service for a massive project at work, I had an idea to write a quick command that would quickly scaffold an OpenAPI YAML file. I started tinkering with it little by little and decided that it would serve a greater purpose as a stand alone package and help bootstrap my companies FOSS efforts. It turned into the OpenAPI Initializer, which is available now as a package for Laravel projects. 

### What is OpenAPI?

If you've hung around me long enough you will know I am a big proponent of OpenAPI. Formerly known as Swagger, it is an initiative for designing and consuming REST APIs, by both humans and machines. OpenAPI is a one stop shop for documentation, validation, and more. To see a list of libraries built around OpenAPI, check out [OpenAPI.tools](https://openapi.tools)

### OpenAPI Initializer

To install this package you can either add it to the composer.json file or run the command:

```php
composer require --dev primitive/openapi-initializer
```

This package is compatible with Laravel versions 6.x, 7.x and 8.x. As soon as 9.x is generally avaialble, we will be fully compatible. 

To run the command:

```php
php artisan openapi:create
```

and the command will walk you through every step of the way. We tried to be as thoughtful as possible. We even give you the option to install [Spectral](https://github.com/stoplightio/spectral) which is a JS library that allows you to lint your OpenAPI document.

Here is all of the questions the package asks you as you scaffold up your OpenAPI document:

<img src="/assets/img/openapi-initializer-output.png" alt="An image of a terminal showing the output from running the Laravel command php artisan openapi:create">

We offer minimal defaults for OpenAPI version (which will be bumped once 3.1.0 is available) and what version your project is starting at. The last thing you may notice is that I recommend Stoplight's tooling. While I am not sponsored by them, I can whole heartedly recommend them. 

To check out the package, the repo is [here](https://github.com/primitivesocial/openapi-initializer). Please open an issue if you have an idea you'd like us to consider, or if you run into an issue with the command. 

Enjoy!