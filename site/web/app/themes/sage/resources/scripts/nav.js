import gsap from 'gsap';

export class nav {
  constructor() {
    this.dot = document.getElementById('dot');

    this.openDot();
  }

  openDot() {
    gsap.to(dot, {
      overwrite: true,
      width: 100,
      height: 100,
      ease: 'elastic',
      duration: 1,
    });
  }
}
