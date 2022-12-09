import gsap from 'gsap';

export function animateProject() {
  setTimeout(function () {
    const articles = document.querySelectorAll('a[role="article"]');
    const bottoms = document.querySelectorAll('.bottom');
    const fades = document.querySelectorAll('.fade');

    gsap.set('.fade', {
      y: '50px',
      opacity: '0',
    });

    articles.forEach((article) => {
      const termsText = article.querySelector('.terms');

      if (termsText) {
        article.addEventListener('mouseenter', () => {
          termsText.classList.add('opacity-100');
          termsText.classList.remove('opacity-0');
        });

        article.addEventListener('mouseleave', () => {
          termsText.classList.add('opacity-0');
          termsText.classList.remove('opacity-100');
        });
      }
    });

    const loadBars = (entries) => {
      entries.forEach((entry) => {
        const bar = entry.target.querySelector('.progress-bar');
        const endText = entry.target.querySelector('.end-text');

        if (entry.isIntersecting) {
          growBar(bar, endText);
        } else {
          shrinkBar(bar, endText);
        }
      });
    };

    const loadFades = (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // entry.target.style.opacity = '1';
          fadeIn(entry.target);
        } else {
          // entry.target.style.opacity = '0';
          fadeOut(entry.target);
        }
      });
    };

    const observerBars = new IntersectionObserver(loadBars, {
      root: null,
      // rootMargin: '0px',
      // threshold: 0.5,
    });

    const observerFade = new IntersectionObserver(loadFades, {
      root: null,
      // rootMargin: '100px',
      // threshold: 0.5,
    });

    bottoms.forEach((article) => {
      observerBars.observe(article);
    });

    fades.forEach((fade) => {
      observerFade.observe(fade);
    });
  }, 300);

  const growBar = (bar, endText) => {
    let tl = gsap.timeline({repeat: 0});

    tl.to(bar, {
      width: '100%',
      duration: '2',
    });

    tl.to(
      endText,
      {
        opacity: '1',
        duration: '2',
      },
      '-=1',
    );
  };

  const shrinkBar = (bar, endText) => {
    let tl = gsap.timeline({repeat: 0});

    tl.to(bar, {
      width: '0',
      duration: '2',
    });

    tl.to(endText, {
      opacity: '0.4',
      duration: '0.3',
    });
  };

  const fadeIn = (fade) => {
    gsap.to(fade, {
      y: '0',
      opacity: '1',
      duration: '2',
      overwrite: true,
      ease: 'power4.out',
    });
  };

  const fadeOut = (fade) => {
    gsap.set(fade, {
      y: '50px',
      opacity: '0',
      overwrite: true,
    });
  };
}
