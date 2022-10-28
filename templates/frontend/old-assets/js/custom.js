$(".banner-sldr").slick({
  dots: false,
  infinite: true,
  speed: 1200,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplaySpeed: 3000,
  arrows: false,
  cssEase: "ease-in-out",
  autoplay: true,
  fade: true,
});

$(".gallery-sldr").slick({
  dots: false,
  infinite: true,
  speed: 1200,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplaySpeed: 3000,
  arrows: false,
  cssEase: "ease-in-out",
  centerMode: true,
  focusOnSelect: true,
  centerPadding: "0px",
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: false,
        slidesToShow: 1,
      },
    },
  ],
});
$(".testim-sldr").slick({
  dots: false,
  infinite: true,
  speed: 1200,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplaySpeed: 3000,
  arrows: true,
  cssEase: "ease-in-out",
  autoplay: false,
  fade: true,
  adaptiveHeight: true,
});

// ------------step-wizard-------------
$(document).ready(function () {
  $(".nav-tabs > li a[title]").tooltip();

  //Wizard
  $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
    var target = $(e.target);

    if (target.parent().hasClass("disabled")) {
      return false;
    }
  });

  $(".next-step").click(function (e) {
    var active = $(".wizard .nav-tabs li.active");
    active.next().removeClass("disabled");
    nextTab(active);
  });
  $(".prev-step").click(function (e) {
    var active = $(".wizard .nav-tabs li.active");
    prevTab(active);
  });
});

function nextTab(elem) {
  $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
  $(elem).prev().find('a[data-toggle="tab"]').click();
}

$(".nav-tabs").on("click", "li", function () {
  $(".nav-tabs li.active").removeClass("active");
  $(this).addClass("active");
});

// COUNTRY CODE
/*var langArray = [];
$(".vodiapicker option").each(function () {
  var flagClass = $(this).attr("data-class");
  var text = this.innerText;
  var value = $(this).val();
  var item =
    '<li><div class="' +
    flagClass +
    '" alt="" value="' +
    value +
    '"></div><span>' +
    text +
    "</span></li>";
  langArray.push(item);
});

$(".a, .b").html(langArray);

$(".btn-select").html(langArray[0]);
$(".btn-select").attr("value", "en");

$(".a li, .b li").click(function () {
  var flagClass = $(this).find("div").attr("class");
  var value = $(this).find("div").attr("value");
  var text = this.innerText;
  var item =
    '<li><div class="' +
    flagClass +
    '" value="' +
    value +
    '"></div><span>' +
    text +
    "</span></li>";
  $(".btn-select").html(item);
  $(".btn-select").attr("value", value);
  $(".b").toggle();
});

$(".btn-select").click(function () {
  $(".b").toggle();
});

var sessionLang = localStorage.getItem("lang");
if (sessionLang) {
  var langIndex = langArray.indexOf(sessionLang);
  $(".btn-select").html(langArray[langIndex]);
  $(".btn-select").attr("value", sessionLang);
} else {
  var langIndex = langArray.indexOf("ch");
  console.log(langIndex);
  $(".btn-select").html(langArray[langIndex]);
}*/
