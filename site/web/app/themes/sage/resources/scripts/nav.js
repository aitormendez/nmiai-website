import gsap from 'gsap';
// import tailwindConfig from '../../tailwind.config.cjs';

export class nav {
  constructor() {
    this.closed = true;
    this.btnDot = document.getElementById('btnDot');
    this.mainMenu = document.getElementById('main-menu');
    this.itemsMenu = this.mainMenu.querySelectorAll('li');
    this.radio = Math.round(Math.hypot(window.innerWidth, window.innerHeight));
    this.banner = document.getElementById('banner');
    this.tagLine = document.getElementById('tagline');
    this.langMenu = document.getElementById('lang-menu');
    this.body = document.querySelector('body');
    this.scroll = '';
    this.oldValue = 0;
    this.newValue = 0;
    this.oldDirection = 'up';
    this.direction = '';
    this.mdMin = window.matchMedia('(min-width: 768px)');
    this.doc = document.querySelector('html');
    this.hideInMenuOpen = document.querySelectorAll('.hide-in-menu-open');
    this.burgerIcon = document.querySelectorAll('.burger-icon');

    if (this.mdMin.matches) {
      this.circlePosition = 'calc(100vw - 3.75rem)';
    } else {
      this.circlePosition = 'calc(100vw - 2rem)';
    }

    this.btnDot.addEventListener('click', () => {
      this.closed ? this.openDot() : this.closeDot();
    });

    window.addEventListener('resize', () => {
      this.radio = Math.round(Math.hypot(window.innerWidth, window.innerHeight));
    });

    this.detectScroll();

    gsap.set(this.itemsMenu, {
      y: '50px',
      opacity: '0',
    });
  }

  preventScroll(e) {
    e.preventDefault();
    e.stopPropagation();

    return false;
  }

  openDot() {
    gsap.to(this.mainMenu, {
      overwrite: true,
      clipPath: `circle(${this.radio}px at ${this.circlePosition} 2.5rem)`,
      duration: 0.5,
    });

    gsap.to(this.itemsMenu, {
      y: '0',
      opacity: '1',
      stagger: '0.2',
    });

    gsap.to(this.btnDot, {
      overwrite: true,
      backgroundColor: 'white',
      duration: 0.5,
    });

    this.doc.addEventListener('wheel', this.preventScroll, {
      passive: false,
    });

    this.banner.classList.remove('text-dark');
    this.banner.classList.add('text-white');
    this.banner.classList.add('!bg-none');
    this.banner.classList.add('opacity-100');
    this.banner.classList.remove('opacity-0');
    this.tagLine.classList.add('md:hidden');
    this.tagLine.classList.remove('md:block');
    this.langMenu.classList.remove('hidden');
    // this.body.classList.add('overflow-hidden');
    // this.body.classList.add('w-screen');
    this.body.classList.add('h-screen');

    this.hideInMenuOpen.forEach((element) => {
      element.classList.add('hidden');
    });

    this.burgerIcon.forEach((element) => {
      element.classList.remove('hidden');
    });

    this.closed = false;
  }

  closeDot() {
    this.doc.removeEventListener('wheel', this.preventScroll);

    gsap.to(this.mainMenu, {
      overwrite: true,
      clipPath: `circle(0px at ${this.circlePosition} 2.25rem)`,
      duration: 0.5,
    });

    gsap.to(this.itemsMenu, {
      y: '50px',
      opacity: '0',
    });

    gsap.to(this.btnDot, {
      overwrite: true,
      // backgroundColor: tailwindConfig.theme.colors.dark,
      duration: 0.5,
      onComplete: () => {
        this.tagLine.classList.remove('md:hidden');
        this.tagLine.classList.add('md:block');
        this.banner.classList.remove('bg-none');
        this.langMenu.classList.add('hidden');
      },
    });

    this.banner.classList.add('text-dark');
    this.banner.classList.remove('text-white');
    // this.body.classList.remove('overflow-hidden');
    // this.body.classList.remove('w-screen');
    this.body.classList.remove('h-screen');

    this.hideInMenuOpen.forEach((element) => {
      element.classList.remove('hidden');
    });

    this.burgerIcon.forEach((element) => {
      element.classList.add('hidden');
    });

    this.closed = true;
  }

  detectScroll() {
    window.addEventListener('scroll', () => {
      this.newValue = window.pageYOffset;

      if (this.oldValue < this.newValue && this.newValue > 100) {
        this.direction = 'down';
      } else if (this.oldValue > this.newValue) {
        this.direction = 'up';
      }

      if (this.oldDirection !== this.direction && this.direction === 'down') {
        // this.removeBannerGradient();
        this.banner.classList.add('opacity-0');
        this.banner.classList.remove('opacity-100');
        this.tagLine.classList.add('opacity-0');
        this.tagLine.classList.remove('opacity-100');
      }

      if (this.oldDirection !== this.direction && this.direction === 'up') {
        // this.addBannerGradient();
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
