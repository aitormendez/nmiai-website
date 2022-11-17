@if ($quotes)
  <div class="{{ $block->classes }}">
    <div class="wrapper dark:bg-dark transition-colors duration-1000"
      style="padding-top:{{ $padding[0] }};padding-right:{{ $padding[1] }};padding-bottom:{{ $padding[2] }};padding-left:{{ $padding[3] }}">
      <div class="swiper-quotes swiper w-full !overflow-visible text-5xl">
        <div class="swiper-wrapper">
          @foreach ($quotes['quotes'] as $quote)
            <div class="swiper-slide flex flex-col justify-between">
              <div class="quote flex py-6">
                <span class="dark:text-white">“</span><span class="dark:text-white">{!! $quote['quotes_slider_quote'] !!}”</span>
              </div>
              <div class="data font-serif text-2xl">
                <div class="for-progress">
                  <span class="name dark:text-white">
                    {!! $quote['quotes_slider_name'] !!}
                  </span>
                </div>
                <span class="text-middle italic">{!! $quote['quotes_slider_subtitle'] !!}</span>
              </div>
            </div>
          @endforeach
        </div>

        <div class="nav absolute bottom-0 right-20 z-10 flex w-32 justify-between">
          <div class="swiper-button-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18">
              <path id="Polígono_7" data-name="Polígono 7" d="M9,0l9,16H0Z" transform="translate(0 18) rotate(-90)"
                fill="#1c1c1c" />
            </svg>
          </div>
          <div class="swiper-button-next">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18">
              <path id="Polígono_6" data-name="Polígono 6" d="M9,0l9,16H0Z" transform="translate(16) rotate(90)"
                fill="#1c1c1c" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
