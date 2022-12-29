<div class="page-header not-prose px-9">
  @dump($hero)

  @if ($hero['type'] === 'video')
    <video poster="{{ $hero['video_poster'] }}" autoplay muted loop class="mb- relative w-full">
      <source src="https://{{ $hero['video_zone'] }}.b-cdn.net/{{ $hero['video_id'] }}/play_720p.mp4" type="video/mp4">
    </video>
  @else
    {!! $hero['image'] !!}
  @endif

  <div class="project-info is-style-column my-6 md:my-20">
    <h1 class="inline">{!! $title !!} / </h1>
    {!! wpautop(get_the_excerpt()) !!}
    @if ($tags)
      <div class="tags text-middle mt-6 font-serif italic">{{ $tags }}</div>
    @endif
  </div>
</div>
