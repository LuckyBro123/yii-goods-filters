<?php

namespace app\controllers;

use app\models\Car;
use app\models\CarBrand;
use app\models\CarModel;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\log\Logger;
use yii\web\Controller;
use yii\web\Response;

class CarsController extends \yii\web\Controller {
// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪  TEST  ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	public function actionTest() {
		$RESULTS_LIMIT = 15;

		$query = $this->createSearchQuery("des");
		$numberAdditionallyFound = $query->count();

		$cars = $query->limit($RESULTS_LIMIT)->all();
		$numberAdditionallyFound -= count($cars);

		$foundCars = [];
		foreach ($cars as $car) {
			$brand = CarBrand::findOne($car["brand_id"])->name;
			$model = CarModel::findOne($car["model_id"])->name;

			$title = $brand . " " . $model . "    " . $car["production_year"] . "       " . number_format($car["price"], 0, "", " ") . " $";
			$foundCars[] = ["title" => $title, "id" => $car["id"]];
		}
		ArrayHelper::multisort($foundCars, ['title'], [SORT_ASC]);
		dd($foundCars);


		return [$foundCars, $numberAdditionallyFound];

//		\Yii::info('ПРИВЕТ', 'custom-category');
		$goods = Car::find()
//			->joinWith(['carsPhotos', 'carsModels', 'carsBrands'])
			->orderBy('RAND()')->all();
		foreach ($goods as $car) {
			dd($car->photos);
		}
		$photos = $car->photos;
		dd($car, $photos, $car->fullname);
		$time = microtime(true) * 1000;
		sleep(1);
		dump(microtime(true) * 1000 - $time);
		echo "TEST";
		exit();
	}

// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪  TEST  ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪

	public function actionIndex() {
		$sortMode = "brand_asc";
		$productsPerPage = 15;

		$goods = Car::find()
//			->joinWith(['carsPhotos', 'carsModels', 'carsBrands'])
			->where(['deleted_at' => null])
			->orderBy('RAND()');

//		$goods = Article::find()->where(['status' => 1]);
		$countGoods = clone $goods;
		$pages = new Pagination(['totalCount' => $countGoods->count()]);

		$goods = $goods->offset($pages->offset)
			->limit($pages->limit)
			->all();
//		dd($pages);
		$brands = $this->getBrands();
		$pluralWords = ["машина", "машины", "машин"];
		$allSortModes = $this->getSortModes();

		$this->layout = 'carsale';

		return $this->render('carsale_index', [
			'goods'           => $goods,
			'pages'           => $pages,
			'sortMode'        => $sortMode,
			'productsPerPage' => $productsPerPage,
			'brands'          => $brands,
			'pluralWords'     => $pluralWords,
			'allSortModes'    => $allSortModes,
		]);
	}

	public function beforeAction($action) {
		if ($action->id !== 'xaxaxa') {
			$this->enableCsrfValidation = false;
		}
		return parent::beforeAction($action);
	}

	// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	public function actionMicrophotos() {
//		dd("actionMicrophotos");
		$this->enableCsrfValidation = false;
		\Yii::$app->response->format = Response::FORMAT_JSON;

		$id = \Yii::$app->request->post('id');

		$photos = (new Query())
			->select(['filename'])
			->from('cars_photos')
			->where(['car_id' => $id])
			->orderBy(['number' => SORT_ASC])
			->limit(5)
			->all();

		if ($photos) {
			$html = $this->renderPartial('photos_for_ext_car_card', ['photos' => $photos]);
			return ['success' => 1, 'html' => $html];
		} else {
			return ['success' => 0, 'id' => $id];
		}
	}

	// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	public function actionDynamicsearch() {
		\Yii::$app->response->format = Response::FORMAT_JSON;

		$searchStr = \Yii::$app->request->post('search_str');
		[$foundCars, $numberAdditionallyFound] = $this->doDynamicSearch($searchStr);

		if (count($foundCars) > 0) {
			$html = $this->renderPartial('dynamic_search_list_item', [
				'foundCars'               => $foundCars,
				'numberAdditionallyFound' => $numberAdditionallyFound,
				'searchStr'               => $searchStr
			]);
			return ['success' => 1, 'html' => $html];
		} else {
			return ['success' => 0];
		}
	}

	// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	public function doDynamicSearch($searchStr) {
		$RESULTS_LIMIT = 15;

		$query = $this->createSearchQuery($searchStr);
		$numberAdditionallyFound = $query->count();

		$cars = $query->limit($RESULTS_LIMIT)->all();
		$numberAdditionallyFound -= count($cars);

		$foundCars = [];
		foreach ($cars as $car) {
			$brand = CarBrand::findOne($car["brand_id"])->name;
			$model = CarModel::findOne($car["model_id"])->name;

			$title = $brand . " " . $model . "    " . $car["production_year"] . "       " . number_format($car["price"], 0, "", " ") . " $";
			$foundCars[] = ["title" => $title, "id" => $car["id"]];
		}
		ArrayHelper::multisort($foundCars, ['title'], [SORT_ASC]);

		return [$foundCars, $numberAdditionallyFound];
	}
	/*	function doDynamicSearch($searchStr) {
			$RESULTS_LIMIT = 15;

			$cars = $this->createSearchQuery($searchStr)->contain(['CarsBrands', 'CarsModels']);
			$numberAdditionallyFound = $cars->count();
			$cars = $cars->limit($RESULTS_LIMIT)->all();
			$numberAdditionallyFound -= $cars->count();

			// convert found cars to the result array of car->name + car->id
			$foundCars = [];
			foreach ($cars as $car) {
				$title = $car->cars_brand->name . " " . $car->cars_model->name . "    " . $car->production_year . "       " . number_format($car->price, 0, "", " ") . " $";
				$foundCars[] = ["title" => $title, "id" => $car->id];
			}
			return [collection($foundCars)->sortBy('title'), $numberAdditionallyFound];
		}*/

// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
//  for dynamic search - parses the query string and returns an Eloquent query
	public function createSearchQuery($search_str, $limit = 100000) {
		$words = str_word_count($search_str, 1, '1234567890йцукенгшщзхъфывапролджэячсмитьбюёЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁ');

		if (count($words) == 1) {
			if (strlen($words[0]) < 2) {
				return new Query(); // Пустой запрос
			}

			return (new Query())
				->select('Cars.*')
				->from('cars Cars')
				->leftJoin('cars_brands CarsBrands', 'CarsBrands.id = Cars.brand_id')
				->leftJoin('cars_models CarsModels', 'CarsModels.id = Cars.model_id')
				->where(['or',
				         ['like', 'CarsBrands.name', '%' . $words[0] . '%', false],
				         ['like', 'CarsModels.name', '%' . $words[0] . '%', false]
				])
				->limit($limit);
		} else {
			// 2+ words - 1-brand & 2-model
			return (new Query())
				->select('Cars.*')
				->from('cars Cars')
				->innerJoin('cars_brands CarsBrands', 'CarsBrands.id = Cars.brand_id')
				->innerJoin('cars_models CarsModels', 'CarsModels.id = Cars.model_id')
				->where(['like', 'CarsBrands.name', '%' . $words[0] . '%', false])
				->andWhere(['like', 'CarsModels.name', '%' . $words[1] . '%', false])
				->limit($limit);
		}
	}

	/*	function createSearchQuery($search_str, $limit = 100000) {
			$words = str_word_count($search_str, 1, '1234567890йцукенгшщзхъфывапролджэячсмитьбюёЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁ');
			if (count($words) == 1) {
				if (strlen($words[0]) < 2) return collection();

				$cars = $this->fetchTable('Cars')->find()
					->join([
						'CarsBrands' => [
							'table'      => 'cars_brands',
							'type'       => 'LEFT',
							'conditions' => 'CarsBrands.id = Cars.brand_id'
						],
						'CarsModels' => [
							'table'      => 'cars_models',
							'type'       => 'LEFT',
							'conditions' => 'CarsModels.id = Cars.model_id'
						]
					])
					->where([
						'OR' => [
							'CarsBrands.name LIKE' => '%' . $words[0] . '%',
							'CarsModels.name LIKE' => '%' . $words[0] . '%'
						]
					])
					->order('RAND()');
			} else {
				// 2+ words - 1-brand & 2-model
				$cars = $this->fetchTable('Cars')->find()
					->matching('CarsBrands', function ($q) use ($words) {
						return $q->where(['CarsBrands.name LIKE' => '%' . $words[0] . '%']);
					})
					->matching('CarsModels', function ($q) use ($words) {
						return $q->where(['CarsModels.name LIKE' => '%' . $words[1] . '%']);
					});
			}
			return $cars;
		}*/

// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	function getBrands() {
		$query = new Query();
		$brands = $query->select(['code', 'binded_table_value'])
			->from('filters_cars')
			->where(['filter_group_title_on_site' => 'Brand'])
			->all();

		$result = [];
		foreach ($brands as $brand) {
			$result[$brand['code']] = $brand['binded_table_value'];
		}

		return $result;
	}

// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	public
	function getSortModes() {
		return ['brand_asc'  => 'Name ascending',
		        'brand_desc' => 'Name descending',
		        'year_asc'   => 'Year ascending',
		        'year_desc'  => 'Year descending',
		        'price_asc'  => 'Price ascending',
		        'price_desc' => 'Price descending',
		        'latest'     => 'Latest',
		        'oldest'     => 'Oldest',
		        'random'     => 'Randomly'];
	}

}
