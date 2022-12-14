@if ($navigation)
  <ul id="main-menu"
    class="my-menu bg-dark xl:text-10xl fixed top-0 z-40 h-screen w-screen pt-24 text-7xl text-white md:text-8xl lg:text-9xl"
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
