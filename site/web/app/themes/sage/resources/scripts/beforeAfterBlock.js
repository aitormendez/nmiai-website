export function beforeAfterBlock() {
  const beforeafterBlocks = document.querySelectorAll('.wp-block-before-after');

  if (beforeafterBlocks) {
    beforeafterBlocks.forEach(function (block) {
      const slider = block.querySelector('input');
      const imgAfter = block.querySelector('.img-after');

      slider.oninput = function () {
        console.log(this.value);
        imgAfter.style.opacity = this.value / 100;
      };
    });
  }
}
