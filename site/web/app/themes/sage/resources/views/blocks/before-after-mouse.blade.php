<section class="{{ $block->classes }}">
  <div class="not-prose relative overflow-hidden" style="{{ $padding }}">
    <img class="max-w-auto w-full" src="{{ $beforeafter['image_before']['url'] }}"
      alt="{{ $beforeafter['image_before']['alt'] }}" srcset="{{ $beforeafter['image_before']['srcset'] }}"
      sizes="{{ $beforeafter['image_before']['sizes'] }}">

    <img class="img-after max-w-auto absolute top-0 left-0 w-full" src="{{ $beforeafter['image_after']['url'] }}"
      alt="{{ $beforeafter['image_after']['alt'] }}" srcset="{{ $beforeafter['image_after']['srcset'] }}"
      sizes="{{ $beforeafter['image_after']['sizes'] }}" style="clip-path: polygon(0% 0, 0% 0%, 0% 100%, 0 100%);">

    <div class="line absolute top-0 h-full w-0 border-r border-l border-white"></div>
  </div>
</section>
