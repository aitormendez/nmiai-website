export function people() {
  const peopleBlocks = document.querySelectorAll('.wp-block-people');
  const mainFlap = document.querySelector('#main-flap');
  const mainFlapContent = document.querySelector('.flap-content');
  const closeBtn = mainFlap.querySelector('button');
  console.log(closeBtn);

  peopleBlocks.forEach(function (block) {
    let peopleText = block.querySelector('.text').innerHTML;
    let peopleName = block.querySelector('.name').innerHTML;

    block.addEventListener('click', () => {
      mainFlap.classList.remove('hidden');
      mainFlap.classList.add('flex');
      mainFlapContent.innerHTML =
        '<p class="text-3xl md:text-6xl my-20">' + peopleName + '</p><div>' + peopleText + '</div>';
      setTimeout(function () {
        mainFlap.classList.add('opacity-100');
        mainFlap.classList.remove('opacity-0');
      }, 10);
    });
  });

  closeBtn.addEventListener('click', () => {
    mainFlap.classList.add('opacity-0');
    mainFlap.classList.remove('opacity-100');
    setTimeout(function () {
      mainFlap.classList.remove('flex');
      mainFlap.classList.add('hidden');
    }, 500);
  });
}
