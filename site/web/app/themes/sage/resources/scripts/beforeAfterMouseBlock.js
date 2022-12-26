import gsap from 'gsap';
import CustomEase from 'gsap/CustomEase';
gsap.registerPlugin(CustomEase);

export function beforeAfterMouseBlock() {
  const blocks = document.querySelectorAll('.wp-block-before-after-mouse');
  let r = document.querySelector(':root');
  let rs = getComputedStyle(r);
  console.log(rs.getPropertyValue('--beforeAfterMouseValue'));

  if (blocks) {
    // blocks.forEach(function (block) {
    //   animateBlock(block);
    // });

    const observerBlocks = new IntersectionObserver(loadBlocks, {
      root: null,
      rootMargin: '0px',
      threshold: 0.5,
    });

    blocks.forEach((block) => {
      observerBlocks.observe(block);
    });
  }
}

function loadBlocks(entries) {
  entries.forEach((entry) => {
    const imgAfter = entry.target.querySelector('.img-after');

    if (entry.isIntersecting) {
      gsap.to(imgAfter, {
        clipPath: `polygon(0% 0, 50% 0%, 50% 100%, 0 100%)`,
        ease: CustomEase.create('custom', 'M0,0,C0,0,0.446,2,0.634,2,0.772,2,1,1,1,1'),
        duration: 2,
        onComplete: animateBlock(entry.target),
      });
    } else {
      gsap.set(imgAfter, {
        clipPath: `polygon(0% 0, 0% 0%, 0% 100%, 0 100%)`,
      });
    }
  });
}

function animateBlock(block) {
  const imgAfter = block.querySelector('.img-after');
  const blockWidth = block.clientWidth;
  const blockXPos = block.getBoundingClientRect().left;
  let localMouseX;
  let percent;

  block.addEventListener('mousemove', function (event) {
    localMouseX = event.clientX - blockXPos;
    percent = (localMouseX * 100) / blockWidth + '%';

    imgAfter.style.clipPath = `polygon(0% 0, ${percent} 0%, ${percent} 100%, 0 100%)`;
  });
}
