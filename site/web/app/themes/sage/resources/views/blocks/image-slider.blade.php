@if ($gallery)
  <div class="{{ $block->classes }}">
    <div class="wrapper" style="{{ $padding }}">
      <div class="swiper-images swiper w-full overflow-hidden text-3xl md:text-5xl">
        <div class="swiper-wrapper">
          @foreach ($gallery as $img)
            <div class="swiper-slide flex flex-col justify-between">
              {!! $img !!}
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endif
