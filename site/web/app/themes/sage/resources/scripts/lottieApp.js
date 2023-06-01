import lottie from 'lottie-web';
import '@lottiefiles/lottie-player';
// import {create} from '@lottiefiles/lottie-interactivity';

export function renderHeader() {
  const headingElement = document.getElementById('header-animation');
  if (headingElement) {
    const jsonPath = headingElement.dataset.jsonPath;
    const jsonAutoplay = headingElement.dataset.jsonAutoplay == 1 ? true : false;
    const jsonLoop = headingElement.dataset.jsonLoop == 1 ? true : false;

    lottie.loadAnimation({
      container: headingElement, // the dom element that will contain the animation
      renderer: 'svg',
      loop: jsonLoop,
      autoplay: jsonAutoplay,
      path: jsonPath, // the path to the animation json
    });
  }
}

export function lottieBlock() {
  const playBtn = document.getElementById('play');
  // const explore = document.getElementById('explore');
  // const plan = document.getElementById('plan');
  const create = document.getElementById('create');

  playBtn.addEventListener('click', function () {
    create.seek('0%');
    create.play();
  });
}
