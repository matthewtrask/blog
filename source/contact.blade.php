@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="Contact {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Get in touch with {{ $page->siteName }}" />
@endpush

@section('body')
<h1>Contact</h1>

<p class="mb-8">
    If you have a comment or question about something I wrote, feel free to send me a message.
</p>

<form action="https://formspree.io/mjftrask@gmail.com" method="POST" class="mb-12">
    <div class="flex flex-wrap mb-6 -mx-3">
        <div class="w-full md:w-1/2 mb-6 md:mb-0 px-3">
            <label class="block mb-2 text-grey-darkest text-sm font-semibold" for="contact-name">
                Name
            </label>

            <input
                type="text"
                id="contact-name"
                placeholder="Jane Doe"
                name="name"
                class="block w-full border shadow rounded-lg outline-none mb-2 p-4"
                required
            >
        </div>

        <div class="w-full px-3 md:w-1/2">
            <label class="block text-grey-darkest text-sm font-semibold mb-2" for="contact-email">
                Email Address
            </label>

            <input
                type="email"
                id="contact-email"
                placeholder="email@domain.com"
                name="email"
                class="block w-full border shadow rounded-lg outline-none mb-2 p-4"
                required
            >
        </div>
    </div>

    <div class="w-full mb-12">
        <label class="block text-grey-darkest text-sm font-semibold mb-2" for="contact-message">
            Message
        </label>

        <textarea
            id="contact-message"
            rows="4"
            name="message"
            class="block w-full border shadow rounded-lg outline-none appearance-none mb-2 px-4 py-6"
            placeholder="A lovely message here."
            required
        ></textarea>
    </div>

    <div class="flex justify-end w-full">
        <input
            type="submit"
            value="Submit"
            class="block bg-blue hover:bg-blue-dark text-white text-sm font-semibold tracking-wide uppercase shadow rounded-lg cursor-pointer px-6 py-3"
        >
    </div>
</form>
@stop
