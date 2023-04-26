import {gsap} from 'gsap';

export function people() {
  const peopleBlocks = document.querySelectorAll('.wp-block-people');
  if (peopleBlocks.length > 0) {
    const mainFlap = document.querySelector('#main-flap');
    const mainFlapContent = document.querySelector('.flap-content');
    const mainFlapCloseBtn = document.querySelector('button svg');
    console.log(mainFlapCloseBtn);
    const closeBtn = mainFlap.querySelector('button');
    const body = document.querySelector('body');

    mainFlapCloseBtn.addEventListener('mouseenter', () => {
      gsap.to(mainFlapCloseBtn, {
        rotation: 360,
      });
    });

    mainFlapCloseBtn.addEventListener('mouseleave', () => {
      gsap.to(mainFlapCloseBtn, {
        rotation: 0,
      });
    });

    peopleBlocks.forEach(function (block) {
      let peopleText = block.querySelector('.text').innerHTML;
      let peopleName = block.querySelector('.name').innerHTML;
      let peopleTitle = block.querySelector('.title').innerHTML;
      let peopleEmail = block.querySelector('.email').innerHTML;

      block.addEventListener('click', () => {
        mainFlap.classList.remove('hidden');
        body.classList.remove('overflow-hidden');
        body.classList.remove('w-screen');
        body.classList.remove('h-screen');
        mainFlap.classList.add('flex');
        mainFlapContent.innerHTML =
          '<div class="text-[46px] md:text-6xl mt-20 mb-4 leading-tight text-light">' +
          peopleName +
          '</div>' +
          '<div class="font-serif text-light text-xl italic mb-4">' +
          peopleTitle +
          '</div>' +
          '<div class="font-serif">' +
          peopleText +
          '</div>' +
          '<div class="text-light font-thin mt-4">' +
          peopleEmail +
          '</div>';
        setTimeout(function () {
          mainFlap.classList.add('opacity-100');
          mainFlap.classList.remove('opacity-0');
          body.classList.add('overflow-hidden');
          body.classList.add('w-screen');
          body.classList.add('h-screen');
        }, 10);
      });
    });

    closeBtn.addEventListener('click', () => {
      mainFlap.classList.add('opacity-0');
      mainFlap.classList.remove('opacity-100');
      body.classList.remove('overflow-hidden');
      body.classList.remove('w-screen');
      body.classList.remove('h-screen');
      setTimeout(function () {
        mainFlap.classList.remove('flex');
        mainFlap.classList.add('hidden');
      }, 500);
    });
  }
}
