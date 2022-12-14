<header id="banner"
  class="banner text-dark dark:text-light fixed z-30 flex w-full justify-between bg-gradient-to-b from-white to-transparent pt-6 pb-10 transition-all duration-500">

  <a class="brand text-md relative ml-9 flex uppercase" href="{{ home_url('/') }}">
    <span class="mr-2 align-middle">No</span>
    @if ($emoji['emoji_or_image'])
      <span class="align-middle text-xl">{{ $emoji['header_emoji'] }}</span>
    @else
      <img src="{{ $emoji['header_image']['url'] }}" alt="{{ $emoji['header_image']['alt'] }}" class="h-6 w-auto">
    @endif
    <span class="ml-2 align-middle">Is An Island</span>
  </a>

</header>

@include('partials.navigation')

<div id="tagline"
  class="text-dark dark:text-light fixed top-6 z-40 hidden font-serif font-bold transition-all duration-500 md:block">
  {{ get_bloginfo('description') }}
</div>

<button id="btnDot" class="bg-light fixed top-7 z-40 h-4 w-4 rounded-full mix-blend-exclusion"></button>

<svg id="cursor" class="pointer-events-none fixed z-50 mix-blend-exclusion" width="40" height="40"
  viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" style="top: 0px; left: 0px; display: none">
  <circle cx="20" cy="20" r="18" fill="#000" stroke="#fff" />
</svg>
