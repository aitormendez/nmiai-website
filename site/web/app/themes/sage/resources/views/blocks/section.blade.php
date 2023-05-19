<section class="{{ $block->classes }} mt-20 md:mt-44">
  <div class="" style="{{ $padding }}">
    <div class="bottom flex flex-wrap items-center justify-between md:justify-start">

      <div class="progress relative mb-2 flex w-full items-center justify-between">
        <div class="progress-bar text-dark absolute h-0 w-0 border-t dark:text-white"></div>
        <svg class="h-2 w-2 md:h-[11px] md:w-[11px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
          <circle id="Elipse_2596" data-name="Elipse 2596" cx="8" cy="8" r="8"
            class="fill-dark dark:fill-white" />
        </svg>
        <svg class="h-2 w-2 md:h-[11px] md:w-[11px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
          <circle id="Elipse_2596" data-name="Elipse 2596" cx="8" cy="8" r="8"
            class="fill-dark dark:fill-white" />
        </svg>
      </div>

      <div class="labels fade flex w-full justify-between">
        <span
          class="start-text order-1 mr-4 font-serif font-bold dark:text-white md:order-none">{{ $section['start_text'] }}</span>
        <span
          class="end-text order-1 font-serif font-bold italic dark:text-white md:order-none">{{ $section['end_text'] }}</span>
      </div>

    </div>
    <div class="pt-24 md:pt-36">
      <InnerBlocks />
    </div>
  </div>
</section>
