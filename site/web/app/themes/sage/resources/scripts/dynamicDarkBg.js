export function dynamicBg() {
  const dynamicElements = document.querySelectorAll('.is-style-dynamic');
  const htmlElement = document.querySelector('html');

  let totalEntries = undefined;
  let firstTimeIntersectingEntries = undefined;
  let intersectingEntries = 0;
  let firstLoop = true;

  function loadDynElements(entries) {
    if (typeof totalEntries === 'undefined') {
      totalEntries = entries.length;
    }

    if (typeof firstTimeIntersectingEntries === 'undefined') {
      firstTimeIntersectingEntries = entries.reduce(function (r, a) {
        return r + +(a.isIntersecting === true);
      }, 0);
    }

    // next loops
    //-----------------------------------------------------------------------
    if (!firstLoop) {
      console.log('next', entries);
      entries.forEach((entry, index) => {
        console.log('index: ' + index);
        if (entry.isIntersecting) {
          intersectingEntries++;
        } else {
          intersectingEntries--;
        }

        console.log('totalEntries: ' + totalEntries);
        console.log('is intersecting: ' + entry.isIntersecting);
        console.log('firstTimeIntersectingEntries: ' + firstTimeIntersectingEntries);
        console.log('intersectingEntries: ' + intersectingEntries);

        if (intersectingEntries > 0) {
          htmlElement.classList.add('is-style-dark');
        } else {
          htmlElement.classList.remove('is-style-dark');
        }
      });
    }

    // fist time loop
    //-----------------------------------------------------------------------
    if (firstLoop) {
      entries.forEach((entry) => {
        console.log('first', entries);

        console.log('totalEntries: ' + totalEntries);
        console.log('is intersecting: ' + entry.isIntersecting);
        console.log('firstTimeIntersectingEntries: ' + firstTimeIntersectingEntries);
        console.log('intersectingEntries: ' + intersectingEntries);
      });

      firstLoop = false;

      intersectingEntries = firstTimeIntersectingEntries;

      if (intersectingEntries === 0) {
        htmlElement.classList.remove('is-style-dark');
      } else {
        htmlElement.classList.add('is-style-dark');
      }
    }
  }

  const observerDynElements = new IntersectionObserver(loadDynElements, {
    root: null,
    rootMargin: '-20%',
    // threshold: 0.5,
  });

  dynamicElements.forEach((element) => {
    observerDynElements.observe(element);
  });
}
