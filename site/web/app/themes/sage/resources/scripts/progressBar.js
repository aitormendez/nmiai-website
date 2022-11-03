// import gsap from 'gsap';

export function progressBar() {
  setTimeout(function () {
    const bars = document.querySelectorAll('.progress-bar');

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

    const observer = new IntersectionObserver(loadBars, {
      root: null,
      rootMargin: '0px',
      // threshold: 1.0,
    });

    bars.forEach((bar) => {
      observer.observe(bar);
    });
  }, 300);
}
