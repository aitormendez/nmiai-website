<footer class="content-info bg-dark px-6 py-12 text-white">
  <div class="down grid gap-4 gap-x-2 text-xs"">
    <div class="left-text flex items-center">
      ©{{ date('Y') }} @option('footer_left_text')
    </div>
    <div class="right-text flex items-center md:justify-end">
      <span>
        @option('footer_right_text')
      </span>
    </div>

    @hasoptions('footer_links')
      <ul class="social flex w-full gap-4 md:mb-0 md:w-auto">
        @options('footer_links')
          <li>
            <a href="@sub('footer_link', 'url')" target="@sub('footer_link', 'target')">
              <span class="underline">@sub('footer_link', 'title')</span>
            </a>
          </li>
        @endoptions
      </ul>
    @endhasoptions

  </div>
</footer>
