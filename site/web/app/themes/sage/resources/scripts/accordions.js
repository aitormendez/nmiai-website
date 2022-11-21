import gsap from 'gsap';

export function accordion() {
  const menus = gsap.utils.toArray('.accordion-menu');
  console.log(menus);
  let openMenu;

  menus.forEach((menu) => {
    let box = menu.parentNode.querySelector('.accordion-content'),
      items = box.querySelectorAll('li'),
      isOpen = false;

    gsap.set(items, {y: -30});

    menu.open = () => {
      if (!isOpen) {
        isOpen = true;
        openMenu && openMenu.close();
        openMenu = menu;
        gsap.to(box, {
          height: 'auto',
          duration: 1,
          ease: 'elastic',
          overwrite: true,
        });
        gsap.to(items, {
          y: 0,
          overwrite: true,
          duration: 1.5,
          stagger: 0.1,
          ease: 'elastic',
        });
      }
    };

    menu.close = () => {
      if (isOpen) {
        isOpen = false;
        openMenu = null;
        gsap.to(box, {
          height: 0,
          overwrite: true,
          onComplete: () => gsap.set(items, {y: -30, overwrite: true}),
        });
      }
    };

    menu.addEventListener('click', () => (isOpen ? menu.close() : menu.open()));
  });
}
