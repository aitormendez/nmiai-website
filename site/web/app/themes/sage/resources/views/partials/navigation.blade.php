@if ($navigation)
  <ul id="main-menu" class="my-menu bg-dark fixed top-0 h-screen w-screen pt-24 text-7xl text-white"
    style="clip-path: circle(0 at calc(100vw - 3rem) 1.5rem);">

    @foreach ($navigation as $item)
      <li class="my-menu-item {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
        <a href="{{ $item->url }}" class="block p-4 text-center font-bold uppercase text-white">
          {!! $item->label !!}
        </a>
      </li>
    @endforeach
  </ul>
@endif
