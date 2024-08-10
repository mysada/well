import $ from 'jquery';

$(document).ready(function () {
  $('.toast').each(function () {
    setTimeout(() => {
      $(this).fadeOut(500);
    }, 3000);
  });
});
