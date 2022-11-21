@php
  $allowed_inner_blocks = ['acf/accordion-item'];
@endphp

<div class="{{ $block->classes }} bg-light mb-6 border p-6">
  <div class="wrapper" style="{{ $padding }}"">
    <InnerBlocks allowedBlocks="{{ wp_json_encode($allowed_inner_blocks) }}"" />
  </div>
</div>
