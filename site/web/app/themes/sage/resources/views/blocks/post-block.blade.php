<a href="{{ $post_block['permalink'] }}" class="{{ $block->classes }} block py-6" role="article">

  @if (array_key_exists('post_thumbnail_data', $post_block))
    <img class="opacity-0" src="{{ $post_block['post_thumbnail_data']['src'][0] }}"
      alt="{{ $post_block['post_thumbnail_data']['alt'] }}" srcset="{{ $post_block['post_thumbnail_data']['srcset'] }}"
      sizes="100%">
  @endif

  <div class="bottom my-6 flex flex-wrap items-center justify-between md:justify-start">
    <span class="start-text order-1 mr-4 font-serif font-bold md:order-none">{{ $post_block['start_text'] }}</span>
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
    <span class="end-text order-1 font-serif font-bold italic md:order-none">{{ $post_block['end_text'] }}</span>
  </div>

  <div class="my-6 text-2xl">{!! $post_block['post_excerpt'] !!}</div>

  @if (array_key_exists('terms', $post_block))
  @endif
</a>
