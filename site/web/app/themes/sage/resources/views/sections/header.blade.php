@include('partials.navigation')

<header id="banner"
  class="banner text-dark dark:text-light fixed top-0 left-0 z-50 flex w-full justify-between bg-gradient-to-b from-white to-transparent pt-6 pb-10 transition-all duration-500">

  @if ($array_emoji['header_type'] === 'fixed')
    <a class="brand text-md relative ml-6 flex uppercase md:ml-8" href="{{ home_url('/') }}">
      <span class="mr-2 align-middle">No</span>
      @if ($array_emoji['emoji']['emoji_or_image'])
        <span class="hide-in-menu-open align-middle text-xl">{{ $array_emoji['emoji']['header_emoji'] }}</span>
      @else
        <img src="{{ $array_emoji['emoji']['header_image']['url'] }}"
          alt="{{ $array_emoji['emoji']['header_image']['alt'] }}" class="hide-in-menu-open h-6 w-auto">
      @endif
      <span class="burger-icon hidden align-middle text-xl">🍔</span>
      <span class="ml-2 align-middle">Is An Island</span>
    </a>
  @elseif($array_emoji['header_type'] === 'random_list')
    <a class="brand text-md relative ml-6 flex uppercase md:ml-8" href="{{ home_url('/') }}">
      <span class="mr-2 align-middle">No</span>
      @if ($_SESSION['emoji_or_image'])
        <span class="hide-in-menu-open align-middle text-xl">{{ $array_emoji['emoji']['header_emoji'] }}</span>
      @else
        <img src="{{ $array_emoji['emoji']['header_image']['url'] }}"
          alt="{{ $array_emoji['emoji']['header_image']['alt'] }}" class="hide-in-menu-open h-6 w-auto">
      @endif
      <span class="burger-icon hidden align-middle text-xl">🍔</span>
      <span class="ml-2 align-middle">Is An Island</span>
    </a>
  @elseif($array_emoji['header_type'] === 'slot_machine')
    <a class="brand text-md relative ml-6 flex uppercase md:ml-8" href="{{ home_url('/') }}">
      <span class="align-middle">No</span>
      <div id="slot-machine" class="hide-in-menu-open relative -top-1 flex h-7 w-9 justify-center overflow-hidden">
        <div id="slot-machine-content" class="absolute flex flex-col items-center text-2xl">
          @foreach ($array_emoji['element_emojis'] as $emo)
            <div class="h-8">{!! $emo !!}</div>
          @endforeach
          @foreach ($array_emoji['element_emojis'] as $emo)
            <div class="h-8">{!! $emo !!}</div>
          @endforeach
        </div>
      </div>
      <span class="burger-icon hidden w-9 text-center align-middle text-xl">🍔</span>
      <span class="align-middle">Is An Island</span>
    </a>
  @endif

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

<svg id="cursor" class="pointer-events-none fixed z-[70] mix-blend-exclusion" width="60" height="60"
  viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" style="top: 0px; left: 0px; display: none">
  <circle cx="30" cy="30" r="18" fill="#000" stroke="#fff" />
  <path id="cursor-arrow" class="hidden"
    d="M16.4146 28.0341L-13.3142 28.0341L-4.69438 19.4142L-6.1086 18L-17 28.8914L-6.1086 39.7828L-4.69438 38.3686L-13.0289 30.0341L16.4146 30.0341V28.0341Z M44.9996 29.7487H74.7285L66.1086 38.3686L67.5228 39.7828L78.4142 28.8914L67.5228 18L66.1086 19.4142L74.4431 27.7487H44.9996V29.7487Z"
    fill="black" />
</svg>
