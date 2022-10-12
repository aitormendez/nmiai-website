import lottie from 'lottie-web';

console.log(lottie);

export function renderTest() {
  const testElement = document.getElementById('test');

  lottie.loadAnimation({
    container: testElement, // the dom element that will contain the animation
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '/app/themes/sage/resources/scripts/json/data-2.json', // the path to the animation json
  });
}
