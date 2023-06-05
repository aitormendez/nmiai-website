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

const explore = document.getElementById('explore');
const plan = document.getElementById('plan');
const create = document.getElementById('create');

export function lottieWhatWeDoPageMobile() {
  explore.load(window.location.origin + '/app/uploads/2023/05/explore-1.json');
  plan.load(window.location.origin + '/app/uploads/2023/05/plan-1.json');
  create.load(window.location.origin + '/app/uploads/2023/05/create-1.json');

  const animations = [explore, plan, create];

  const observerAnim = new IntersectionObserver(loadAnimationsMobile, {
    root: null,
    // rootMargin: '100px',
    // threshold: 0.5,
  });

  animations.forEach(function (anim) {
    observerAnim.observe(anim);
  });

  function loadAnimationsMobile(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.play();
      } else {
        entry.target.seek('0%');
        entry.target.stop();
      }
    });
  }
}

export function lottieWhatWeDoPageDesktop() {
  let frPlan = 0;
  let frameExplore = 0;

  explore.load(window.location.origin + '/app/uploads/2023/05/explore-1.json');
  plan.load(window.location.origin + '/app/uploads/2023/05/plan-1.json');
  create.load(window.location.origin + '/app/uploads/2023/05/create-1.json');

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

  const observerAnim = new IntersectionObserver(loadAnimationsDesktop, {
    root: null,
    // rootMargin: '100px',
    // threshold: 0.5,
  });

  observerAnim.observe(explore);

  function loadAnimationsDesktop(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        frameExplore = 0;
        explore.seek('0%');
        plan.seek('0%');
        plan.stop('0%');
        create.seek('0%');
        create.stop('0%');
        explore.play();
      } else {
        frameExplore = 0;
        explore.seek('0%');
        explore.stop();
        plan.seek('0%');
        plan.stop('0%');
        create.seek('0%');
        create.stop('0%');
      }
    });
  }
}
