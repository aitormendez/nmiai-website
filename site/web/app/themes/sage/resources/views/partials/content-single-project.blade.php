<article @php(post_class())>
  <header>
    @include('partials.page-header-project')
  </header>

  <div class="entry-content">
    @php(the_content())
  </div>

  <footer>
    <div class="next-project not-prose py-60 text-center text-2xl font-bold uppercase underline md:text-3xl">
      {!! get_previous_post_link('%link', __('Next Project', 'sage')) !!}
    </div>
  </footer>

  @php(comments_template())
</article>
