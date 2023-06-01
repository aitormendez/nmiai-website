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
  const explore = document.getElementById('explore');
  const plan = document.getElementById('plan');
  const create = document.getElementById('create');
  let frPlan = 0;
  let frameExplore = 0;

  explore.load('http://192.168.1.128:3000/app/uploads/2023/05/explore-1.json');
  plan.load('http://192.168.1.128:3000/app/uploads/2023/05/plan-1.json');
  create.load('http://192.168.1.128:3000/app/uploads/2023/05/create-1.json');

  explore.addEventListener('frame', () => {
    frameExplore = ++frameExplore;

    if (frameExplore === 110) {
      frPlan = 0;
      plan.seek('0%');
      plan.play();
    }
  });

  plan.addEventListener('frame', () => {
    frPlan = ++frPlan;

    if (frPlan === 110) {
      create.seek('0%');
      create.play();
    }
  });

  playBtn.addEventListener('click', () => {
    frameExplore = 0;
    explore.seek('0%');
    explore.play();
  });
}
