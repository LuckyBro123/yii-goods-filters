<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;

$routeHome = Yii::$app->urlManager->createAbsoluteUrl(['cars/index']);
?>
<header class="container-fluid m-0 p-0 bg-light">
	<div class="black_rect_fullscreen d-none"></div>
	<!--	▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪ -->
	<!--	HEADER линия c логотипом для экранов DESKTOP              -->
	<div class="container-fluid logo_block">
		<div class="d-none d-sm-block container-md bg-light ">
			<div class="d-flex flex-wrap justify-content-left align-items-center flex-nowrap">
				<a href="<?= $routeHome ?>" class="d-flex align-items-center justify-content-start mb-sm-0 mt-sd-0 bg-light me-2 car_sale_logo" data-bs-toggle="tooltip" data-bs-title="Go to start page" style="flex: 0 1 auto">
					<svg style="width: 237px; height: 34px;padding-top: 2px;">
						<use xlink:href="#svg_logo"></use>
					</svg>
				</a>
				<form id="search_form" class="me-3" style="flex: 1 0 8rem" action="/search">
					<div class="input-group search_wrapper">
						<input id="search" name="search_str" type="search" class="form-control" placeholder="Search in ads..." aria-label="Search" autocomplete="off" value="">
						<button class="btn btn-outline-secondary" id="btn_search_mobile_submit" type="submit">
							<svg width="16" height="16">
								<use xlink:href="#i_search"></use>
							</svg>
						</button>
						<div class="dynamic_search_results mt-2 mb-2 d-none "></div>
					</div>
				</form>
				<!-- SETTINGS menu -->
				<ul class="settings_menu">
					<li class="settings_menu_level1_item">
						<i class="i_settings"></i>
						<ul class="settings_menu_submenu " id="settings_menu_submenu2">
							<div class="thin_stub_at_the_top"></div>
							<li class="settings_menu_help">Choose color theme</li>
							<hr>
							<li class="settings_menu_item" theme_href="/css/color_theme__red.css">
								<span class="color_theme_icon color_theme_icon_red"></span>
								<span class="settings_menu_link">Red</span>
							</li>
							<li class="settings_menu_item" theme_href="/css/color_theme__black.css">
								<span class="color_theme_icon color_theme_icon_black"></span>
								<span class="settings_menu_link">Black</span>
							</li>
							<li class="settings_menu_item" theme_href="/css/color_theme__blue.css">
								<span class="color_theme_icon color_theme_icon_blue"></span>
								<span class="settings_menu_link">Blue</span>
							</li>
							<li class="settings_menu_item" theme_href="/css/color_theme__orange.css">
								<span class="color_theme_icon color_theme_icon_orange"></span>
								<span class="settings_menu_link">Orange</span>
							</li>
							<li class="settings_menu_item" theme_href="/css/color_theme__green.css">
								<span class="color_theme_icon color_theme_icon_green"></span>
								<span class="settings_menu_link">Green</span>
							</li>
							<li class="settings_menu_item" theme_href="/css/color_theme__pink.css">
								<span class="color_theme_icon color_theme_icon_pink"></span>
								<span class="settings_menu_link">Pink</span>
							</li>
							<li class="settings_menu_item" theme_href="/css/color_theme__brown.css">
								<span class="color_theme_icon color_theme_icon_brown"></span>
								<span class="settings_menu_link">Brown</span>
							</li>
							<li class="settings_menu_item" theme_href="/css/color_theme__emerald.css">
								<span class="color_theme_icon color_theme_icon_emerald"></span>
								<span class="settings_menu_link">Emerald</span>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	</div>
	<!--	МЕНЮ для экранов DESKTOP -->
	<nav class="d-none d-sm-block py-2  text-white main_menu_red">
		<div class="container-fluid d-flex  flex-wrap">
			<ul class="nav mx-auto justify-content-center">
				<li class="nav-item">
					<a href="<?= $routeHome ?>" class="nav-link link-light px-2">HOME</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">LATEST ADS</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2" aria-current="page">CREATE AD</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">COMPARE</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">FAVORITES</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">CATEGORIES</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">CONTACTS</a>
				</li>
			</ul>
		</div>
	</nav>
</header><!--
★★★★★★★★★★★★★★★★★★★  BRANDS_MENU_CONTAINER  ★★★★★★★★★★★★★★★★★★★★★★-->
<nav class="brands_menu_container">
	<div class="container-md nav_scroller mb-2 overflow-hidden overflow_sm_visible">
		<ul class="row row-cols-12 flex-nowrap flex-sm-wrap justify-content-sm-center mb-1 mb-sm-0 pb-0 brands_menu_logos  ">
			<?php
			foreach ($brands as $code => $brand) {
				?>
				<li class="col brands_menu_item">
					<a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['cars/index', 'ff' => $code]);/*$this->Url->build(['controller' => 'Cars', 'action' => 'index', '?' => ['ff' => $code]])*/ ?>">
						<div class="i_<?= mb_strtolower(str_replace(" ", '', $brand)) ?>"></div>
						<div <?php if (strlen($brand) >= 10) echo 'style="font-size: 0.925rem;"' ?> ><?= $brand ?></div>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
