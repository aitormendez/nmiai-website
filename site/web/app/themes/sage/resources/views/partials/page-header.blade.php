@php
  if ($json_on_mobile) {
      $h1_classes = 'opacity-0 absolute';
      $div_json_classes = '';
  } else {
      $h1_classes = 'md:opacity-0 md:absolute';
      $div_json_classes = 'hidden md:block';
  }
@endphp

@if ($header_json)
  <div class="page-header not-prose relative z-20 mt-20 flex justify-center mix-blend-darken md:mb-20 md:mt-40">
    @if (is_front_page())
      <video class="absolute top-0 w-full max-w-[900px]"
        src="https://vz-3b6a9b31-e3a.b-cdn.net/84ba41c1-12ad-4eb9-a4f6-5602e76dd35e/play_720p.mp4" muted autoplay
        playsinline disablepictureinpicture></video>
    @endif

    <div data-json-path="{{ $header_json['url'] }}" data-json-autoplay="@field('json_header_autoplay')"
      data-json-loop="@field('json_header_loop')" id="header-animation"
      class="{!! $div_json_classes !!} relative max-w-[900px] mix-blend-darken">
    </div>
    <h1 class="{!! $h1_classes !!} xs:text-5xl text-center text-4xl font-bold uppercase lg:text-8xl">
      @if ($header_html)
        {!! wp_strip_all_tags($header_html) !!}
      @else
        {!! $title !!}
      @endif
    </h1>
  </div>
@else
  <div
    class="page-header fade not-prose is-style-column mb-20 flex justify-center px-6 pt-32 text-center opacity-0 md:mb-60 md:pt-72">
    <h1 class="text-4xl font-bold uppercase md:text-5xl lg:text-7xl xl:text-8xl">
      @if ($header_html)
        {!! $header_html !!}
      @else
        {!! $title !!}
      @endif
    </h1>
  </div>
@endif
