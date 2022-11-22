import gsap from 'gsap';

export function animateProject() {
  setTimeout(function () {
    const articles = document.querySelectorAll('a[role="article"]');
    const bottoms = document.querySelectorAll('.bottom');
    // const imgs = document.querySelectorAll('#main img');

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

    // const loadImgs = (entries) => {
    //   entries.forEach((entry) => {
    //     if (entry.isIntersecting) {
    //       entry.target.classList.add('opacity-100');
    //       entry.target.classList.remove('opacity-0');
    //     } else {
    //       entry.target.classList.remove('opacity-100');
    //       entry.target.classList.add('opacity-0');
    //     }
    //   });
    // };

    const observerBars = new IntersectionObserver(loadBars, {
      root: null,
      rootMargin: '0px',
      // threshold: 0.5,
    });

    // const observerImgs = new IntersectionObserver(loadImgs, {
    //   root: null,
    //   rootMargin: '0px',
    //   // threshold: 0.5,
    // });

    bottoms.forEach((article) => {
      observerBars.observe(article);
    });

    // imgs.forEach((img) => {
    //   observerImgs.observe(img);
    // });
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
}
