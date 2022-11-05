<div class="{{ $block->classes }} py-6">
  <img class="opacity-100" src="{{ $post_block['post_thumbnail_data']['src'][0] }}"
    alt="{{ $post_block['post_thumbnail_data']['alt'] }}" srcset="{{ $post_block['post_thumbnail_data']['srcset'] }}"
    sizes="100%">

  <div class="my-6 flex items-center justify-start">
    <span class="start-text mr-4 font-serif">{{ $post_block['start_text'] }}</span>
    <span class="end-text font-serif italic">{{ $post_block['end_text'] }}</span>
  </div>

  <div class="my-6 text-2xl">{!! $post_block['post_excerpt'] !!}</div>
  <p class="font-serif font-bold">{!! $post_block['terms'] !!}</p>
</div>
