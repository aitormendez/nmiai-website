@if ($navigation)
  <ul id="main-menu"
    class="my-menu bg-dark fixed top-0 z-40 h-screen w-screen pt-24 text-6xl text-white md:text-7xl lg:text-8xl xl:text-9xl"
    style="clip-path: circle(0px at calc(100vw - 3.75rem) 2.25rem); ">

    @php
      $args = [
          'native' => 1,
          'link_current' => 0,
          'translated' => 0,
      ];

      do_action('wpml_language_switcher', $args);
    @endphp

    @foreach ($navigation as $item)
      <li
        class="my-menu-item {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }} my-8 overflow-hidden text-center md:leading-[0.7em]">
        <a href="{{ $item->url }}" class="text-center font-bold uppercase text-white">
          {!! $item->label !!}
        </a>
      </li>
    @endforeach
  </ul>
@endif
