<li class="accordion-group {{ $block->classes }} mb-6 p-6 transition-colors duration-1000 last:pb-0 dark:text-white">
  <div class="accordion-menu cursor-pointer">
    <h2 class="text-3xl md:text-4xl lg:text-5xl">{{ $accordion_item }}</h2>
    <button>+</button>
  </div>
  <div class="accordion-content h-0 overflow-hidden">
    <InnerBlocks />
  </div>
</li>
