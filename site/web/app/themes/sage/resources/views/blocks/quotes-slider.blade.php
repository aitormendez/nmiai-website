@if ($quotes)
  <div class="{{ $block->classes }}">
    <div class="wrapper" style="{{ $padding }}">
      <div class="swiper-quotes swiper leading-h2 2xl:text-7con5xl w-full !overflow-visible text-3xl md:text-6xl">
        <div class="swiper-wrapper">
          @foreach ($quotes['quotes'] as $quote)
            <div class="swiper-slide flex flex-col justify-between">
              <div class="quote flex pb-6">
                <span class="dark:text-white">“</span><span class="dark:text-white">{!! $quote['quotes_slider_quote'] !!}”</span>
              </div>
              <div class="data ml-3 font-serif text-sm md:ml-10 md:text-2xl">
                <div class="name font-rigid dark:text-white">
                  {!! $quote['quotes_slider_name'] !!}
                </div>
                <div class="text-middle italic">{!! $quote['quotes_slider_subtitle'] !!}</div>
              </div>
            </div>
          @endforeach
        </div>
        <button class="swiper-button swiper-button-next absolute right-1/2 top-0 z-10 h-full w-1/2"></button>
        <button class="swiper-button swiper-button-prev absolute top-0 left-1/2 -right-40 z-10 h-full w-1/2"></button>
      </div>
    </div>
  </div>
@endif
