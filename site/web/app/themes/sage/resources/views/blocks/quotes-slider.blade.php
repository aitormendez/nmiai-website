@if ($quotes)
  <div class="{{ $block->classes }}">
    <div class="wrapper" style="{{ $padding }}">
      <div class="swiper-quotes swiper leading-h2 2xl:text-7con5xl w-full !overflow-visible text-6xl">
        <div class="swiper-wrapper">
          @foreach ($quotes['quotes'] as $quote)
            <div class="swiper-slide flex flex-col justify-between">
              <div class="quote flex py-6">
                <span class="dark:text-white">“</span><span class="dark:text-white">{!! $quote['quotes_slider_quote'] !!}”</span>
              </div>
              <div class="data ml-8 font-serif text-2xl md:ml-10">
                <div class="name font-rigid dark:text-white">
                  {!! $quote['quotes_slider_name'] !!}
                </div>
                <div class="text-middle text-lg italic">{!! $quote['quotes_slider_subtitle'] !!}</div>
              </div>
            </div>
          @endforeach
        </div>
        <button class="swiper-button swiper-button-next absolute top-0 z-10 h-full w-1/2"></button>
        <button class="swiper-button swiper-button-prev absolute top-0 right-0 z-10 h-full w-1/2"></button>
      </div>
    </div>
  </div>
@endif
