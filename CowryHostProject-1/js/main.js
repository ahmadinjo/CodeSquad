$(document).ready(function () {
  if (window.innerWidth < 992) {
    $(".drop-menu")
      .siblings(".nav-link")
      .click(function (e) {
        /* e.preventDefault(); */
        $(this).siblings(".drop-menu").toggle("slow");
      });
  }
});
