<header class="banner">
    <a class="brand" href="{{ home_url('/') }}">
        <span>No </span><span>{{ $emoji['header_emoji'] }}</span><span> Is An Island</span>
    </a>

    @include('partials.navigation')

    <div class="tagline">{{ get_bloginfo('description') }}</div>

    <button id="btnDot" class="w-4 h-4 bg-black rounded-full fixed right-4 top-4">
    </button>
</header>
