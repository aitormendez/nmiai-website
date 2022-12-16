import gsap from 'gsap';

export function cursor() {
  const cursor = document.getElementById('cursor');
  const cursorCircle = cursor.querySelector('circle');
  // let w = window.innerWidth;
  // let h = window.innerHeight;

  // window.onresize = function () {
  //   w = window.innerWidth;
  //   h = window.innerHeight;
  // };

  document.addEventListener('mousemove', function (event) {
    cursor.style.top = event.clientY - 20 + 'px';
    cursor.style.left = event.clientX - 20 + 'px';

    // if (event.clientX >= 5 && event.clientX <= w - 25 && event.clientY >= 1 && event.clientY <= h - 5) {
    //   displayCursor();
    // } else {
    //   hiddeCursor();
    // }
  });

  window.addEventListener('mouseover', displayCursor);
  window.addEventListener('mouseout', hiddeCursor);

  document.addEventListener('mouseover', (e) => {
    if (e.target.closest('button') || e.target.closest('a')) {
      over();
    }
  });

  document.addEventListener('mouseout', (e) => {
    if (e.target.closest('button') || e.target.closest('a')) {
      out();
    }
  });

  function over() {
    gsap.to(cursorCircle, {
      r: '8',
      fill: '#fff',
      stroke: '#000',
      duration: '0.2',
    });
  }

  function out() {
    gsap.to(cursorCircle, {
      r: '18',
      fill: '#000',
      stroke: '#fff',
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
