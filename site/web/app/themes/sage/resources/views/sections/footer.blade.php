<footer class="content-info bg-dark p-6 text-white">
  <div class="sidebar-footer">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>

  <div class="flex flex-wrap justify-between text-xs">
    <div class="left order-1 mr-4">
      @option('footer_left_text')
    </div>
    <div class="right order-1">
      <span>@option('footer_right_text')</span>
    </div>
    <div class="social mb-4 flex w-full gap-4">
      <div class="icon h-6 w-6">
        <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_109_16)">
            <g clip-path="url(#clip1_109_16)">
              <path
                d="M8.5 1H23.5C24.4849 1 25.4602 1.19399 26.3701 1.5709C27.2801 1.94781 28.1069 2.50026 28.8033 3.1967C29.4997 3.89314 30.0522 4.71993 30.4291 5.62987C30.806 6.53982 31 7.51509 31 8.5V23.5C31 24.4849 30.806 25.4602 30.4291 26.3701C30.0522 27.2801 29.4997 28.1069 28.8033 28.8033C28.1069 29.4997 27.2801 30.0522 26.3701 30.4291C25.4602 30.806 24.4849 31 23.5 31H8.5C7.51509 31 6.53982 30.806 5.62987 30.4291C4.71993 30.0522 3.89314 29.4997 3.1967 28.8033C2.50026 28.1069 1.94781 27.2801 1.5709 26.3701C1.19399 25.4602 1 24.4849 1 23.5V8.5C1 6.51088 1.79018 4.60322 3.1967 3.1967C4.60322 1.79018 6.51088 1 8.5 1V1Z"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path
                d="M22 15.055C22.1851 16.3034 21.9719 17.5783 21.3906 18.6985C20.8094 19.8187 19.8897 20.7271 18.7624 21.2945C17.6351 21.8619 16.3577 22.0594 15.1117 21.8589C13.8657 21.6584 12.7146 21.0701 11.8222 20.1777C10.9299 19.2854 10.3416 18.1343 10.1411 16.8883C9.94059 15.6423 10.1381 14.3648 10.7055 13.2376C11.2729 12.1103 12.1813 11.1906 13.3015 10.6094C14.4217 10.0281 15.6966 9.81488 16.945 9.99999C18.2184 10.1888 19.3973 10.7822 20.3075 11.6925C21.2178 12.6027 21.8112 13.7816 22 15.055Z"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </g>
          </g>
          <defs>
            <clipPath id="clip0_109_16">
              <rect width="32" height="32" fill="white" />
            </clipPath>
            <clipPath id="clip1_109_16">
              <rect width="32" height="32" fill="white" />
            </clipPath>
          </defs>
        </svg>
      </div>

      <div class="icon h-6 w-6">
        <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_109_23)">
            <g clip-path="url(#clip1_109_23)">
              <path
                d="M24.5 1H20C18.0109 1 16.1032 1.79018 14.6967 3.1967C13.2902 4.60322 12.5 6.51088 12.5 8.5V13H8V19H12.5V31H18.5V19H23L24.5 13H18.5V8.5C18.5 8.10218 18.658 7.72064 18.9393 7.43934C19.2206 7.15804 19.6022 7 20 7H24.5V1Z"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </g>
          </g>
          <defs>
            <clipPath id="clip0_109_23">
              <rect width="32" height="32" fill="white" />
            </clipPath>
            <clipPath id="clip1_109_23">
              <rect width="18.5" height="32" fill="white" transform="translate(7)" />
            </clipPath>
          </defs>
        </svg>
      </div>

      <div class="icon h-6 w-6">
        <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_109_30)">
            <g clip-path="url(#clip1_109_30)">
              <path
                d="M22 11C24.3869 11 26.6761 11.9482 28.364 13.636C30.0518 15.3239 31 17.6131 31 20V30.5H25V20C25 19.2044 24.6839 18.4413 24.1213 17.8787C23.5587 17.3161 22.7956 17 22 17C21.2044 17 20.4413 17.3161 19.8787 17.8787C19.3161 18.4413 19 19.2044 19 20V30.5H13V20C13 17.6131 13.9482 15.3239 15.636 13.636C17.3239 11.9482 19.6131 11 22 11V11Z"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M1 12.5H7V30.5H1V12.5Z" stroke="white" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
              <path
                d="M7 5C7 5.59334 6.82405 6.17336 6.49441 6.66671C6.16477 7.16006 5.69623 7.54458 5.14805 7.77164C4.59987 7.9987 3.99667 8.05811 3.41473 7.94236C2.83279 7.8266 2.29824 7.54088 1.87868 7.12132C1.45912 6.70176 1.1734 6.16721 1.05765 5.58527C0.94189 5.00333 1.0013 4.40013 1.22836 3.85195C1.45543 3.30377 1.83994 2.83524 2.33329 2.50559C2.82664 2.17595 3.40666 2 4 2C4.79565 2 5.55871 2.31607 6.12132 2.87868C6.68393 3.44129 7 4.20435 7 5Z"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </g>
          </g>
          <defs>
            <clipPath id="clip0_109_30">
              <rect width="32" height="32" fill="white" />
            </clipPath>
            <clipPath id="clip1_109_30">
              <rect width="32" height="30.5" fill="white" transform="translate(0 1)" />
            </clipPath>
          </defs>
        </svg>
      </div>

    </div>
  </div>
</footer>
