@include('partials.navigation')

<header id="banner"
  class="banner text-dark dark:text-light fixed top-0 left-0 z-50 flex w-full justify-between bg-gradient-to-b from-white to-transparent pt-6 pb-10 transition-all duration-500">

  <a class="brand text-md relative ml-6 flex uppercase md:ml-8" href="{{ home_url('/') }}">
    <span class="mr-2 align-middle">No</span>
    @if ($emoji['emoji_or_image'])
      <span class="align-middle text-xl">{{ $emoji['header_emoji'] }}</span>
    @else
      <img src="{{ $emoji['header_image']['url'] }}" alt="{{ $emoji['header_image']['alt'] }}" class="h-6 w-auto">
    @endif
    <span class="ml-2 align-middle">Is An Island</span>
  </a>

  <div id="tagline"
    class="text-dark dark:text-light fixed top-6 z-40 hidden font-serif font-bold leading-5 transition-all duration-500 md:block">
    {!! $tagline !!}
  </div>

  <div id="lang-menu"
    class="text-light fixed top-6 z-40 hidden font-serif font-bold leading-5 transition-all duration-500">
    @php
      $args = [
          'native' => 1,
          'link_current' => 0,
          'translated' => 0,
      ];
      
      do_action('wpml_language_switcher', $args);
    @endphp
  </div>
</header>

<button id="btnDot" class="bg-light fixed top-7 z-50 h-4 w-4 rounded-full mix-blend-exclusion"></button>

<svg id="cursor" class="pointer-events-none fixed z-50 mix-blend-exclusion" width="40" height="40"
  viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" style="top: 0px; left: 0px; display: none">
  <circle cx="20" cy="20" r="18" fill="#000" stroke="#fff" />
</svg>
