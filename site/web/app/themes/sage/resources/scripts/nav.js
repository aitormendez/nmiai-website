import gsap from 'gsap';
// import tailwindConfig from '../../tailwind.config.cjs';

export class nav {
  constructor() {
    this.closed = true;
    this.btnDot = document.getElementById('btnDot');
    this.mainMenu = document.getElementById('main-menu');
    this.radio = Math.round(Math.hypot(window.innerWidth, window.innerHeight));
    this.banner = document.getElementById('banner');
    this.tagLine = document.getElementById('tagline');
    this.scroll = '';
    this.oldValue = 0;
    this.newValue = 0;
    this.oldDirection = 'down';
    this.direction = '';

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
      clipPath: `circle(${this.radio}px at calc(100vw - 3rem) 1.5rem)`,
      duration: 0.5,
    });

    gsap.to(this.btnDot, {
      overwrite: true,
      backgroundColor: 'white',
      duration: 0.5,
    });

    this.banner.classList.remove('text-dark');
    this.banner.classList.add('text-white');

    this.closed = false;
  }

  closeDot() {
    gsap.to(this.mainMenu, {
      overwrite: true,
      clipPath: 'circle(0px at calc(100vw - 3rem) 1.5rem)',
      duration: 0.5,
    });

    gsap.to(this.btnDot, {
      overwrite: true,
      // backgroundColor: tailwindConfig.theme.colors.dark,
      duration: 0.5,
    });

    this.banner.classList.add('text-dark');
    this.banner.classList.remove('text-white');

    this.closed = true;
  }

  detectScroll() {
    window.addEventListener('scroll', () => {
      this.newValue = window.pageYOffset;

      if (this.oldValue < this.newValue) {
        this.direction = 'down';
      } else if (this.oldValue > this.newValue) {
        this.direction = 'up';
      }

      if (this.oldDirection !== this.direction && this.direction === 'down') {
        this.removeBannerGradient();
        this.banner.classList.add('opacity-0');
        this.banner.classList.remove('opacity-100');
        this.tagLine.classList.add('opacity-0');
        this.tagLine.classList.remove('opacity-100');
      }

      if (this.oldDirection !== this.direction && this.direction === 'up') {
        this.addBannerGradient();
        this.banner.classList.add('opacity-100');
        this.banner.classList.remove('opacity-0');
        this.tagLine.classList.add('opacity-100');
        this.tagLine.classList.remove('opacity-0');
      }

      this.oldValue = this.newValue;
      this.oldDirection = this.direction;
    });
  }

  addBannerGradient() {
    gsap.fromTo(
      this.banner,
      {
        backgroundImage: 'linear-gradient(180deg, rgba(255, 255, 255, 0) 36%, rgba(255, 255, 255, 0) 100%)',
      },
      {
        backgroundImage: 'linear-gradient(180deg, rgba(255, 255, 255, 1) 36%, rgba(255, 255, 255, 0) 100%)',
        duration: 1,
      },
    );
  }

  removeBannerGradient() {
    gsap.fromTo(
      this.banner,
      {
        backgroundImage: 'linear-gradient(180deg, rgba(255, 255, 255, 1) 36%, rgba(255, 255, 255, 0) 100%)',
      },
      {
        backgroundImage: 'linear-gradient(180deg, rgba(255, 255, 255, 0) 36%, rgba(255, 255, 255, 0) 100%)',
        duration: 1,
      },
    );
  }
}
