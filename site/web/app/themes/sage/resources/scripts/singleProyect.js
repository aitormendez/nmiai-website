import gsap from 'gsap';

export function displayProjectInfo() {
  let box = document.querySelector('.info-content'),
    button = document.querySelector('.project-info button'),
    isOpen = false;

  console.log(button);

  let open = () => {
    if (!isOpen) {
      isOpen = true;
      gsap.to(box, {
        height: 'auto',
        duration: 0.8,
        overwrite: true,
        ease: 'power4.out',
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
    }
  };

  button.addEventListener('click', () => (isOpen ? close() : open()));
}
