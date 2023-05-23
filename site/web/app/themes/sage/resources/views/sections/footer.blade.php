<footer
  class="content-info bg-dark flex flex-col justify-center px-6 py-12 text-center text-white md:block md:text-left">
  <div class="col-1 text-middle order-1 text-sm md:inline">
    <div class="left-text md:inline">
      ©{{ date('Y') }} @option('footer_left_text')
    </div>
    <div class="right-text md:ml-6 md:inline">
      <span>
        @option('footer_right_text')
      </span>
    </div>
  </div>

  @hasoptions('footer_links')
    <ul class="col-2 md:justify-left float-right mb-6 flex flex-wrap justify-center gap-x-4 text-center text-sm md:mb-0">
      <li class="contact-link w-full md:w-auto">
        <script type="text/javascript">
          var email = "hello",
            domain = "nomanisanisland.com",
            text = "hello@nomanisanisland.com";
          document.write("<a class=\"underline\" href=javascript:location='" + "mail" + "to:" + email + "@" + domain + "'>" +
            text + "</a>");
        </script>
      </li>
      @options('footer_links')
        <li>
          <a href="@sub('footer_link', 'url')" target="@sub('footer_link', 'target')">
            <span class="underline">@sub('footer_link', 'title')</span>
          </a>
        </li>
      @endoptions
    </ul>
  @endhasoptions
</footer>
