<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="ml-6 text-grey-darker hover:text-teal-dark {{ $page->isActive('/blog') ? 'active text-teal-dark' : '' }}">
        Blog
    </a>

    <a title="{{ $page->siteName }} About" href="/about"
        class="ml-6 text-grey-darker hover:text-teal-dark {{ $page->isActive('/about') ? 'active text-teal-dark' : '' }}">
        About
    </a>

    <a title="{{ $page->siteName }} Contact" href="/contact"
        class="ml-6 text-grey-darker hover:text-teal-dark {{ $page->isActive('/contact') ? 'active text-teal-dark' : '' }}">
        Contact
    </a>
</nav>
