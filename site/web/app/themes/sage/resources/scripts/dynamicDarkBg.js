export function dynamicBg() {
  const dynamicElements = document.querySelectorAll('.is-style-dynamic');

  const loadDynElements = (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-style-dark');
      } else {
        entry.target.classList.remove('is-style-dark');
      }
    });
  };

  const observerDynElements = new IntersectionObserver(loadDynElements, {
    root: null,
    rootMargin: '-20%',
    // threshold: 0.5,
  });

  dynamicElements.forEach((article) => {
    observerDynElements.observe(article);
  });
}
