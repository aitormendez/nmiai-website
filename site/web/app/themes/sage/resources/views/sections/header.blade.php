<header class="banner flex justify-between py-3 text-dark">
    <a class="brand mx-3" href="{{ home_url('/') }}">
        <span>No </span><span>{{ $emoji['header_emoji'] }}</span><span> Is An Island</span>
    </a>

    @include('partials.navigation')

    <div class="tagline hidden md:block mr-10 font-serif font-bold">{{ get_bloginfo('description') }}</div>

    <button id="btnDot" class="w-4 h-4 bg-dark rounded-full fixed right-4 top-4">
    </button>
</header>
