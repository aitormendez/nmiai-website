<div class="{{ $block->classes }} not-prose mb-8">
  <div class="wrapper relative h-full w-full">
    <div class="text hidden">@wpautop($person['people_text'])</div>

    <video poster="{{ $person['people_video_poster'] }}" autoplay muted loop class="relative">
      <source src="https://{{ $person['people_video_zone'] }}.b-cdn.net/{{ $person['people_video_id'] }}/play_720p.mp4"
        type="video/mp4">
    </video>

    <div
      class="flap absolute top-0 left-0 z-10 h-full w-full cursor-pointer text-white opacity-0 transition-opacity duration-500 hover:opacity-100">
      <div class="bg bg-dark absolute h-full w-full opacity-50"></div>
      <div class="data absolute flex h-full w-full flex-col justify-center">
        <p class="name mb-8 w-full text-center">{{ $person['people_name'] }}</p>
        <p class="title w-full text-center">{{ $person['people_title'] }}</p>
        <p class="email w-full text-center">{{ $person['people_email'] }}</p>
      </div>
    </div>
  </div>
</div>
