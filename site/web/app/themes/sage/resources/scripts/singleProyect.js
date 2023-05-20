import gsap from 'gsap';

export function displayProjectInfo() {
  let box = document.querySelector('.info-content'),
    button = document.querySelector('.project-info button'),
    plusSign = document.querySelector('.plus-sign'),
    isOpen = false;

  let open = () => {
    if (!isOpen) {
      isOpen = true;
      gsap.to(box, {
        height: 'auto',
        duration: 0.8,
        overwrite: true,
        ease: 'power4.out',
      });
      gsap.to(plusSign, {
        rotation: 45,
        duration: 0.4,
        overwrite: true,
      });
    }
  };

  let close = () => {
    if (isOpen) {
      isOpen = false;
      gsap.to(box, {
        height: 0,
        duration: 0.8,
        overwrite: true,
        ease: 'power4.out',
      });
      gsap.to(plusSign, {
        rotation: 0,
        duration: 0.4,
        overwrite: true,
      });
    }
  };

  button.addEventListener('click', () => (isOpen ? close() : open()));
}
