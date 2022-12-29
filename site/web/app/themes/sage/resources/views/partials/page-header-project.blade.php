<div class="page-header not-prose is-style-column">
  <h1 class="inline">{!! $title !!} / </h1>
  {!! wpautop(get_the_excerpt()) !!}
  @if ($tags)
    <div class="tags text-middle mt-6 font-serif italic">{{ $tags }}</div>
  @endif
</div>
