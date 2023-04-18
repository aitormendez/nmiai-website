@include('partials.navigation')

<header id="banner"
  class="banner text-dark dark:text-light fixed top-0 left-0 z-50 flex w-full justify-between bg-gradient-to-b from-white to-transparent pt-6 pb-10 transition-all duration-500">

  @if ($array_emoji['header_type'] === 'fixed')
    <a class="brand text-md relative ml-6 flex uppercase md:ml-8" href="{{ home_url('/') }}">
      <span class="mr-2 align-middle">No</span>
      @if ($array_emoji['emoji']['emoji_or_image'])
        <span class="align-middle text-xl">{{ $array_emoji['emoji']['header_emoji'] }}</span>
      @else
        <img src="{{ $array_emoji['emoji']['header_image']['url'] }}"
          alt="{{ $array_emoji['emoji']['header_image']['alt'] }}" class="h-6 w-auto">
      @endif
      <span class="ml-2 align-middle">Is An Island</span>
    </a>
  @elseif($array_emoji['header_type'] === 'random_list')
    <a class="brand text-md relative ml-6 flex uppercase md:ml-8" href="{{ home_url('/') }}">
      <span class="mr-2 align-middle">No</span>
      @if ($_SESSION['emoji_or_image'])
        <span class="align-middle text-xl">{{ $array_emoji['emoji']['header_emoji'] }}</span>
      @else
        <img src="{{ $array_emoji['emoji']['header_image']['url'] }}"
          alt="{{ $array_emoji['emoji']['header_image']['alt'] }}" class="h-6 w-auto">
      @endif
      <span class="ml-2 align-middle">Is An Island</span>
    </a>
  @elseif($array_emoji['header_type'] === 'slot_machine')
    <a class="brand text-md relative ml-6 flex uppercase md:ml-8" href="{{ home_url('/') }}">
      <span class="mr-2 align-middle">No</span>
      <div id="slot-machine" class="relative -top-1 h-6 w-8 overflow-hidden">
        <div id="slot-machine-content" class="absolute flex flex-col items-center text-2xl">
          @foreach ($array_emoji['element_emojis'] as $emo)
            <div class="h-8">{!! $emo !!}</div>
          @endforeach
          @foreach ($array_emoji['element_emojis'] as $emo)
            <div class="h-8">{!! $emo !!}</div>
          @endforeach
        </div>
      </div>
      <span class="ml-2 align-middle">Is An Island</span>
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

<svg id="cursor" class="pointer-events-none fixed z-50 mix-blend-exclusion" width="40" height="40"
  viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" style="top: 0px; left: 0px; display: none">
  <circle cx="20" cy="20" r="18" fill="#000" stroke="#fff" />
</svg>
