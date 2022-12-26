<section class="{{ $block->classes }}">
  <div class="not-prose relative" style="{{ $padding }}">
    <img src="{{ $beforeafter['image_before']['url'] }}" alt="{{ $beforeafter['image_before']['alt'] }}"
      srcset="{{ $beforeafter['image_before']['srcset'] }}" sizes="{{ $beforeafter['image_before']['sizes'] }}">

    <img class="img-after absolute top-0 left-0" src="{{ $beforeafter['image_after']['url'] }}"
      alt="{{ $beforeafter['image_after']['alt'] }}" srcset="{{ $beforeafter['image_after']['srcset'] }}"
      sizes="{{ $beforeafter['image_after']['sizes'] }}" style="clip-path: polygon(0% 0, 0% 0%, 0% 100%, 0 100%);">

    <div class="line border-light absolute h-full w-0 border-r-2 border-l-2"></div>
  </div>
</section>
