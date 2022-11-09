@php
  $thumb = $featured_img();
  global $counter;
@endphp
<a role="article" href="{{ get_permalink() }} class="{{ post_class('md:w-1/2 md:odd:pr-2 md:even:pl-2 mb-20') }}"">
  <header>
    @if (array_key_exists('img', $thumb))
      @if ($thumb['img']['mime'] === 'image/gif')
        <img src="{{ $thumb['img']['url'] }}" alt="{{ $thumb['img']['alt'] }}">
      @else
        <img src="{{ $thumb['img']['url'] }}" alt="{{ $thumb['img']['alt'] }}" srcset="{{ $thumb['img']['srcset'] }}"
          sizes="(max-width: 768px) 50vw, 100vw">
      @endif
    @endif

    <div class="my-6 flex flex-wrap items-center justify-between md:justify-start">
      <span class="start-text order-1 mr-4 font-serif md:order-none">{{ substr(str_repeat(0, 2) . $counter, -2) }}</span>
      <div class="progress relative mb-2 flex w-full items-center justify-between md:mr-4 md:mb-0 md:w-52">
        <div class="progress-bar absolute h-0 w-0 border"></div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
          <circle id="Elipse_2596" data-name="Elipse 2596" cx="8" cy="8" r="8"
            class="fill-dark" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
          <circle id="Elipse_2596" data-name="Elipse 2596" cx="8" cy="8" r="8"
            class="fill-dark" />
        </svg>
      </div>

      <span class="end-text order-1 font-serif italic md:order-none">{!! $title !!}</span>
    </div>

    @if (array_key_exists('terms', $thumb))
      <p class="font-serif font-bold">{!! $thumb['terms'] !!}</p>
    @endif
  </header>
</a>
@php $counter++; @endphp
