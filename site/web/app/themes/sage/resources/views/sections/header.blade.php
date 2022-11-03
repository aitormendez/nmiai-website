<header id="banner" class="banner text-dark fixed flex w-full justify-between pt-3 pb-10 transition-colors">

  @include('partials.navigation')

  <a class="brand relative ml-6 text-lg uppercase" href="{{ home_url('/') }}">
    <span class="mr-3 align-middle">No</span><span class="align-middle text-2xl">{{ $emoji['header_emoji'] }}</span><span
      class="ml-3 align-middle">Is An Island</span>
  </a>

  <div id="tagline" class="absolute hidden font-serif font-bold md:block">{{ get_bloginfo('description') }}</div>

  <button id="btnDot" class="bg-dark fixed top-4 h-4 w-4 rounded-full">
  </button>
</header>
