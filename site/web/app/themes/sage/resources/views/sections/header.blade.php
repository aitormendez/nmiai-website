<header class="banner">
  <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>
  @include('partials.navigation')

  <button>
    <div class="tagline">{{ get_bloginfo( 'description' ) }}</div>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
      <circle id="dot" cx="8" cy="8" r="8" fill="#2F2E2E"/>
    </svg>
  </button>

</header>
