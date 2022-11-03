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
  <div class="page-header -z-20 flex justify-center px-6 pt-20 md:pt-24">
    <div data-json-path="{{ $header_json['url'] }}" data-json-autoplay="@field('json_header_autoplay')"
      data-json-loop="@field('json_header_loop')" id="header-animation" class="{!! $div_json_classes !!} -z-10 max-w-screen-md"></div>
    <h1 class="{!! $h1_classes !!} xs:text-5xl text-center text-4xl font-bold uppercase lg:text-8xl">
      {!! $title !!}</h1>
  </div>
@else
  <div class="page-header flex justify-center pt-64">
    <h1 class="text-8xl font-bold uppercase">{!! $title !!}</h1>
  </div>
@endif
