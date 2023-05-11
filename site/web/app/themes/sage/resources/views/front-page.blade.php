@extends('layouts.app')

@section('content')
  @while (have_posts())
    @php(the_post())
    @php(dynamic_sidebar('sidebar-front-page'))
    @include('partials.page-header')
    <div class="content">
      @includeFirst(['partials.content-page', 'partials.content'])
    </div>
  @endwhile
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
