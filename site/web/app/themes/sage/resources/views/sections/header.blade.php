<header id="banner"
  class="banner text-dark fixed flex w-full justify-between bg-gradient-to-b from-white to-transparent pt-3 pb-10 transition-all duration-500">

  <a class="brand relative ml-6 text-lg uppercase" href="{{ home_url('/') }}">
    <span class="mr-3 align-middle">No</span><span class="align-middle text-2xl">{{ $emoji['header_emoji'] }}</span><span
      class="ml-3 align-middle">Is An Island</span>
  </a>

</header>

@include('partials.navigation')

<div id="tagline" class="text-dark dark:text-light fixed top-3 hidden font-serif font-bold md:block">
  {{ get_bloginfo('description') }}
</div>

<button id="btnDot" class="bg-light fixed top-4 h-4 w-4 rounded-full mix-blend-exclusion"></button>

<svg id="cursor" class="pointer-events-none fixed z-50 mix-blend-exclusion" width="20" height="20"
  viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="10" cy="10" r="10" />

  <style>
    circle {
      fill: #e4e4e4;
      mix-blend-mode: screen;
    }
  </style>
</svg>
