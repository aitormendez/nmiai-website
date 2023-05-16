const InfiniteScroll = require('infinite-scroll');
import {animateProject} from './animateProject.js';

export function loadMore() {
  let elem = document.querySelector('.infinite-container');
  let viewMoreButton = document.querySelector('.view-more-button');

  const infScroll = new InfiniteScroll(elem, {
    path: '.nav-previous a',
    append: 'article',
    history: false,
    loadOnScroll: false,
    status: '.page-load-status',
  });

  viewMoreButton.addEventListener('click', function () {
    infScroll.loadNextPage();
  });

  infScroll.on('append', function () {
    animateProject();
  });

  infScroll.on('last', function () {
    viewMoreButton.classList.add('hidden');
  });
}
