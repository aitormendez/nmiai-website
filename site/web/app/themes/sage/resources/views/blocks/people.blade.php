<div class="{{ $block->classes }} not-prose">
  <a class="relative block h-full w-full">
    <div class="text hidden">@wpautop($person['people_text'])</div>

    @if ($person['people_content_type'] === 'video')
      <div class="wrapper">
        <video class="hidden 2xl:block" poster="{{ $person['people_video_poster'] }}" autoplay muted loop playsinline
          class="relative">
          <source
            src="https://{{ $person['people_video_zone'] }}.b-cdn.net/{{ $person['people_video_id'] }}/play_720p.mp4"
            type="video/mp4">
        </video>
        <video class="hidden md:block 2xl:hidden" poster="{{ $person['people_video_poster'] }}" autoplay muted loop
          playsinline class="relative">
          <source
            src="https://{{ $person['people_video_zone'] }}.b-cdn.net/{{ $person['people_video_id'] }}/play_480p.mp4"
            type="video/mp4">
        </video>
        <video class="md:hidden" poster="{{ $person['people_video_poster'] }}" autoplay muted loop playsinline
          class="relative">
          <source
            src="https://{{ $person['people_video_zone'] }}.b-cdn.net/{{ $person['people_video_id'] }}/play_240p.mp4"
            type="video/mp4">
        </video>
      </div>
    @else
      <div class="wrapper">
        <img src="{!! $person['people_image']['url'] !!}" alt="">
      </div>
    @endif

    <div class="bg-midup absolute left-0 bottom-0 flex items-center py-1 px-2 text-xs text-white sm:text-base">
      <div class="mr-1 w-4">
        <svg id="prefix__Layer_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240.63 254.24">
          <defs>
            <style>
              .prefix__cls-2 {
                fill: #d8d8d8
              }
            </style>
          </defs>
          <g id="prefix__Layer_1-2">
            <path class="prefix__cls-2"
              d="M82 126.82v-4.34c0-21.7-.31-43.4.12-65.09.22-11.01 4.59-20.39 13.89-27.23 6.66-4.9 13.81-7.47 22.05-7.11 2.41.11 4.82.04 7.23.02 10.56-.08 19.27 4.11 26.25 11.82 3.75 4.14 6.39 9.09 7.57 14.57.32 1.48-.32 3.79-1.39 4.86-8.26 8.28-16.71 16.37-25.14 24.48-6.21 5.98-12.48 11.91-18.73 17.85-8.2 7.78-16.41 15.53-24.62 23.3-2.19 2.07-4.37 4.14-7.24 6.86z" />
            <path
              d="M7.52 231.12c-5.62 0-8.44-4.01-7.24-8.62.72-2.79 2.47-4.28 4.61-5.92 2.96-2.26 5.52-5.04 8.2-7.66 5.53-5.39 11.02-10.83 16.53-16.24 4.85-4.76 9.66-9.56 14.59-14.24 3.37-3.21 7-6.16 10.34-9.4 7.89-7.65 15.61-15.46 23.51-23.1 7.83-7.56 15.79-14.99 23.7-22.46 5.44-5.14 10.92-10.25 16.34-15.41 5.62-5.35 11.16-10.77 16.78-16.12 7.2-6.85 14.46-13.64 21.67-20.49 3.5-3.33 6.94-6.73 10.4-10.1 8.12-7.88 16.21-15.78 24.36-23.62 4.22-4.07 8.55-8.02 12.78-12.08 4.9-4.69 9.72-9.46 14.61-14.16 3.08-2.97 6.21-5.88 9.32-8.82 3.07-2.91 7.66-3.57 10.03-1.44 3.22 2.89 3.53 7.71.48 10.77-4.18 4.19-8.46 8.3-12.79 12.34-4.91 4.58-9.98 8.98-14.87 13.58-4.09 3.85-7.99 7.9-12.03 11.8-2.86 2.76-5.91 5.34-8.71 8.16-3.88 3.9-7.5 8.06-11.44 11.9-2.83 2.76-6.14 5.02-9 7.76-4.91 4.71-9.53 9.72-14.45 14.42-5.8 5.53-11.83 10.83-17.7 16.3-3.96 3.69-7.81 7.49-11.73 11.23-4.11 3.92-8.28 7.79-12.35 11.76-4.73 4.62-9.26 9.45-14.06 13.99-6.96 6.56-14.18 12.83-21.11 19.42-5.86 5.57-11.39 11.47-17.2 17.09-4.58 4.43-9.41 8.61-14.03 13-2.91 2.77-5.59 5.79-8.47 8.61-6.46 6.34-12.9 12.71-19.5 18.91-2.99 2.81-6.29 5.3-9.52 7.85-.77.61-1.8.87-2.04.99z"
              fill="#acacac" />
            <path class="prefix__cls-2"
              d="M70.39 189.12c3.14-3.18 6.03-6.11 9.03-9.14 6.65 5.44 14.25 9 22.49 11.24 8.22 2.23 16.49 2.43 24.99 1.58 10.19-1.02 19.28-4.72 27.51-10.31 9.64-6.55 16.95-15.27 21.31-26.3 2.43-6.15 4.31-12.37 4.69-19.03.19-3.29 2.8-6.38 5.5-6.97 2.68-.59 5.63.1 6.48 2.47 1.08 3.02 1.45 6.62.98 9.8-1.24 8.39-3.85 16.48-8.01 23.9-2.36 4.21-5.01 8.36-8.15 12.01-3.96 4.61-8.2 9.11-12.94 12.89-7.69 6.14-16.34 10.68-26.06 12.9-2.5.57-4.96 1.32-7.73 2.07-.04.78-.15 1.72-.15 2.65-.01 9.65.09 19.29-.07 28.94-.04 2.66.9 3.24 3.34 3.18 6.55-.14 13.11-.06 19.67-.04 2.73 0 6.21 2.82 6.92 5.53.44 1.69-1.99 5.67-4.24 6.56-1.48.59-3.1 1.11-4.66 1.12-20.15.07-40.31.08-60.46.01-3.2-.01-6.15-.65-7.69-4.22-1.87-4.36.98-8.97 5.88-9 6.56-.04 13.12-.09 19.67.04 2.41.05 3.37-.49 3.32-3.19-.18-8.87-.06-17.75-.05-26.62 0-4.72 0-4.76-4.56-5.32-11.79-1.46-22.46-5.71-31.96-12.86-1.73-1.3-3.44-2.65-5.06-3.9z" />
            <path class="prefix__cls-2"
              d="M96.31 163.75c1.75-1.85 2.92-3.2 4.22-4.44 6.02-5.77 12.08-11.49 18.1-17.26 7.27-6.96 14.51-13.96 21.77-20.92 5.81-5.57 11.64-11.13 17.47-16.68.6-.57 1.29-1.06 2.21-1.8.1.77.21 1.21.21 1.65 0 10.9.58 21.83-.15 32.68-.77 11.4-5.75 20.86-15.83 27.3-6.27 4.01-12.91 5.83-20.24 5.7-6.21-.11-12.51.58-18.47-1.78-3.04-1.2-5.91-2.82-9.29-4.45zM48.28 158.4c-.9-2.97-1.91-5.59-2.46-8.31-.89-4.36-1.77-8.76-2.12-13.18-.35-4.38 2.8-7.12 7.15-6.88 2.17.12 5.56 3.39 5.99 5.88.63 3.74 1.31 7.48 1.7 11.24.11 1.1-.34 2.64-1.11 3.38-2.67 2.56-5.6 4.86-9.14 7.86z" />
          </g>
        </svg>
      </div>
      {{ $person['people_short_name'] }}
    </div>

    <div
      class="flap absolute top-0 left-0 z-10 hidden h-full w-full cursor-pointer text-white opacity-0 transition-opacity duration-500 hover:opacity-100 md:block">
      <div class="bg bg-dark absolute h-full w-full opacity-50"></div>
      <div class="data absolute flex h-full w-full flex-col justify-center leading-[1.1em]">
        @if ($person['people_name'])
          <p class="name mb-1 w-full text-center text-xl leading-none">{{ $person['people_name'] }}</p>
        @endif
        @if ($person['people_title'])
          <p class="title mb-3 w-full text-center font-serif text-lg italic leading-none">{{ $person['people_title'] }}
          </p>
        @endif
        @if ($person['people_email'])
          <p class="email w-full text-center text-sm font-extralight">{{ $person['people_email'] }}</p>
        @endif
      </div>
    </div>
  </a>
</div>
