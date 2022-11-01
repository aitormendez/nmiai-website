import lottie from 'lottie-web';

export function renderHeader() {
  const headingElement = document.getElementById('header-animation');
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
