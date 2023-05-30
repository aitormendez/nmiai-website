@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @php
    global $counter;
    $counter = 1;
  @endphp

  <div class="works infinite-container flex flex-wrap px-6 md:px-8">
    @while (have_posts())
      @php(the_post())
      @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
    @endwhile
  </div>

  <div class="page-load-status w-full text-center text-3xl uppercase">
    <p class="infinite-scroll-last hidden">{{ __('End of content', 'sage') }}</p>
    <p class="infinite-scroll-error hidden">{{ __('No more pages to load', 'sage') }}</p>
  </div>

  <button
    class="view-more-button w-full text-[20px] font-bold uppercase underline md:mt-20">{{ __('Load more', 'sage') }}</button>

  <div class="insertions p-6">
    @php(dynamic_sidebar('sidebar-project-archive'))
  </div>

  {!! get_the_posts_navigation(['class' => 'hidden']) !!}
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
