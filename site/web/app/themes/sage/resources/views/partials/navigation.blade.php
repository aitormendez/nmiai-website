@if ($navigation)
    <ul id="main-menu" class="my-menu fixed w-screen h-screen top-0 bg-dark text-white"
        style="clip-path: circle(0.5rem at calc(100% - 1.5rem) 1.5rem);">
        @foreach ($navigation as $item)
            <li class="my-menu-item {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                <a href="{{ $item->url }}" class="text-white">
                    {{ $item->label }}
                </a>

                @if ($item->children)
                    <ul class="my-child-menu">
                        @foreach ($item->children as $child)
                            <li class="my-child-item {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }}">
                                <a href="{{ $child->url }}" class="text-white">
                                    {{ $child->label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
@endif
