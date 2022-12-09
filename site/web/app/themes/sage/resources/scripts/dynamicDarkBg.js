export function dynamicBg() {
  const dynamicElements = document.querySelectorAll('.is-style-dynamic');
  const htmlElement = document.querySelector('html');
  const banner = document.getElementById('banner');

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
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          intersectingEntries++;
        } else {
          intersectingEntries--;
        }

        // console.log('totalEntries: ' + totalEntries);
        // console.log('is intersecting: ' + entry.isIntersecting);
        // console.log('firstTimeIntersectingEntries: ' + firstTimeIntersectingEntries);
        // console.log('intersectingEntries: ' + intersectingEntries);

        if (intersectingEntries > 0) {
          htmlElement.classList.add('is-style-dark');
          banner.classList.add('from-dark');
          banner.classList.remove('from-white');
        } else {
          htmlElement.classList.remove('is-style-dark');
          banner.classList.add('from-white');
          banner.classList.remove('from-dark');
        }
      });
    }

    // fist time loop
    //-----------------------------------------------------------------------
    if (firstLoop) {
      // entries.forEach(() => {
      //   console.log('first', entries);
      //   console.log('totalEntries: ' + totalEntries);
      //   console.log('is intersecting: ' + entry.isIntersecting);
      //   console.log('firstTimeIntersectingEntries: ' + firstTimeIntersectingEntries);
      //   console.log('intersectingEntries: ' + intersectingEntries);
      // });

      firstLoop = false;

      intersectingEntries = firstTimeIntersectingEntries;

      if (intersectingEntries === 0) {
        htmlElement.classList.remove('is-style-dark');
        banner.classList.add('from-white');
        banner.classList.remove('from-dark');
      } else {
        htmlElement.classList.add('is-style-dark');
        banner.classList.add('from-dark');
        banner.classList.remove('from-white');
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
