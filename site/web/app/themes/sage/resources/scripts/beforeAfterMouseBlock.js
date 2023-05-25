import gsap from 'gsap';
import CustomEase from 'gsap/CustomEase';
gsap.registerPlugin(CustomEase);
const mdMin = window.matchMedia('(min-width: 768px)');

export function beforeAfterMouseBlock() {
  const blocks = document.querySelectorAll('.wp-block-before-after-mouse');
  // let r = document.querySelector(':root');
  // let rs = getComputedStyle(r);
  // console.log(rs.getPropertyValue('--beforeAfterMouseValue'));

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
    const verticalStroke = entry.target.querySelector('.line');
    const middle = entry.target.offsetWidth / 2;

    if (entry.isIntersecting) {
      gsap.to(verticalStroke, {
        x: middle + 'px',
        ease: CustomEase.create('custom', 'M0,0,C0,0,0.446,2,0.634,2,0.772,2,1,1,1,1'),
        duration: 2,
        onComplete: animateBlock(entry.target),
      });
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
      gsap.set(verticalStroke, {
        x: '0px',
      });
    }
  });
}

function animateBlock(block) {
  const imgAfter = block.querySelector('.img-after');
  const blockWidth = block.clientWidth;
  const blockXPos = block.getBoundingClientRect().left;
  const verticalStroke = block.querySelector('.line');

  let localMouseX;
  let percent;

  if (mdMin.matches) {
    block.addEventListener('mousemove', function (event) {
      localMouseX = event.clientX - blockXPos;
      percent = (localMouseX * 100) / blockWidth + '%';

      imgAfter.style.clipPath = `polygon(0% 0, ${percent} 0%, ${percent} 100%, 0 100%)`;
      verticalStroke.style.transform = `translate3d(${localMouseX}px, 0px, 0px)`;
    });
  } else {
    block.addEventListener('touchmove', function (event) {
      console.log(event);
      localMouseX = event.targetTouches[0].clientX - blockXPos;
      percent = (localMouseX * 100) / blockWidth + '%';

      imgAfter.style.clipPath = `polygon(0% 0, ${percent} 0%, ${percent} 100%, 0 100%)`;
      verticalStroke.style.transform = `translate3d(${localMouseX}px, 0px, 0px)`;
    });
  }
}
