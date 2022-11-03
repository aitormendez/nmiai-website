import {domReady} from '@roots/sage/client';
import {nav} from './nav.js';
import {renderHeader} from './lottieApp.js';
import {progressBar} from './progressBar.js';

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
  progressBar();
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