</nav><!--
★★★★★★★★★★★★★★★★★★★  FILTERS  ★★★★★★★★★★★★★★★★★★★★★★-->
<script type="text/javascript">
	<?php
	echo '$myApp = {}; $myApp.isAnyFiltersSelected = false;';
	?>
  function pluralProducts(number) {
    var rus = false;
    if (rus && number > 20) number %= 10;
    switch (number) {
      case 1 :
        return "<?= $pluralWords[0] ?>";
      case 2 :
      case 3 :
      case 4 :
        return "<?= $pluralWords[1] ?>";
      default:
        return "<?= $pluralWords[2] ?>";
    }
  }
</script>
<nav class="btn_filters_container">
	<div class="container">
		<div class="row justify-content-between mt-3 mt-sm-4 align-items-stretch">
			<!-- SHOW FILTERS button -->
			<div class="col-6 col-sm-5 col-md-4 mb-sm-2 pe-0 pe-sm-1 show_filters_btn_holder">
				<a id="show_filters" class="w-100 btn btn-outline-secondary lh-sm filters_closed no_filters_selected mb-2 mb-sm-1" data-func="show_filters">
					<span closed>Show filters</span><span showed>Close filters</span><span selected_filters_cnt></span>
				</a>
			</div>
			<!-- WHAT IS IT button -->
			<div class="col-12 col-sm-12 col-md-4 mb-sm-2 what_is_it_btn_holder">
				<a id="what_is_it_btn" class="w-100 btn btn-outline-warning lh-sm mb-2 mb-sm-1" type="button"><span class="d-none d-md-inline">What is it ?</span><span class="d-md-none">What is this site for?</span></a>
			</div>
			<!-- CREATE NEW AD button -->
			<div class="col-6 col-sm-5 col-md-4 mb-sm-2 ps-2 create_new_ad_btn_holder">
				<a id="create_new_ad_btn" href="" class="w-100 btn btn-outline-secondary lh-sm mb-2 mb-sm-1" type="button"><span>Create new ad</span></a>
			</div>
		</div>
		<!-- ▪▪▪▪▪▪▪▪  modal  WHAT IS IT  ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪ -->
		<div class="modal fade" id="what_is_it_modal" tabindex="-1" aria-labelledby="what_is_it_modal_label" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" style="">
				<div class="modal-content">
					<div class="modal-header bottom_diagonal_cuts "></div>
					<div class="modal-body text-center">
						<h1>Hello :)</h1>
						<div class="icon d-flex align-items-center justify-content-center">
							<img src="/img/homepage/chip_dale_face.png" class="img-fluid chip_dale_face" alt="">
						</div>
						<p class="what_is_it_text">Site description</p>
						<button type="button" class="btn btn-primary btn_what_is_it_close" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav><!--
