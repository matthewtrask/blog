@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="Photography {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Photography {{ $page->siteName }}" />
@endpush

@section('body')
<h1 class="text-teal-dark">Photography</h1>

<p class="mb-8">
    One of my new found passions is photography. I will use this place to display images I take from my travels and adventures.
</p>

<h4 class="text-teal-dark">Featured Photo</h4>
<p>Clicking the photo will take you to my Flickr account</p>
<a data-flickr-embed="true"  href="https://www.flickr.com/photos/164111164@N05/33327154278/in/dateposted-public/" title="Gates of Nashville"><img src="https://farm8.staticflickr.com/7904/33327154278_d054315dfe_b.jpg" width="1024" height="683" alt="Gates of Nashville"></a><script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>
<br>
<h4 class="text-teal-dark">Gear</h4>
<p class="mb-4">Cameras</p>
<ul>
    <li>Canon 77D</li>
    <li>Canon 20D</li>
</ul>
<p class="mb-4">Lens</p>
<ul>
    <li>18x135mm f/3.5-5.6</li>
    <li>18x55mm f/3.5-5.6</li>
    <li>70x300mm f/4-5.6</li>
    <li>10x18mm f/4.5-5.6</li>
    <li>85mm f/1.8</li>
    <li>50mm f/1.8</li>
    <li>35mm f/2</li>
    <li>24mm f/2.8</li>
    <li>8mm Wide Angle</li>
</ul>


@stop