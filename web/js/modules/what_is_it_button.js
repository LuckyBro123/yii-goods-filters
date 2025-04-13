// ▪▪▪ тут обслуживается появление с паузой окна WHAT_IS_IT
function init() {
  var whatIsItModal = $("#what_is_it_modal");
  // ▪▪▪▪▪▪▪▪ наведение на иконку
  $(document).on("mouseenter", "#what_is_it_btn", {}, function () {
    if ($myApp.what_is_it_message_appeared) return;
    whatIsItModal.addClass("hover");
    setTimeout(() => {
      show_whatIsItModal(whatIsItModal);
    }, 400);
  });
  // уход мышки с иконки или подменю
  $(document).on("mouseleave", "#what_is_it_btn", {}, function () {
    whatIsItModal.removeClass("hover");
  });
  // показать окно по клику мыши на кнопке
  $(document).on("click", "#what_is_it_btn", {}, function () {
    show_whatIsItModal(whatIsItModal,"just show");
  });
}

// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
// ▪▪▪▪▪▪▪ functions ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
function show_whatIsItModal(modal,forced = "") {
  if (!modal.hasClass("hover") && !forced) return;
  modal.modal('show');
  $(".modal-backdrop").addClass("modal-backdrop_opacity_075");
  $myApp.what_is_it_message_appeared = true;
  $.cookie("what_is_it_message_appeared", 1, { expires: 15000, path: '/' });
  if (isMobileViewport()) return;

  // далее анимация окна в зависимости от движения мышкой
  modal = modal.find(".modal-content");
  var maxY = 20,
    maxX = 20,
    maxZ = 2;

  modal.mousemove(function (e) {
    var $this = $(this);
    e.stopImmediatePropagation();
    var offsetY = (e.target != e.deletageTarget) ? e.offsetY + e.target.offsetTop : e.offsetY;
    var offsetX = (e.target != e.deletageTarget) ? e.offsetX + e.target.offsetLeft : e.offsetX;
    var w = modal.outerWidth(), h = modal.outerHeight();
    var transform = { y: 1 - offsetX / w * 2, x: 0 - (1 - offsetY / h * 2) };
    transform.z = 0 - (transform.x * transform.y);

    var transformCSS = {
      x: calculateValue(maxX, transform.x),
      y: calculateValue(maxY, transform.y),
      z: calculateValue(maxZ, transform.z)
    };

    $this.css({
      transform:
        'rotateY(' + transformCSS.y + 'deg) rotateX(' + transformCSS.x + 'deg) rotateZ(' + transformCSS.z + 'deg)'
    });
  });

  modal.mouseleave(function () {
    var $this = $(this);
    $this.css({
      transform :
        'rotateY(0deg) rotateX(0deg) rotateZ(0deg)',
      transition: 'all .15s ease-out'
    });
  });

}
// var modal = $('#panel-inner');

function calculateValue(max, value) {
  return max * value;
}


export { init }