★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★
★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★
★★★★★★★★★★★★★★★★★★★  CONTENT  ★★★★★★★★★★★★★★★★★★★★★★-->
<div class="content container pt-0 pb-1">
	<!--♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦-->
	<!--♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦ <x-simple_paginator_for_goods ♦♦♦♦♦♦♦♦♦♦♦♦♦♦-->
	<?php echo LinkPager::widget([
		'pagination' => $pages,
	]); ?>

	<!--♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦-->
	<!--♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦ <x-sorting_and_per_page ♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦-->
	<?php
	$pagesAmount = $pages->pageCount;
	$currentPage = $pages->page;
	$currentPerPage = $pages->pageSize;
	?>
	<div class="row sorting_and_per_page p-0 justify-content-center justify-content-md-between      mt-2 mb-1">
		<div class="col-12 col-sm-auto d-flex justify-content-center mt-1 mt-sm-0 py-1">
			<!-- SORTING SELECTOR -->
			<label class="align-self-center">Sort by</label>
			<select id="sort_mode" class="form-select form-select-sm">
				<?php foreach ($allSortModes as $sortModeTitle => $sortModeText) { ?>
					<option value="<?= $sortModeTitle ?>" <?= $sortMode == $sortModeTitle ? "selected" : "" ?>><?= $sortModeText ?></option>
				<?php } ?>
			</select>
		</div>
		<?php if ($pagesAmount > 4) { ?>
			<div class="col-12 col-sm-auto d-flex justify-content-center py-1">
				<!-- PAGE NUMBERS SELECTOR -->
				<label class="align-self-center">Page №</label>
				<!--				-->
				<?php if ($pagesAmount > 30) { ?><!-- будет использован input для выбора номера страницы -->
				<div class="input-group input-group_page_number">
					<input name="page_number" type="number" class="form-control page_number" autocomplete="off" value="<?= $currentPage ?>" min="1" max="<?= $pagesAmount ?>" maxlength="4">
					<button class="btn btn-outline-secondary btn_page_number_submit" type="button">
						<svg style="width: 1.2rem;height: 0.85rem !important;">
							<use xlink:href="#i_search"></use>
						</svg>
					</button>
				</div>
				<!--				-->
				<?php } else { ?><!-- будет использован select для выбора номера страницы -->
				<select id="page_numbers" class="form-select form-select-sm">
					<?php for ($number = 1; $number <= $pagesAmount; $number++) { ?>
						<option value="<?= $number ?>" <?= $number == $currentPage ? "selected" : "" ?>><?= $number ?></option>
					<?php } ?>
				</select>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="col-12 col-sm-auto d-flex justify-content-center mb-1 mb-sm-0 py-1">
			<!-- PER PAGE NUMBER SELECTOR -->
			<label class="align-self-center">Per page</label>
			<select id="elems_per_page" class="form-select form-select-sm">
				<option value="15" <?= $currentPerPage == "15" ? "selected" : "" ?>>15</option>
				<option value="20" <?= $currentPerPage == "20" ? "selected" : "" ?>>20</option>
				<option value="30" <?= $currentPerPage == "30" ? "selected" : "" ?>>30</option>
				<option value="50" <?= $currentPerPage == "50" ? "selected" : "" ?>>50</option>
				<option value="100" <?= $currentPerPage == "100" ? "selected" : "" ?>>100</option>
			</select>
		</div>
	</div>

	<!--♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦-->
	<!--♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦♦-->
	<div class="row">
		<div class="d-flex flex-wrap ps-2 pe-0 pt-1 pt-sm-0 goods_list_container"> <!-- ОБЁРТКА ЧТОБЫ ВЫРОВНЯТЬ ОТСТУПЫ МЕЖДУ CARDs-->
			<?php
			foreach ($goods as $car) {
				$URLforCard = Yii::$app->urlManager->createAbsoluteUrl(['cars/view', $car->id]);
//				$URLforCard = $this->Url->build(['controller' => 'Cars', 'action' => 'view', $car->id], ['fullBase' => true]);
				$carId = $car->id;
				if (count($car->photos)) $carPhotoURL = "/storage/cars_photos/small_duplicates/" . pathinfo($car->photos[0]->filename, PATHINFO_FILENAME) . ".webp";
				else $carPhotoURL = "";
				$carTitle = $car->brand->name . " " . $car->model->name;
				$carPrice = number_format($car->price, 0, "", " ") . " $";
				$carMileage = number_format(round($car->mileage / 1.609), 0, "", " ") . " m";
				$isFavoriteIconChecked = "";
				$isCompareIconChecked = "";
				?>
				<!-- ▪▪▪ CAR CARD карточка машины ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪ -->
				<div class="col-6 col-md-4 col-lg-3 col-xl-5cols col-xxl-2 ps-0 ps-sm-0 pe-2 pe-sm-2 mb-sm-2 car_card_container">
					<div id="car_card<?= $carId ?>" class="card car_card" carid="<?= $carId ?>">
						<a href="<?= $URLforCard ?>" class="card_url">
							<?php if ($carPhotoURL) { ?>
								<div class="card_photo_holder">
									<img src="<?= $carPhotoURL ?>" class="card-img-top" alt="car photo">
								</div>
							<?php } else { ?>
								<div class="card_no_photo">NO PHOTO</div>
							<?php } ?>
							<div class="card-body">
								<h6 class="car_name"><?= $carTitle ?></h6>
								<h6 class="car_price"><?= $carPrice ?></h6>
								<p class="d-none d-sm-block card-text car_parameters"><?= $car->production_year ?>, <?= $carMileage ?></p>
							</div>
						</a>
						<label class="car_card_icons icon_compare">
							<input <?= $isCompareIconChecked ?> type="checkbox" class="input_compare" carid="<?= $carId ?>">
							<div class="icons">
								<svg width="1.15rem" height="1.15rem">
									<use xlink:href="#i_compare"></use>
								</svg>
								<svg width="1.15rem" height="1.15rem">
									<use xlink:href="#i_compare_on"></use>
								</svg>
							</div>
						</label>
						<label class="car_card_icons icon_favorite">
							<input <?= $isFavoriteIconChecked ?> type="checkbox" class="input_favorite" carid="<?= $carId ?>">
							<div class="icons">
								<svg width="1.15rem" height="1.15rem">
									<use xlink:href="#i_favorite"></use>
								</svg>
								<svg width="1.15rem" height="1.15rem">
									<use xlink:href="#i_favorite_on"></use>
								</svg>
							</div>
						</label>
					</div>
				</div>                      <?php } ?>
		</div>
	</div>

</div>
<!-- ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪ -->
<!-- ▪▪▪▪▪▪▪▪▪▪▪ заготовка EXTENDED_CAR_CARD ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪ -->
<div id="extCard_FOR_CLONE" class="card car_card extended_car_card d-none" card_id="">
	<a class="card_url position-relative" href="">
		<div class="ext_card_photo_holder">
			<img src="" class="ext_car_card_photo" alt="car photo">
		</div>
		<div class="ext_car_card_microphoto_set d-flex justify-content-between mt-2 mb-3 mx-2">
			<?php for ($i = 0;
			           $i < 5;
			           $i++) { ?>
				<div class="ext_card_empty_img"></div>
			<?php } ?>
		</div>
		<div class="card-body pt-0 "></div>
		<div class="ext_card_footer">
			<span href="" class="btn btn-outline-success btn-sm" style="min-width: 6rem;line-height: 1.2;">Details</span>
		</div>
	</a>
</div><!--
★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★
★★★★★★★★★★★★★★★★★★★  FOOTER  ★★★★★★★★★★★★★★★
★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★-->
<footer>
	<nav class="py-0  border-bottom text-white main_menu_footer">
		<div class="container-fluid d-flex flex-wrap">
			<ul class="nav mx-auto justify-content-center">
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">HOME</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">LATEST ADS</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2 active" aria-current="page">CREATE AD</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">COMPARE</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">FAVORITES</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">CATEGORIES</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link link-light px-2">CONTACTS</a>
				</li>
			</ul>
		</div>
	</nav>
</footer><!--
★★★★★★★★★★★★★★★★★★★  SWITCH LANGUAGE  ★★★★★★★★★★★★★★★★★★★★★★-->
<div class="container-fluid px-3 text-bg-dark">
	<div class="row justify-content-center">
		<div class="col-auto switch_language_wrapper">
			<div class="current_lang_div">
				<span>Current language:</span>
				<span>English</span>
			</div>
		</div>
	</div>
</div><!--
★★★★★★★★★★★★★★★★★★★  СКЛАД   ИКОНКИ svg  ★★★★★★★★★★★★★★★★★★★★★★-->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
	<symbol id="svg_logo" fill="currentColor" viewBox="0 0 1426 205">
		<path d="M301.25,167.011c-2.222,0.037 -8.015,0.392 -11.901,0.747c-10.648,1.125 -32.705,2.925 -47.917,3.899l-13.082,0.901l-0.837,2.25c-10.801,29.7 -45.104,39.15 -67.162,18.525c-4.943,-4.5 -8.822,-9.975 -10.495,-14.55l-1.065,-2.925l-10.269,0.374c-5.628,0.225 -13.994,1.05 -18.634,1.95c-4.716,0.825 -13.615,1.725 -20.536,2.026c-12.094,0.525 -12.17,0.525 -14.756,2.775c-3.803,3.225 -10.877,6.3 -16.886,7.275c-6.845,1.125 -14.604,-0 -20.992,-3.075c-5.02,-2.4 -12.094,-8.25 -13.843,-11.4c-0.685,-1.276 -2.358,-2.325 -4.944,-3.151c-2.13,-0.675 -5.4,-2.324 -7.301,-3.675c-2.435,-1.725 -5.553,-2.924 -10.877,-4.124c-5.933,-1.351 -7.683,-2.026 -8.595,-3.525c-1.674,-2.401 -1.521,-6.001 0.38,-10.05c0.837,-1.876 1.597,-3.976 1.597,-4.726c0,-0.749 0.532,-2.175 1.294,-3.225c1.369,-2.1 2.509,-1.275 2.509,1.875c0,4.426 8.443,8.625 21.297,10.5c25.253,3.826 78.722,5.551 90.359,2.926c8.291,-1.875 13.311,-4.5 18.255,-9.376c5.248,-5.174 8.139,-10.05 13.083,-22.05c4.183,-10.2 3.651,-11.401 -2.131,-5.026c-16.429,18.302 -26.012,22.576 -55.675,24.602c-16.201,1.124 -46.777,0.9 -56.285,-0.301c-12.398,-1.65 -20.688,-5.475 -24.72,-11.4c-1.444,-2.025 -1.52,-3.075 -1.14,-14.925l0.38,-12.75l3.043,-4.426c2.814,-4.124 3.042,-4.275 3.499,-2.625c0.304,0.975 0.532,2.775 0.608,3.976l0.076,2.25l2.205,-2.1c1.218,-1.201 3.043,-3.6 4.031,-5.4c1.218,-2.251 2.131,-3.151 2.891,-2.925c0.608,0.3 5.172,1.725 10.04,3.224l8.975,2.7l0,2.551c0,6.075 7.987,8.399 13.159,3.899c1.444,-1.199 3.042,-3.224 3.499,-4.35l0.912,-2.1l17.646,-1.124c9.735,-0.601 17.798,-1.05 17.95,-0.9c0.153,0.075 -0.685,1.199 -1.749,2.55c-1.141,1.274 -1.977,2.474 -1.825,2.55c1.825,1.499 14.983,7.35 16.505,7.275c2.965,-0.075 39.018,-12.826 40.463,-14.25c0.685,-0.676 4.563,-6.076 8.595,-11.85c8.366,-12.151 8.366,-12.376 0.076,-12.901c-4.64,-0.3 -5.552,0 -29.055,9.151c-26.393,10.274 -28.827,10.875 -48.45,12.449c-14.984,1.126 -19.776,0.975 -22.666,-0.749c-3.042,-1.8 -5.248,-1.876 -8.747,-0.226c-2.433,1.126 -3.499,1.126 -9.127,0.301c-7.15,-0.975 -14.604,-3.45 -15.212,-4.951c-0.533,-1.5 1.902,-9.225 4.183,-13.35c2.434,-4.2 3.651,-4.725 29.435,-12.9c17.951,-5.7 22.666,-7.8 40.616,-18.525c5.447,-3.265 9.901,-6.189 12.271,-7.621c0.834,-0.504 1.754,-1.003 2.708,-1.478c-0.934,0.024 20.675,-12.204 27.539,-16.176c13.767,-8.026 32.173,-12.676 63.282,-15.826c20.537,-2.025 31.565,-3 38.03,-3.299c14.239,-0.648 50.756,0.336 71.139,1.554c-0.158,0.134 -0.315,0.268 -0.472,0.403c-7.355,6.279 -9.637,8.854 -14.003,16.451c-6.337,0.156 -16.393,1.6 -24.414,3.641c-13.92,3.451 -27.154,10.425 -33.999,17.926c-2.282,2.474 -2.814,3.675 -2.814,6.074c-0,1.65 0.152,3.001 0.38,3.001c0.152,-0 1.141,-0.825 2.129,-1.8c2.358,-2.325 6.466,-3.45 12.55,-3.45c6.618,-0 11.409,1.274 12.855,3.525c1.521,2.175 2.662,8.1 2.053,10.35c-0.38,1.575 -1.14,1.875 -6.77,2.625c-3.497,0.525 -9.811,0.75 -13.994,0.6l-7.682,-0.225l-0,4.426c-0,4.349 -0,4.349 2.13,3.974c1.14,-0.225 7.682,-1.575 14.603,-3c7.593,-1.608 20.379,-3.835 29.271,-5.216c-1.214,10.447 -1.566,22.622 -1.264,37.715c0.555,28.167 1.665,36.627 6.882,52.394c2.023,6.095 4.238,11.233 6.903,15.837Zm-92.524,-0.228c-2.663,-1.426 -7.834,-1.725 -7.834,-0.526c-0,0.451 1.75,2.551 3.879,4.725c2.13,2.176 4.791,5.176 5.856,6.751l1.902,2.85l2.205,-3.226c1.142,-1.8 2.13,-3.6 2.13,-4.049c0,-0.975 -4.791,-4.875 -8.138,-6.525Zm8.823,-13.126c-0.533,-1.274 -1.217,-1.65 -3.119,-1.575c-6.312,0.226 -13.538,3.45 -13.538,6.075c-0,1.05 0.912,1.201 6.389,1.201c3.498,0.075 7.605,0.3 9.127,0.524l2.739,0.526l-0.534,-2.476c-0.228,-1.425 -0.76,-3.3 -1.064,-4.275Zm68.911,-147.152c4.791,-1.05 5.4,-1.35 3.042,-1.35c-6.161,0 -16.353,2.85 -24.035,6.675c-6.618,3.225 -16.049,10.65 -22.286,17.401c-9.736,10.649 -10.192,11.7 -1.597,3.525c16.885,-15.901 28.142,-22.5 44.876,-26.251Zm-75.909,105.827c-8.367,-3.075 -16.276,-2.625 -24.491,1.35c-4.412,2.174 -11.713,8.474 -8.366,7.275c3.042,-1.125 13.31,-1.426 18.026,-0.526c12.626,2.401 23.655,10.951 29.511,22.876c2.358,4.875 3.575,6.45 4.64,6.45c1.368,-0 1.444,-0.375 1.064,-4.724c-0.836,-7.651 -2.585,-13.951 -5.096,-18.676c-3.118,-5.7 -9.963,-12 -15.288,-14.025Zm-37.878,35.326c-0.912,-1.276 -1.901,-2.401 -2.205,-2.401c-0.38,-0 -1.522,1.425 -2.587,3.15l-1.901,3.225l2.358,2.401c4.107,4.199 12.474,7.049 13.843,4.874c0.228,-0.374 -1.522,-2.475 -3.803,-4.724c-2.282,-2.251 -4.868,-5.176 -5.705,-6.525Zm16.505,-11.251c0.38,-1.35 0.228,-1.65 -1.293,-1.575c-0.988,0 -2.966,0.375 -4.259,0.75c-2.358,0.675 -2.51,0.9 -2.51,4.275c-0,1.95 0.38,4.8 0.761,6.3c0.761,2.7 4.107,7.35 5.248,7.35c0.38,0 0.836,-3.45 1.065,-7.724c0.228,-4.201 0.684,-8.401 0.988,-9.376Zm-66.776,-99.104c-0.645,0.465 -1.366,0.969 -2.168,1.513c-11.823,8.013 -22.955,17.115 -22.573,18.165c0.228,0.675 6.711,0.975 32.951,1.125c47.158,0.3 65.792,-0.976 75.299,-5.025c3.956,-1.725 10.345,-7.2 27.306,-23.401c7.53,-7.2 15.441,-14.475 17.494,-16.275l3.803,-3.149l-28.903,-0c-39.625,-0 -73.529,9.556 -91.677,20.112c-4.175,2.428 -6.696,3.905 -11.507,6.929c-0.005,0.003 -0.013,0.005 -0.025,0.006Zm59.779,128.954c-0.381,-0.299 -4.564,-0.75 -9.204,-0.9c-9.583,-0.374 -9.279,-0.524 -7.758,4.951l0.837,2.925l4.564,-0.526c6.236,-0.599 13.462,-4.65 11.561,-6.45Zm24.568,-26.925c-1.902,-1.275 -3.575,-2.325 -3.727,-2.325c-0.762,-0 -5.933,5.925 -6.846,7.876c-1.521,2.999 -2.206,7.724 -1.217,8.325c0.381,0.299 2.89,-1.576 5.476,-4.051c2.511,-2.475 5.781,-5.174 7.15,-5.999l2.586,-1.501l-3.422,-2.325Zm-18.179,33.901c-0.38,-2.176 -1.673,-1.65 -5.552,2.174c-2.054,2.101 -5.096,4.65 -6.618,5.701c-1.597,0.975 -2.89,2.025 -2.89,2.325c-0,0.525 4.412,3.525 6.237,4.2c2.662,1.05 9.659,-10.351 8.823,-14.4Zm10.573,1.424c-3.347,-5.099 -4.108,-4.274 -4.488,4.876c-0.228,4.5 -0.685,8.699 -0.989,9.375c-0.685,1.575 0.837,1.725 5.248,0.525l2.89,-0.825l-0.304,-5.4c-0.228,-4.425 -0.684,-6.075 -2.357,-8.551Z" style="fill:#000000;fill-rule:nonzero;"/>
		<path d="M379.56,5.232c-21.45,1.95 -35.55,7.35 -46.2,17.925c-5.25,5.175 -6.675,7.125 -9.975,13.875c-7.725,15.975 -10.125,31.2 -9.6,61.5c0.375,21.975 1.125,28.575 4.65,40.875c3.3,11.475 7.35,18.6 14.625,26.025c5.475,5.55 7.425,6.975 13.5,9.9c12.6,6.075 26.85,8.7 47.175,8.7c20.175,0 37.65,-1.95 52.05,-5.775c6.675,-1.8 7.35,-2.1 7.05,-3.525c-0.225,-0.9 -1.125,-8.625 -2.1,-17.25l-1.725,-15.6l-3,0.45c-5.55,0.75 -47.175,2.1 -54.9,1.725c-15.375,-0.75 -21.3,-6.075 -24.825,-22.275c-1.125,-5.325 -1.35,-9.825 -1.35,-26.625c-0,-21.075 0.6,-27.6 3.375,-35.475c2.475,-6.975 7.5,-12 13.575,-13.65c1.725,-0.45 14.7,-0.75 33.075,-0.75c16.575,0.075 30.3,-0.225 30.375,-0.525c0.3,-1.125 3.225,-29.625 3.225,-31.725c-0,-2.025 -0.15,-2.1 -7.65,-3.675c-4.275,-0.9 -11.475,-2.175 -16.125,-2.7c-8.25,-1.05 -38.7,-2.025 -45.225,-1.425Z"/>
		<path d="M871.185,5.307c-17.775,1.5 -31.875,6.375 -39,13.5c-7.275,7.275 -10.875,18.75 -10.875,34.725c-0,23.55 8.325,37.2 29.175,47.625c3,1.5 15.675,6.6 28.125,11.325c24.45,9.375 27.675,10.875 29.925,13.95c1.875,2.55 2.55,9.9 1.125,12.525c-3.15,5.85 -7.725,6.3 -50.025,5.325c-18.3,-0.45 -33.375,-0.675 -33.525,-0.525c-0.75,0.75 -3.075,32.475 -2.4,32.85c1.05,0.675 15,3.375 24.225,4.725c20.625,3.075 57,3.525 71.25,0.9c13.575,-2.475 21.675,-6 28.125,-12.15c4.95,-4.65 7.425,-8.925 9.9,-16.8c1.575,-5.1 1.725,-6.975 1.725,-19.5c-0.075,-13.05 -0.15,-14.25 -2.1,-19.875c-4.2,-12.6 -12.525,-21.3 -27.075,-28.425c-4.575,-2.25 -17.775,-7.5 -29.325,-11.7c-11.55,-4.2 -22.425,-8.475 -24.15,-9.45c-4.125,-2.4 -6.225,-5.4 -6.675,-9.825c-0.525,-4.8 1.35,-8.325 5.325,-10.35c2.925,-1.425 4.275,-1.5 39.6,-1.275c34.5,0.15 36.525,0.075 36.525,-1.125c-0,-0.75 0.675,-7.575 1.5,-15.225c0.75,-7.575 1.35,-13.875 1.275,-14.025c-0.675,-0.6 -16.575,-4.2 -22.725,-5.1c-15.45,-2.25 -45.675,-3.3 -59.925,-2.1Z"/>
		<path d="M676.185,6.282c-5.325,0.3 -12.675,0.825 -16.275,1.125l-6.6,0.525l-0,173.1l48,0l-0,-65.25l14.1,0c13.125,0 14.325,0.15 17.4,1.65c3.75,1.95 6.375,5.325 7.575,9.9c0.45,1.725 3.6,14.4 7.05,28.2l6.15,25.125l25.65,0.225c14.025,0.075 25.575,0.075 25.575,-0.075c-0,-2.025 -17.1,-60.525 -18.525,-63.45c-3.525,-7.35 -10.95,-13.05 -19.8,-15.3c-2.175,-0.6 -4.05,-1.35 -4.2,-1.725c-0.15,-0.375 2.475,-1.275 5.85,-1.95c12.75,-2.625 20.4,-8.175 25.125,-18.225c4.5,-9.45 5.775,-21.225 3.75,-34.5c-2.925,-18.975 -10.95,-28.95 -28.35,-34.8c-12.6,-4.35 -17.55,-4.8 -51.6,-4.95c-17.1,-0.15 -35.475,0.075 -40.875,0.375Zm61.65,34.65c4.575,1.125 8.7,5.25 9.825,9.825c1.125,4.425 1.125,15.375 0.075,19.725c-1.2,4.725 -4.65,8.1 -9.6,9.6c-3.225,0.975 -7.575,1.2 -20.475,1.2l-16.35,0l-0,-41.25l16.575,0c10.05,0 17.85,0.375 19.95,0.9Z"/>
		<path d="M1332.06,7.482c-16.125,2.475 -26.025,8.325 -31.65,18.75c-4.275,7.95 -4.35,8.475 -4.35,67.875c-0,33.975 0.3,56.025 0.75,58.5c1.875,9.9 8.85,19.35 17.7,23.775c8.775,4.425 11.1,4.8 30.75,5.175c26.475,0.525 78.75,-1.425 80.325,-3.075c0.45,-0.45 -1.125,-29.85 -1.725,-32.175c-0.375,-1.2 -2.775,-1.275 -36.15,-1.275c-34.575,0 -35.85,-0.075 -38.25,-1.5c-4.125,-2.55 -4.65,-4.95 -4.65,-21l-0,-14.25l34.725,-0.15l29.4,-0.225l0.225,-15.975l0.15,-15.9l-64.5,0l-0,-12.225c-0,-13.875 0.75,-16.425 5.25,-18.675c2.4,-1.2 5.85,-1.35 38.025,-1.35c33.075,0 28.976,-0.626 29.351,-1.901c0.525,-2.025 2.25,-31.575 1.8,-32.025c-1.8,-1.8 -77.351,-3.799 -87.176,-2.374Z"/>
		<path d="M521.685,8.457c-3.375,0.9 -6.525,2.7 -8.925,5.25c-1.875,1.95 -5.325,12.525 -26.475,81.225c-13.35,43.425 -24.75,80.55 -25.35,82.575l-1.05,3.525l49.95,0l4.65,-17.925c2.55,-9.825 4.95,-19.125 5.4,-20.625l0.75,-2.7l27.825,0.15l27.825,0.225l5.325,20.4l5.25,20.475l25.05,0c19.725,0 24.975,-0.225 24.675,-0.975c-0.15,-0.45 -10.5,-34.275 -23.025,-75.15c-12.45,-40.875 -23.625,-77.4 -24.825,-81.225c-2.475,-7.725 -5.025,-11.25 -9.975,-13.875c-3,-1.575 -3.9,-1.65 -28.95,-1.8c-14.25,-0.075 -26.85,0.15 -28.125,0.45Zm31.8,42.975c1.275,6.525 10.95,45.45 13.275,53.25c0.375,1.275 -0.825,1.35 -18.45,1.35c-18,0 -18.825,-0.075 -18.375,-1.425c1.65,-5.4 12.45,-48.375 13.5,-54.3l1.425,-7.275l6.975,0l1.65,8.4Z"/>
		<path d="M1028.68,8.457c-5.175,1.35 -9.975,5.25 -11.325,9.225c-0.375,0.975 -11.775,38.025 -25.425,82.35l-24.75,80.625l24.675,0.225c13.575,0.075 24.825,0.075 24.975,-0.15c0.225,-0.225 10.725,-39.9 10.725,-40.65c-0,-0.15 12.6,-0.225 27.9,-0.15l27.975,0.225l5.25,20.25l5.325,20.25l24.9,0.225c13.725,0.075 24.9,0 24.9,-0.225c-0,-0.15 -11.175,-36.9 -24.75,-81.525c-18.075,-59.1 -25.35,-82.05 -26.85,-84.15c-1.2,-1.8 -3.6,-3.75 -5.775,-4.875l-3.675,-1.95l-25.95,-0.15c-14.25,-0.075 -26.85,0.15 -28.125,0.45Zm30.675,36.225c2.1,11.1 3.675,17.775 8.775,37.5c3.225,12.6 5.925,23.175 5.925,23.4c-0,0.225 -8.25,0.45 -18.375,0.45c-14.175,0 -18.375,-0.225 -18.375,-0.975c-0,-0.45 2.7,-11.4 5.925,-24.15c3.3,-12.825 6.525,-26.1 7.2,-29.625c1.65,-8.7 1.35,-8.25 5.175,-8.25c2.925,0 3.45,0.225 3.75,1.65Z"/>
		<path d="M1155.36,8.757c-0.225,0.6 -0.3,32.925 -0.15,71.85c0.225,69.825 0.3,70.875 1.875,75.45c2.175,6.6 4.725,10.5 9.525,15.075c5.325,5.025 11.85,8.025 20.85,9.6c6,1.05 11.025,1.2 35.475,0.75c26.1,-0.375 43.05,-1.2 53.475,-2.4l3.975,-0.45l-0.375,-2.775c-0.225,-1.5 -0.825,-9.375 -1.275,-17.55l-0.9,-14.775l-32.325,-0.075c-34.875,0 -36.225,-0.15 -39,-3.9c-1.575,-2.1 -1.575,-2.625 -1.95,-66.75l-0.375,-64.65l-24.225,-0.225c-19.8,-0.15 -24.225,0 -24.6,0.825Z"/>
	</symbol>
	<symbol id="i_search" fill="currentColor" class="bi-search" viewBox="0 0 16 16">
		<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
	</symbol>
	<symbol id="i_favorite" fill="currentColor" class="bi-favorite" viewBox="0 0 512 512">
		<path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
	</symbol>
	<symbol id="i_favorite_on" fill="currentColor" class="bi-favorite-on" viewBox="0 0 512 512">
		<path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
	</symbol>
	<symbol id="i_compare" fill="currentColor" viewBox="0 0 512 512">
		<path d="M234.2 4.672C241 1.592 248.5 0 256 0C263.5 0 270.1 1.592 277.8 4.672L495.2 102.1C505.4 106.7 512 116.8 512 128C512 139.2 505.4 149.3 495.2 153.9L277.8 251.3C270.1 254.4 263.5 256 256 256C248.5 256 241 254.4 234.2 251.3L16.76 153.9C6.561 149.3 .0003 139.2 .0003 128C.0003 116.8 6.561 106.7 16.76 102.1L234.2 4.672zM256 32C252.1 32 249.1 32.64 247.2 33.87L37.27 128L247.2 222.1C249.1 223.4 252.1 224 256 224C259 224 262 223.4 264.8 222.1L474.7 128L264.8 33.87C262 32.64 259 32 256 32V32zM78.6 219.9C82.22 228 78.61 237.5 70.55 241.1L37.27 256L247.2 350.1C249.1 351.4 252.1 352 256 352C259 352 262 351.4 264.8 350.1L474.7 256L441.5 241.1C433.4 237.5 429.8 228 433.4 219.9C437 211.9 446.5 208.3 454.5 211.9L495.2 230.1C505.4 234.7 512 244.8 512 256C512 267.2 505.4 277.3 495.2 281.9L277.8 379.3C270.1 382.4 263.5 384 256 384C248.5 384 241 382.4 234.2 379.3L16.76 281.9C6.561 277.3 0 267.2 0 256C0 244.8 6.561 234.7 16.76 230.1L57.46 211.9C65.52 208.3 74.99 211.9 78.6 219.9H78.6zM37.27 384L247.2 478.1C249.1 479.4 252.1 480 256 480C259 480 262 479.4 264.8 478.1L474.7 384L441.5 369.1C433.4 365.5 429.8 356 433.4 347.9C437 339.9 446.5 336.3 454.5 339.9L495.2 358.1C505.4 362.7 512 372.8 512 384C512 395.2 505.4 405.3 495.2 409.9L277.8 507.3C270.1 510.4 263.5 512 256 512C248.5 512 241 510.4 234.2 507.3L16.76 409.9C6.561 405.3 0 395.2 0 384C0 372.8 6.561 362.7 16.76 358.1L57.46 339.9C65.52 336.3 74.99 339.9 78.6 347.9C82.21 356 78.61 365.5 70.54 369.1L37.27 384z"/>
	</symbol>
	<symbol id="i_compare_on" fill="currentColor" viewBox="0 0 512 512">
		<path d="M232.5 5.171C247.4-1.718 264.6-1.718 279.5 5.171L498.1 106.2C506.6 110.1 512 118.6 512 127.1C512 137.3 506.6 145.8 498.1 149.8L279.5 250.8C264.6 257.7 247.4 257.7 232.5 250.8L13.93 149.8C5.438 145.8 0 137.3 0 127.1C0 118.6 5.437 110.1 13.93 106.2L232.5 5.171zM498.1 234.2C506.6 238.1 512 246.6 512 255.1C512 265.3 506.6 273.8 498.1 277.8L279.5 378.8C264.6 385.7 247.4 385.7 232.5 378.8L13.93 277.8C5.438 273.8 0 265.3 0 255.1C0 246.6 5.437 238.1 13.93 234.2L67.13 209.6L219.1 279.8C242.5 290.7 269.5 290.7 292.9 279.8L444.9 209.6L498.1 234.2zM292.9 407.8L444.9 337.6L498.1 362.2C506.6 366.1 512 374.6 512 383.1C512 393.3 506.6 401.8 498.1 405.8L279.5 506.8C264.6 513.7 247.4 513.7 232.5 506.8L13.93 405.8C5.438 401.8 0 393.3 0 383.1C0 374.6 5.437 366.1 13.93 362.2L67.13 337.6L219.1 407.8C242.5 418.7 269.5 418.7 292.9 407.8V407.8z"/>
	</symbol>
	<symbol id="i_close_circle" fill="currentColor" class="bi-x-circle" viewBox="0 0 16 16">
		<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
		<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
	</symbol>
	<symbol id="i_close_circle_filled" fill="currentColor" class="bi-x-circle-fill" viewBox="0 0 16 16">
		<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
	</symbol>
	<symbol id="i_close_mini" fill="currentColor" height="1em" viewBox="0 0 384 512">
		<path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
	</symbol>
	<symbol id="i_drag_drop" fill="currentColor" viewBox="0 0 576 512">
		<path d="M571.3 308.7l-96-96c-6.25-6.25-16.38-6.25-22.62 0s-6.25 16.38 0 22.62L521.4 304H208C199.2 304 192 311.2 192 320s7.156 16 16 16h313.4l-68.69 68.69c-6.25 6.25-6.25 16.38 0 22.62C455.8 430.4 459.9 432 464 432s8.188-1.562 11.31-4.688l96-96C577.6 325.1 577.6 314.9 571.3 308.7zM368 384c-8.836 0-16 7.164-16 16V448c0 17.67-14.33 32-32 32H64c-17.67 0-32-14.33-32-32V64c0-17.67 14.33-32 32-32h128v112C192 170.5 213.5 192 240 192H352v48C352 248.8 359.2 256 368 256C376.8 256 384 248.8 384 240V170.5c0-16.97-6.742-33.26-18.75-45.26L258.7 18.74C246.7 6.742 230.5 0 213.5 0H63.1C28.65 0 0 28.65 0 64l.0065 384c0 35.35 28.66 64 64 64H320c35.35 0 64-28.65 64-64v-48C384 391.2 376.8 384 368 384zM224 34.08c4.477 1.566 8.666 3.846 12.12 7.299l106.5 106.5C346.1 151.3 348.4 155.5 349.9 160H240C231.2 160 224 152.8 224 144V34.08z"/>
	</symbol>
	<symbol id="i_error_circle_filled" fill="currentColor" viewBox="0 0 512 512">
		<path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
	</symbol>
</svg>

