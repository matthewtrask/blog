@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}" />
@endpush

@section('body')
    <h1 class="text-teal-dark">About Me</h1>
    <p>I'm a software developer, photographer, cyclist, and currently fascinated by investing and personal finance. Also I'm short.</p>

    <img src="/assets/img/matthew-trask.png"
         alt="About image"
         class="shadow-md flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">

    <h3 class="text-teal-dark mb-6">Where to find me online</h3>
    <ul>
        <li class="text-grey-darker hover:text-teal-dark"><a class="text-grey-darker hover:text-teal-dark" href="https://twitter.com/matthewtrask">Twitter</a></li>
        <li class="text-grey-darker hover:text-teal-dark"><a class="text-grey-darker hover:text-teal-dark" href="https://www.flickr.com/photos/164111164@N05/">Flickr</a></li>
        <li class="text-grey-darker hover:text-teal-dark"><a class="text-grey-darker hover:text-teal-dark" href="https://github.com/matthewtrask">Github</a></li>
        <li class="text-grey-darker hover:text-teal-dark"><a class="text-grey-darker hover:text-teal-dark" href="http://phptownhall.com">PHP Townhall</a></li>
    </ul>

    <h3 class="mb-6 text-teal-dark">Work</h3>
    <p class="mb-6">
        <b>Current Team</b>: <br>MoreCommerce - Senior Software Engineer
    </p>
    <p class="mb-6">
        <b>Past Teams</b>: <br>Bernard Health - Mid Level Developer <br> Tandum - Developer <br>Insight Global - Developer
    </p>

    <h3 class="mb-6 text-teal-dark">
        Programming Interests
    </h3>
    <ul class="mb-6">
        <li><a class="text-grey-darker hover:text-teal-dark" href="https://openapis.org">OpenAPI</a></li>
        <li><a class="text-grey-darker hover:text-teal-dark" href="https://en.wikipedia.org/wiki/Representational_state_transfer">REST</a></li>
        <li><a class="text-grey-darker hover:text-teal-dark" href="https://osmihelp.org">OSMI</a></li>
    </ul>

    <h3 class="mb-6 text-teal-dark">Community</h3>
    <p class="mb-6">
        I help out wherever I can. I am currently a maintainer of <a class="text-grey-darker hover:text-teal-dark" href="http://phpversions.info">phpversions.info</a>, as well as <a class="text-grey-darker hover:text-teal-dark" href="https://openapi.tools">openapi.tools</a>
    </p>
    <p class="mb-6">
        Outside of those projects, I am a conference speaker and soon to be conference keynote. You can find me at the following conferences in 2019:
    </p>
    <ul class="mb-6">
        <li class="text-grey-darker hover:text-teal-dark"><a class="text-grey-darker hover:text-teal-dark" href="https://2019.midwestphp.org/register">Midwest PHP - Minneapolis MN (MSP) - Mental Health and You (Keynote) | Building to spec - the OpenAPI Spec and PHP (Session)</a></li>
        <li class="text-grey-darker hover:text-teal-dark"><a class="text-grey-darker hover:text-teal-dark" href="https://longhornphp.com">Longhorn PHP - Austin TX (AUS) - Mental Health and You (Session)</a></li>
    </ul>

    <p class="mb-6">
        I also help run Nash APIs as well as formerly helped run Atlanta PHP and Nashville PHP. Maybe I will come back to doing that. Once upon a time I ran Southeast PHP with the help of some great friends as well.
        If you ever want advice on how to run a user group or conference, you can always reach out and I will do my best to guide you.
    </p>

    <h3 class="mb-6 text-teal-dark"">Non Programming Interests</h3>
    <p class="mb-6">Some of my non programming interests are below. I know this is my programming/tech blog but these topics will slip in as well, until I feel I have enough content to justify another blog for it.</p>
    <ul class="mb-6">
        <li>Cycling</li>
        <li>Photography</li>
        <li>Personal Finance &amp; Financial Independence</li>
        <li>Aviation</li>
        <li>Star Wars</li>
        <li>Walt Disney World</li>
        <li>Blues and Jazz music</li>
    </ul>
@endsection
