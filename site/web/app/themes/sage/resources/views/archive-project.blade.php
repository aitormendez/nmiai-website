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

  <div class="works infinite-container mt-24 flex flex-wrap px-6">
    @while (have_posts())
      @php(the_post())
      @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
    @endwhile
  </div>

  <div class="page-load-status w-full text-center text-3xl uppercase">
    <p class="infinite-scroll-last hidden">{{ __('End of content', 'sage') }}</p>
    <p class="infinite-scroll-error hidden">{{ __('No more pages to load', 'sage') }}</p>
  </div>

  <div class="insertions p-6">
    @php(dynamic_sidebar('sidebar-project-archive'))
  </div>

  <button class="view-more-button w-full text-3xl uppercase underline">View more</button>

  {!! get_the_posts_navigation(['class' => 'hidden']) !!}
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
