import gsap from 'gsap';

export function cursor() {
  const cursor = document.getElementById('cursor');
  const cursorCircle = cursor.querySelector('circle');

  document.addEventListener('mousemove', function (event) {
    console.log(event.clientY);
    console.log(cursor.style.top);
    cursor.style.top = event.clientY - 20;
    cursor.style.left = event.clientX - 20;
  });

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
    console.log('mouseover');
    // cursorCircle.setAttribute('r', 10);
    console.log(cursorCircle);

    gsap.to(cursorCircle, {
      r: '8',
      fill: '#fff',
      stroke: '#000',
      duration: '0.2',
    });
  }

  function out() {
    console.log('mouseout');
    // cursorCircle.setAttribute('r', 20);
    gsap.to(cursorCircle, {
      r: '18',
      fill: '#000',
      stroke: '#fff',
      duration: '0.2',
    });
  }
}
