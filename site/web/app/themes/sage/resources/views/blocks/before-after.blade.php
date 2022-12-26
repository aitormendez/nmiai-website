<section class="{{ $block->classes }} {{ $beforeafter['ui_color'] }}">
  <div class="not-prose relative" style="{{ $padding }}">
    <img src="{{ $beforeafter['image_before']['url'] }}" alt="{{ $beforeafter['image_before']['alt'] }}"
      srcset="{{ $beforeafter['image_before']['srcset'] }}" sizes="{{ $beforeafter['image_before']['sizes'] }}">
    <img class="img-after absolute top-0 left-0 opacity-0" src="{{ $beforeafter['image_after']['url'] }}"
      alt="{{ $beforeafter['image_after']['alt'] }}" srcset="{{ $beforeafter['image_after']['srcset'] }}"
      sizes="{{ $beforeafter['image_after']['sizes'] }}" style="transition: opacity 0s">

    <div class="absolute bottom-0 my-6 flex w-full items-center justify-center">
      <span class="start_text mr-4">{{ $beforeafter['start_text'] }}</span>
      <input type="range" min="0" max="100" value="0">
      <span class="end_text ml-4">{{ $beforeafter['end_text'] }}</span>
    </div>
  </div>
</section>
