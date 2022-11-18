export function dynamicBg() {
  const dynamicElements = document.querySelectorAll('.is-style-dynamic');
  const htmlElement = document.querySelector('html');

  const loadDynElements = (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        console.log(htmlElement);
        htmlElement.classList.add('is-style-dark');
      } else {
        htmlElement.classList.remove('is-style-dark');
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
