import {gsap} from 'gsap';

export function slotMachine() {
  const slotMachine = document.getElementById('slot-machine-content');
  const slotNum = Math.floor(Math.random() * 39);
  console.log(slotNum);
  const slot = 32 * slotNum - 30;

  gsap.to(slotMachine, {
    y: -slot,
    ease: 'elastic',
    duration: 3,
  });
}
