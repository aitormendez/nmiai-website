<article @php post_class('mt-16') @endphp>
  <header>
    @include('partials.page-header-project')
  </header>

  <div class="entry-content">
    @php(the_content())
  </div>

  <footer>
    <div class="next-project not-prose py-32 text-center text-2xl font-bold uppercase underline md:py-60 md:text-3xl">
      {!! get_previous_post_link('%link', __('Next Project', 'sage')) !!}
    </div>
  </footer>

  @php(comments_template())
</article>
