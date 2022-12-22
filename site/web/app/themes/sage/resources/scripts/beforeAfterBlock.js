export function beforeAfterBlock() {
  const beforeafterBlocks = document.querySelectorAll('.wp-block-before-after');

  console.log(beforeafterBlocks);

  beforeafterBlocks.forEach(function (block) {
    console.log(block);
    const slider = block.querySelector('input');
    const imgAfter = block.querySelector('.img-after');

    console.log(slider);
    slider.oninput = function () {
      console.log(this.value);
      imgAfter.style.opacity = this.value / 100;
    };
  });
}
