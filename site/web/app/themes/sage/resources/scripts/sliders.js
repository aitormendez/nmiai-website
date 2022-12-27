import Swiper, {Navigation, Autoplay, EffectFade} from 'swiper';

export function quotesSlider() {
  new Swiper('.swiper-quotes', {
    modules: [Navigation, Autoplay, EffectFade],
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    autoplay: {
      delay: 5000,
    },
    loop: true,
    speed: 2000,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
}

export function imagesSlider() {
  new Swiper('.swiper-images', {
    modules: [Autoplay],
    autoplay: {
      delay: 5000,
    },
    loop: true,
    speed: 1000,
  });
}
