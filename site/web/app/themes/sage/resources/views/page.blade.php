@extends('layouts.app')

@section('content')
  @while (have_posts())
    @php(the_post())
    @include('partials.page-header')
    <div id="slider-value">0</div>
    <div class="content">
      @includeFirst(['partials.content-page', 'partials.content'])
    </div>
  @endwhile
@endsection
