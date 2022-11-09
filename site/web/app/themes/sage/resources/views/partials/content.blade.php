@php $thumb = $featured_img(); @endphp

<article {{ post_class('md:w-1/2 md:odd:pr-2 md:even:pl-2 mb-20') }}>
  <header>
    @if (array_key_exists('img', $thumb))
      @if ($thumb['img']['mime'] === 'image/gif')
        <img src="{{ $thumb['img']['url'] }}" alt="{{ $thumb['img']['alt'] }}">
      @else
        <img src="{{ $thumb['img']['url'] }}" alt="{{ $thumb['img']['alt'] }}" srcset="{{ $thumb['img']['srcset'] }}"
          sizes="(max-width: 768px) 50vw, 100vw">
      @endif
    @endif
    <h2 class="entry-title my-6 text-2xl md:text-3xl">
      <a href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>
  </header>
</article>
