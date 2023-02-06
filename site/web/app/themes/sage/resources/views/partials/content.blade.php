@php
  $thumb = $featured_img();
  global $counter;
@endphp
<a role="article" href="{{ get_permalink() }}" {{ post_class('md:w-1/2 md:odd:pr-2 md:even:pl-2 mb-20 no-underline') }}>
  <header>
    @if (array_key_exists('img', $thumb))
      @if ($thumb['img']['mime'] === 'image/gif')
        <img src="{{ $thumb['img']['url'] }}" alt="{{ $thumb['img']['alt'] }}">
      @else
        <img src="{{ $thumb['img']['url'] }}" alt="{{ $thumb['img']['alt'] }}" srcset="{{ $thumb['img']['srcset'] }}"
          sizes="(max-width: 768px) 100vw, 50vw">
      @endif
    @endif

    <div class="bottom my-6 flex flex-wrap items-center justify-between md:justify-start">
      <span
        class="start-text order-1 mr-4 font-serif font-bold md:order-none">{{ substr(str_repeat(0, 2) . $counter, -2) }}</span>
      <div class="progress relative mb-2 flex w-full items-center justify-between md:mr-4 md:mb-0 md:w-52">
        <div class="progress-bar absolute h-0 w-0 border-t"></div>
        <svg class="h-2 w-2 md:h-[11px] md:w-[11px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
          <circle id="Elipse_2596" data-name="Elipse 2596" cx="8" cy="8" r="8"
            class="fill-dark" />
        </svg>
        <svg class="h-2 w-2 md:h-[11px] md:w-[11px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
          <circle id="Elipse_2596" data-name="Elipse 2596" cx="8" cy="8" r="8"
            class="fill-dark" />
        </svg>
      </div>

      <span class="end-text order-1 font-serif font-bold italic opacity-40 md:order-none">{!! $title !!}</span>
    </div>

    @if (array_key_exists('terms', $thumb))
      <p class="terms hidden font-serif font-bold opacity-0 md:block">{!! $thumb['terms'] !!}</p>
    @endif
  </header>
</a>
@php $counter++; @endphp
