import gsap from 'gsap';

export function cursor() {
  const cursor = document.getElementById('cursor');
  const cursorCircle = cursor.querySelector('circle');
  const cursorArrow = cursor.querySelector('#cursor-arrow');
  let dir;
  // let w = window.innerWidth;
  // let h = window.innerHeight;

  // window.onresize = function () {
  //   w = window.innerWidth;
  //   h = window.innerHeight;
  // };

  document.addEventListener('mousemove', function (event) {
    cursor.style.top = event.clientY - 30 + 'px';
    cursor.style.left = event.clientX - 30 + 'px';

    // if (event.clientX >= 5 && event.clientX <= w - 25 && event.clientY >= 1 && event.clientY <= h - 5) {
    //   displayCursor();
    // } else {
    //   hiddeCursor();
    // }
  });

  window.addEventListener('mouseover', displayCursor);
  window.addEventListener('mouseout', hiddeCursor);

  document.addEventListener('mouseover', (e) => {
    if (e.target.classList.contains('swiper-button-prev')) {
      dir = 'prev';
      overBlockQuotes(dir);
    } else if (e.target.classList.contains('swiper-button-next')) {
      dir = 'next';
      overBlockQuotes(dir);
    } else if (e.target.closest('button') || e.target.closest('a') || e.target.closest('input')) {
      over();
    }
  });

  document.addEventListener('mouseout', (e) => {
    if (e.target.classList.contains('swiper-button')) {
      outBlockQuotes();
    } else if (e.target.closest('button') || e.target.closest('a') || e.target.closest('input')) {
      out();
    }
  });

  function overBlockQuotes(direction) {
    direction === 'prev' ? cursorArrowToPrev() : cursorArrowToNext();

    cursorArrow.classList.remove('hidden');

    gsap.to(cursorCircle, {
      attr: {
        r: '28',
        fill: '#fff',
        stroke: '#000',
      },
      duration: '0.2',
    });
  }

  function outBlockQuotes() {
    cursorArrow.classList.add('hidden');

    gsap.to(cursorCircle, {
      attr: {
        r: '18',
        fill: '#000',
        stroke: '#fff',
      },
      duration: '0.2',
    });
  }

  function cursorArrowToPrev() {
    gsap.to(cursorArrow, {
      x: '-30',
      duration: '0.2',
    });
  }

  function cursorArrowToNext() {
    gsap.to(cursorArrow, {
      x: '30',
      duration: '0.2',
    });
  }

  function over() {
    gsap.to(cursorCircle, {
      attr: {
        r: '8',
        fill: '#fff',
        stroke: '#000',
      },
      duration: '0.2',
    });
  }

  function out() {
    gsap.to(cursorCircle, {
      attr: {
        r: '18',
        fill: '#000',
        stroke: '#fff',
      },
      duration: '0.2',
    });
  }

  function displayCursor() {
    cursor.style.display = 'block';
  }

  function hiddeCursor() {
    cursor.style.display = 'none';
  }
}
