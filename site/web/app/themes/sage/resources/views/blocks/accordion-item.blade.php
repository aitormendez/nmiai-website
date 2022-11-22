<li class="accordion-group {{ $block->classes }} mb-6 p-6 transition-colors duration-1000 last:pb-0 dark:text-white">
  <div class="accordion-menu cursor-pointer select-none">
    <h2 class="text-4xl uppercase md:text-5xl lg:text-6xl">{{ $accordion_item }}</h2>
    <div class="my-4 w-10">
      <svg viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M13 16V29L16 29V16H29V13H16V0H13V13H0V16H13Z" class="fill-dark dark:fill-white" />
      </svg>
    </div>
  </div>
  <div class="accordion-content h-0 overflow-hidden">
    <InnerBlocks />
  </div>
</li>
