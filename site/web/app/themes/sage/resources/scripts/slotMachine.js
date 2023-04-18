import {gsap} from 'gsap';
import {CustomEase} from 'gsap/all';

export function slotMachine() {
  const slotMachine = document.getElementById('slot-machine-content');
  const slotNum = Math.floor(Math.random() * 19);
  console.log(slotNum + 20);
  const slot = 32 * slotNum - 30;

  gsap.to(slotMachine, {
    y: -slot,
    ease: CustomEase.create(
      'custom',
      'M0,0 C0,0 0.652,1.099 0.716,1.1 0.764,1.1 0.78,0.946 0.822,0.946 0.856,0.946 0.856,1.038 0.886,1.038 0.914,1.038 0.928,0.986 0.96,0.986 0.986,0.986 1,1 1,1 ',
    ),
    duration: 3,
  });
}
