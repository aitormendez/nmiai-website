import gsap from 'gsap';

export function accordion() {
  const menus = gsap.utils.toArray('.accordion-menu');
  let openMenu;

  menus.forEach((menu) => {
    let box = menu.parentNode.querySelector('.accordion-content'),
      items = box.querySelectorAll('li'),
      isOpen = false,
      spin = menu.querySelector('.spin');

    gsap.set(spin, {rotation: 90});

    menu.open = () => {
      if (!isOpen) {
        isOpen = true;
        openMenu && openMenu.close();
        openMenu = menu;
        gsap.to(box, {
          height: 'auto',
          duration: 2,
          overwrite: true,
          ease: 'power4.out',
        });
        gsap.to(spin, {
          rotation: '0',
          duration: 2,
          overwrite: true,
        });
      }
    };

    menu.close = () => {
      if (isOpen) {
        isOpen = false;
        openMenu = null;
        gsap.to(box, {
          height: 0,
          duration: 2,
          overwrite: true,
          ease: 'power4.out',
          onComplete: () => gsap.set(items, {y: -30, overwrite: true}),
        });
        gsap.to(spin, {
          rotation: '90',
          duration: 2,
          overwrite: true,
        });
      }
    };

    menu.addEventListener('click', () => (isOpen ? menu.close() : menu.open()));
  });
}
