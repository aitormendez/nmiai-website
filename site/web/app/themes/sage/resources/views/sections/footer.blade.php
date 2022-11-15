<footer class="content-info bg-dark p-6 text-white">
  <div class="down grid gap-x-4 text-xs">
    <div class="left-text flex items-center">
      @option('footer_left_text')
    </div>
    <div class="right-text flex items-center justify-end">
      <span>
        @option('footer_right_text')
      </span>
    </div>

    @hasoptions('footer_links')
      <ul class="social mb-4 flex w-full gap-4 md:mb-0 md:w-auto">
        @options('footer_links')
        <li>
          <a href="@sub('footer_link', 'url')" target="@sub('footer_link', 'target')">
            <span>@sub('footer_link', 'title')</span>
          </a>
        </li>
        @endoptions
      </ul>
    @endhasoptions

  </div>
</footer>
