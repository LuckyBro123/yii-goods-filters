<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property int $brand_id
 * @property int $model_id
 * @property int $body_type_id
 * @property int $color_id
 * @property int $gearbox_id
 * @property int $engine_type_id
 * @property int $engine_capacity
 * @property int $engine_power
 * @property float $fuel_consumption
 * @property int $production_year
 * @property int $clearance
 * @property int $wheelbase
 * @property int $number_doors
 * @property int $number_places
 * @property int $length
 * @property int $width
 * @property int $height
 * @property int $mileage
 * @property int $was_in_accident
 * @property int $price
 * @property int $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Car extends \yii\db\ActiveRecord {
	public function getFullname() {
		return $this->brand->name . " " . $this->model->name;
	}
	// Определяем отношение "has many" к модели CarPhoto
	public function getPhotos() {
		return $this->hasMany(CarPhoto::class, ['car_id' => 'id']);
	}

	// Определяем отношение "belongs to" к модели CarBrand
	public function getBrand() {
		return $this->hasOne(CarBrand::class, ['id' => 'brand_id']);
	}

	public function getModel() {
		return $this->hasOne(CarModel::class, ['id' => 'model_id']);
	}
	// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪

	// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	public static function tableName() {
		return 'cars';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['brand_id', 'model_id', 'body_type_id', 'color_id', 'gearbox_id', 'engine_type_id'], 'required'],
			[['brand_id', 'model_id', 'body_type_id', 'color_id', 'gearbox_id', 'engine_type_id', 'engine_capacity', 'engine_power', 'production_year', 'clearance', 'wheelbase', 'number_doors', 'number_places', 'length', 'width', 'height', 'mileage', 'was_in_accident', 'price', 'user_id'], 'integer'],
			[['fuel_consumption'], 'number'],
			[['created_at', 'updated_at', 'deleted_at'], 'safe'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'               => 'ID',
			'brand_id'         => 'Brand ID',
			'model_id'         => 'Model ID',
			'body_type_id'     => 'Body Type ID',
			'color_id'         => 'Color ID',
			'gearbox_id'       => 'Gearbox ID',
			'engine_type_id'   => 'Engine Type ID',
			'engine_capacity'  => 'Engine Capacity',
			'engine_power'     => 'Engine Power',
			'fuel_consumption' => 'Fuel Consumption',
			'production_year'  => 'Production Year',
			'clearance'        => 'Clearance',
			'wheelbase'        => 'Wheelbase',
			'number_doors'     => 'Number Doors',
			'number_places'    => 'Number Places',
			'length'           => 'Length',
			'width'            => 'Width',
			'height'           => 'Height',
			'mileage'          => 'Mileage',
			'was_in_accident'  => 'Was In Accident',
			'price'            => 'Price',
			'user_id'          => 'User ID',
			'created_at'       => 'Created At',
			'updated_at'       => 'Updated At',
			'deleted_at'       => 'Deleted At',
		];
	}
}
