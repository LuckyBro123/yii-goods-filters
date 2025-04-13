<ul>
	<?php foreach ($foundCars as $car) { ?>
		<li class="dynamic_search_list_item">
			<a href=""><?= $car["title"] ?></a>
		</li>
	<?php } ?>
	<?php if ($numberAdditionallyFound > 0) { ?>
		<li class="dynamic_search_list_item ">
			<a class="additional_message_below" href="">click here for more results...</a>
		</li>
	<?php } ?>
</ul>
