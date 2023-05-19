<div class="page-header not-prose px-6">
  @if ($hero['type'] === 'video')
    <video poster="{{ $hero['video_poster'] }}" autoplay muted loop playsinline class="mb- relative w-full">
      <source src="https://{{ $hero['video_zone'] }}.b-cdn.net/{{ $hero['video_id'] }}/play_720p.mp4" type="video/mp4">
    </video>
  @else
    @if (array_key_exists('image', $hero))
      {!! $hero['image'] !!}
    @endif
  @endif

  <div class="project-info is-style-column my-6 md:my-20">
    <button class="mb-6 font-serif italic underline md:hidden">Project info +</button>
    <div class="info-content h-0 overflow-hidden md:h-auto">
      <h1 class="inline"><strong>{!! $title !!} / </strong></h1>
      {!! wpautop(get_the_excerpt()) !!}
      @if ($tags)
        <div class="tags text-middle mt-6 font-serif italic">{{ $tags }}</div>
      @endif
    </div>
  </div>
</div>
