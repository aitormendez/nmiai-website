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
  <div class="page-header z-20 flex justify-center px-6 pt-20 md:pt-24">
    <div data-json-path="{{ $header_json['url'] }}" data-json-autoplay="@field('json_header_autoplay')"
      data-json-loop="@field('json_header_loop')" id="header-animation" class="{!! $div_json_classes !!} -z-10 max-w-screen-md"></div>
    <h1 class="{!! $h1_classes !!} xs:text-5xl text-center text-4xl font-bold uppercase lg:text-8xl">
      @if ($header_html)
        {!! wp_strip_all_tags($header_html) !!}
      @else
        {!! $title !!}
      @endif
    </h1>
  </div>
@else
  <div class="page-header not-prose flex justify-center px-6 py-20 text-center">
    <h1 class="text-4xl font-bold uppercase md:text-5xl lg:text-7xl xl:text-8xl">
      @if ($header_html)
        {!! $header_html !!}
      @else
        {!! $title !!}
      @endif
    </h1>
  </div>
@endif
