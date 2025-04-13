<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--	<meta name="csrf-token" content="zCCn5LiYsXysrOKcc2HJVmsKbEy5xYfmYpE3iIff">-->
	<!--	<link rel="icon" href="/img/favicons/favicon4.webp" type="image/x-icon">-->
	<link rel="icon" href="<?= '/img/favicons/favicon' . mt_rand(1,12) . '.webp' ?>" type="image/x-icon">

	<title>cakephp 5 _ CAR SALE</title>
	<link href="/plugins/bootstrap-5/css/bootstrap.css" rel="stylesheet">
	<script src="/plugins/bootstrap-5/js/bootstrap.bundle.min.js"></script>
	<link href="/css/bootstrap_addition.css" rel="stylesheet">
	<script src="/plugins/jquery-3.7.1.min.js" type="text/javascript"></script>
	<script src="/plugins/jquery-cookie.js" type="text/javascript"></script>
	<script src="/js/_my_functions_lib.js" type="text/javascript"></script>
	<link href="/css/my_reset.css" rel="stylesheet">
	<link id="color_theme" href="/css/color_theme__blue.css" rel="stylesheet">
	<link href="/css/index_car.css" rel="stylesheet">
	<script src="/js/main__index.js" type="module"></script>
	<script src="/plugins/live_only_JS_and_css.js" type="text/javascript"></script>
	<script src="/plugins/faker-5.5.3.min.js" type="text/javascript"></script>
	<style type="text/css">
    @media only screen and (max-width: 575.98px) {
      viewport_detector {
        content: "mobile";
      }
    }
    @media only screen and (min-width: 576px) {
      viewport_detector {
        content: "tablet";
      }
    }
    @media only screen and (min-width: 800px) {
      viewport_detector {
        content: "desktop";
      }
    }</style>
</head>
<body class="d-flex flex-column h-100">

<?= $content ?>

</body>
</html>
