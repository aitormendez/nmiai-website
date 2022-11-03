<div class="{{ $block->classes }} py-6">
  <img class="opacity-0" src="{{ $post_block['post_thumbnail_data']['src'][0] }}"
    alt="{{ $post_block['post_thumbnail_data']['alt'] }}" srcset="{{ $post_block['post_thumbnail_data']['srcset'] }}"
    sizes="100%">

  <div class="my-6 flex items-center justify-start">
    <span class="start-text mr-4 font-serif">{{ $post_block['start_text'] }}</span>
    <div class="progress relative mr-4 flex w-52 items-center justify-between">
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
    <span class="end-text font-serif italic">{{ $post_block['end_text'] }}</span>
  </div>

  <div class="my-6 text-2xl">{!! $post_block['post_excerpt'] !!}</div>
  <p class="font-serif font-bold">{!! $post_block['terms'] !!}</p>
</div>
