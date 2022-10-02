import gsap from 'gsap';
import tailwindConfig from '../../tailwind.config.cjs';

export class nav {
  constructor() {
    this.closed = true;
    this.btnDot = document.getElementById('btnDot');
    this.mainMenu = document.getElementById('main-menu');
    this.radio = Math.round(Math.hypot(window.innerWidth, window.innerHeight));
    this.header = document.getElementById('banner');

    this.btnDot.addEventListener('click', () => {
      this.closed ? this.openDot() : this.closeDot();
    });

    window.addEventListener('resize', () => {
      this.radio = Math.round(Math.hypot(window.innerWidth, window.innerHeight));
    });

    this.detectScroll();
  }

  openDot() {
    gsap.to(this.mainMenu, {
      overwrite: true,
      clipPath: `circle(${this.radio}px at calc(100vw - 2rem) 1.5rem)`,
      duration: 0.5,
    });

    gsap.to(this.btnDot, {
      overwrite: true,
      backgroundColor: 'white',
      duration: 0.5,
    });

    this.header.classList.remove('text-dark');
    this.header.classList.add('text-white');

    this.closed = false;
  }

  closeDot() {
    gsap.to(this.mainMenu, {
      overwrite: true,
      clipPath: 'circle(0.5rem at calc(100vw - 2rem) 1.5rem)',
      duration: 0.5,
    });

    gsap.to(this.btnDot, {
      overwrite: true,
      backgroundColor: tailwindConfig.theme.colors.dark,
      duration: 0.5,
    });

    this.header.classList.add('text-dark');
    this.header.classList.remove('text-white');

    this.closed = true;
  }

  detectScroll() {
    let oldValue = 0;
    let newValue = 0;
    window.addEventListener('scroll', () => {
      newValue = window.pageYOffset;
      if (oldValue < newValue) {
        console.log('Up');
      } else if (oldValue > newValue) {
        console.log('Down');
      }
      oldValue = newValue;
    });
  }
}
