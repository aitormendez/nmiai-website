import {gsap} from 'gsap';
import {CustomEase} from 'gsap/all';
gsap.registerPlugin(CustomEase);

export function slotMachine() {
  const slotMachine = document.getElementById('slot-machine-content');
  const slotNum = Math.floor(Math.random() * 14);
  console.log(slotNum);
  const slot = 32 * (slotNum + 15) - 30;

  gsap.to(slotMachine, {
    y: -slot,
    ease: CustomEase.create(
      'custom',
      'M0,0 C0.126,0.382 0.451,1.031 0.668,1.032 0.756,1.032 0.742,0.978 0.804,0.978 0.844,0.978 0.873,1.013 0.926,1.014 0.968,1.014 1,1 1,1 ',
    ),
    duration: 3,
  });
}
