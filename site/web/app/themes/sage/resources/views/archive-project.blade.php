@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @query([
      'post_type' => 'project',
      'posts_per_page' => 4,
  ])

  @php
    global $counter;
    $counter = 1;
  @endphp

  <div class="works mt-24 flex flex-wrap px-6">
    @posts
      @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
    @endposts
  </div>

  <div class="insertions p-6">
    @php(dynamic_sidebar('sidebar-project-archive'))
  </div>

  <div class="works mt-24 flex flex-wrap px-6">
    @while (have_posts())
      @php(the_post())
      @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
    @endwhile
  </div>

  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
