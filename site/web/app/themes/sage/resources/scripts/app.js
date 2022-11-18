import {domReady} from '@roots/sage/client';
import {nav} from './nav.js';
import {renderHeader} from './lottieApp.js';
// import {animateProject} from './animateProject.js';
// import {quotesSlider} from './sliders.js';
// import {dynamicBg} from './dynamicDarkBg.js';

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code
  new nav();

  renderHeader();
  // animateProject();
  // quotesSlider();
  // dynamicBg();

  if (document.body.classList.contains('post-type-archive-project') || document.body.classList.contains('page')) {
    const {dynamicBg} = await import('./dynamicDarkBg.js');
    dynamicBg();
  }

  if (document.body.classList.contains('post-type-archive-project') || document.body.classList.contains('page')) {
    const {animateProject} = await import('./animateProject.js');
    const {quotesSlider} = await import('./sliders.js');
    animateProject();
    quotesSlider();
  }

  if (document.body.classList.contains('post-type-archive-project')) {
    const {loadMore} = await import('./infiniteScroll.js');
    loadMore();
  }
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
