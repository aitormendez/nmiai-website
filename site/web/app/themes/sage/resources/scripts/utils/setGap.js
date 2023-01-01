export function setGap() {
  const viewportWidth = document.documentElement.clientWidth;
  const gap = ((viewportWidth - 72) * 1.2) / 100;
  const r = document.querySelector(':root');
  // let rs = getComputedStyle(r);
  // console.log(rs.getPropertyValue('--beforeAfterMouseValue'));
  r.style.setProperty('--margin-gap', `${gap}px`);
}

window.addEventListener('resize', () => {
  setGap();
});
