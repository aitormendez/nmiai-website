<li
  class="accordion-group {{ $block->classes }} border-midup mb-6 max-w-none border-b pb-16 transition-colors duration-1000 last:mb-0 dark:text-white">
  <a class="accordion-menu block cursor-pointer select-none pt-10 pb-5">
    <h2 class="text-4xl uppercase md:text-5xl lg:text-6xl">{{ $accordion_item }}</h2>
    <div class="relative mt-10 mb-10 w-10">
      <svg viewBox="0 0 29 3" fill="none" xmlns="http://www.w3.org/2000/svg" class="spin absolute">
        <rect width="29" height="3" fill="none" class="fill-dark dark:fill-white" />
      </svg>
      <svg viewBox="0 0 29 3" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="29" height="3" fill="none" class="fill-dark dark:fill-white" />
      </svg>
    </div>
  </a>
  <div class="accordion-content h-0 overflow-hidden">
    <InnerBlocks />
  </div>
</li>
