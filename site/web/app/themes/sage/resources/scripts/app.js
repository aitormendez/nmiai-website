import {domReady} from '@roots/sage/client';
import {nav} from './nav.js';
import {lottieBlock, renderHeader} from './lottieApp.js';
import {slotMachine} from './slotMachine.js';

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  const mdMin = window.matchMedia('(min-width: 768px)');

  // application code
  new nav();

  renderHeader();
  slotMachine();
  lottieBlock();

  if (mdMin.matches) {
    const {cursor} = await import('./cursor.js');
    cursor();
  }

  if (!mdMin.matches && document.body.classList.contains('single-project')) {
    const {displayProjectInfo} = await import('./singleProyect.js');
    displayProjectInfo();
  }

  if (
    document.body.classList.contains('post-type-archive-project') ||
    document.body.classList.contains('page') ||
    document.body.classList.contains('single-project')
  ) {
    const {dynamicBg} = await import('./dynamicDarkBg.js');
    const {animateProject} = await import('./animateProject.js');
    const {quotesSlider, imagesSlider} = await import('./sliders.js');
    const {accordion} = await import('./accordions.js');
    const {people} = await import('./people.js');
    const {beforeAfterBlock} = await import('./beforeAfterBlock.js');
    const {beforeAfterMouseBlock} = await import('./beforeAfterMouseBlock.js');
    animateProject();
    quotesSlider();
    imagesSlider();
    dynamicBg();
    accordion();
    people();
    beforeAfterBlock();
    beforeAfterMouseBlock();
  }

  if (document.body.classList.contains('single-project') && mdMin.matches) {
    const {setGap} = await import('./utils/setGap.js');
    setGap();
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
