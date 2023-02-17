@if ($navigation)
  <div id="main-menu"
    class="my-menu bg-dark text-light fixed left-0 top-0 z-40 flex h-screen w-screen items-center justify-center text-6xl md:text-7xl lg:text-8xl xl:text-9xl"
    style="clip-path: circle(0px at calc(100vw - 3.75rem) 2.25rem); ">

    <ul>
      @foreach ($navigation as $item)
        <li
          class="my-menu-item {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }} my-8 overflow-hidden text-center md:leading-[0.7em]">
          <a href="{{ $item->url }}" class="text-center font-bold uppercase text-white">
            {!! $item->label !!}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
@endif
