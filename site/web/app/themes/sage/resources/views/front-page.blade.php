@extends('layouts.app')

@section('content')
  @while (have_posts())
    @php(the_post())
    @php(dynamic_sidebar('sidebar-project-archive'))
    @include('partials.page-header')
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
