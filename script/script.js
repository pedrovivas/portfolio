$(".info-link").click(function () {
  if ($(".info-text", this).is(":hidden")) {
    $(".info-text").hide(300);
    $(".info-text", this).show(300);
  } else {
    $(".info-text").hide(300);
  }
});