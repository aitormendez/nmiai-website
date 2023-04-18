import {gsap} from 'gsap';
import {CustomEase} from 'gsap/all';
gsap.registerPlugin(CustomEase);

export function slotMachine() {
  const slotMachine = document.getElementById('slot-machine-content');
  const slotNum = Math.floor(Math.random() * 19);
  console.log(slotNum);
  const slot = 32 * (slotNum + 20) - 30;

  gsap.to(slotMachine, {
    y: -slot,
    ease: CustomEase.create(
      'custom',
      'M0,0 C0,0 0.152,0.074 0.278,0.35 0.39,0.596 0.348,1.045 0.562,1.046 0.636,1.046 0.626,0.966 0.668,0.966 0.702,0.966 0.704,1.02 0.734,1.02 0.762,1.02 0.764,0.976 0.796,0.976 0.828,0.976 0.847,0.984 0.876,0.988 0.964,1 1,1 1,1 ',
    ),
    duration: 5,
  });
}
