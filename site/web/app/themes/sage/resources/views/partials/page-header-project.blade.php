<div class="page-header not-prose">
  @if ($hero['type'] === 'video')
    <video poster="{{ $hero['video_poster'] }}" autoplay muted loop playsinline class="mb- relative w-full">
      <source src="https://{{ $hero['video_zone'] }}.b-cdn.net/{{ $hero['video_id'] }}/play_720p.mp4" type="video/mp4">
    </video>
  @elseif($hero['type'] === 'image')
    @if (array_key_exists('image', $hero))
      {!! $hero['image'] !!}
    @endif
  @elseif($hero['type'] === 'json')
    @set($header_json, get_field('single_project_json'))
    <div data-json-path="{{ $header_json['url'] }}" data-json-autoplay="@field('single_project_json_autoplay')"
      data-json-loop="@field('single_project_json_loop')" id="header-animation" class="relative w-full mix-blend-darken">
    </div>
  @endif

  <div class="project-info is-style-column my-6 md:my-20">
    <button class="font-serif italic underline md:hidden">Project info <svg
        class="plus-sign relative -top-[2px] ml-1 inline-block" width="15" height="15" viewBox="0 0 15 15"
        fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8 7V0H7V7H0V8H7V15H8V8H15V7H8Z" fill="black" />
      </svg>
    </button>
    <div class="info-content h-0 overflow-hidden md:h-auto">
      <div class="mt-6">
        <h1 class="inline"><strong>{!! $title !!} / </strong></h1>
        {!! wpautop(get_the_excerpt()) !!}
        @if ($tags)
          <div class="tags text-middle mt-6 font-serif italic">{{ $tags }}</div>
        @endif
      </div>
    </div>
  </div>
</div>
