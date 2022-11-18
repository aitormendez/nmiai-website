<section class="{{ $block->classes }}">
  <div class="p-6">
    <div class="bottom my-6 flex flex-wrap items-center justify-between md:justify-start">

      <div class="progress relative mb-4 flex w-full items-center justify-between">
        <div class="progress-bar absolute h-0 w-0 border dark:text-white"></div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
          <circle id="Elipse_2596" data-name="Elipse 2596" cx="8" cy="8" r="8"
            class="fill-dark dark:fill-white" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
          <circle id="Elipse_2596" data-name="Elipse 2596" cx="8" cy="8" r="8"
            class="fill-dark dark:fill-white" />
        </svg>
      </div>

      <div class="labels flex w-full justify-between">
        <span
          class="start-text order-1 mr-4 font-serif font-bold dark:text-white md:order-none">{{ $section['start_text'] }}</span>
        <span class="end-text order-1 font-serif font-bold italic md:order-none">{{ $section['end_text'] }}</span>
      </div>

    </div>
    <div>
      <InnerBlocks />
    </div>
  </div>
</section>
