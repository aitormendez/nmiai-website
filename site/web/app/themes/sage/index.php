<?php session_start(); ?>

<!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class('dark:bg-dark bg-white transition-colors duration-1000'); ?>>

  <div id="main-flap" class="bg-dark fixed w-screen h-screen opacity-0 transition-opacity duration-500 z-[60] hidden flex-col items-center justify-center px-12 md:px-[20vw] text-white text-center">
    <button class="x w-5 md:w-36 md:p-12">
      <svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.37868 11.5L0.186293 20.6924L2.30761 22.8137L11.5 13.6213L20.6924 22.8137L22.8137 20.6924L13.6213 11.5L22.8137 2.3076L20.6924 0.186285L11.5 9.37867L2.30761 0.186284L0.186292 2.3076L9.37868 11.5Z" fill="white"/>
      </svg>
    </button>
    <div class="flap-content flex flex-col items-center prose prose-p:text-white"></div>
  </div>

    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
