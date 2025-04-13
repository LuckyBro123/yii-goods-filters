// ▪▪▪ тут обслуживается вылет с паузой подменю у меню-иконок auth и settings и клики
function init() {
  // ▪▪▪▪▪▪▪▪ наведение на иконку
  $(document).on("mouseenter", ".settings_menu_level1_item", {}, function () {
    $(this).addClass("hover");
    setTimeout(() => {
      showSubmenu($(this));
    }, 150);
  });
  // уход мышки с иконки или подменю
  $(document).on("mouseleave", ".settings_menu_level1_item", {}, function () {
    $(this).removeClass("hover");
    $(".settings_menu_submenu").removeClass("d-block");
  });
  // клик по выбору цветовой темы
  $(document).on("click", ".settings_menu_item", {}, function () {
    var theme_href = $(this).attr("theme_href"), color_theme = $("#color_theme");
    if (theme_href == undefined) return;
    color_theme.attr("href", theme_href);
    $.cookie('color_theme_href', theme_href, { expires: 150, path: '/' });
  });
}

// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
// ▪▪▪▪▪▪▪ functions ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
function showSubmenu(item) {
  $(".settings_menu_submenu").removeClass("d-block");
  if (item.hasClass("hover")) item.find(".settings_menu_submenu").addClass("d-block");
}

export { init }