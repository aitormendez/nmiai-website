export function cursor() {
  const cursor = document.getElementById('cursor');
  console.log(cursor);

  document.addEventListener('mousemove', function (event) {
    // console.log(event);
    cursor.style.top = event.clientY - 10;
    cursor.style.left = event.clientX - 10;
  });

  // document.addEventListener('mouseover', (e) => {
  //   if (e.target.closest('button') || e.target.closest('a')) {

  //   }
  // });
}
