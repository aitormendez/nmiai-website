// import gsap from 'gsap';

export function progressBar() {
  setTimeout(function () {
    const bars = document.querySelectorAll('.progress-bar');
    const imgs = document.querySelectorAll('#main img');

    const loadBars = (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('w-full');
          entry.target.classList.remove('w-0');
        } else {
          entry.target.classList.remove('w-full');
          entry.target.classList.add('w-0');
        }
      });
    };

    const loadImgs = (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('opacity-100');
          entry.target.classList.remove('opacity-0');
        } else {
          entry.target.classList.remove('opacity-100');
          entry.target.classList.add('opacity-0');
        }
      });
    };

    const observerBars = new IntersectionObserver(loadBars, {
      root: null,
      rootMargin: '0px',
      // threshold: 1.0,
    });

    const observerImgs = new IntersectionObserver(loadImgs, {
      root: null,
      rootMargin: '0px',
      // threshold: 1.0,
    });

    bars.forEach((bar) => {
      observerBars.observe(bar);
    });

    imgs.forEach((img) => {
      observerImgs.observe(img);
    });
  }, 300);
}
