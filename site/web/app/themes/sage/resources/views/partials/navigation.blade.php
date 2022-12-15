@if ($navigation)
  <ul id="main-menu"
    class="my-menu bg-dark fixed top-0 z-40 h-screen w-screen pt-24 text-6xl text-white md:text-7xl lg:text-8xl xl:text-9xl"
    style="clip-path: circle(0px at calc(100vw - 3.75rem) 2.25rem); ">

    @foreach ($navigation as $item)
      <li class="my-menu-item {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
        <a href="{{ $item->url }}" class="block text-center font-bold uppercase text-white">
          {!! $item->label !!}
        </a>
      </li>
    @endforeach
  </ul>
@endif
