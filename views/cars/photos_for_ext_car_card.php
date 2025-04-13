<?php
for ($i = 0; $i < 5; $i++) {
	$carPhotos[] = isset($photos[$i]) ? "/storage/cars_photos/small_duplicates/" . pathinfo($photos[$i]["filename"], PATHINFO_FILENAME) . ".webp" : "";
}
foreach ($carPhotos as $photo)
	if ($photo == "") {
		?>
		<div class="ext_card_empty_img"></div>
	<?php } else { ?>
		<img src="<?= $photo ?>" class="ext_car_card_microphoto" alt="car photo">
	<?php } ?>
