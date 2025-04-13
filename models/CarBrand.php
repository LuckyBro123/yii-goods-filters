<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cars_brands".
 *
 * @property int $id
 * @property string $name
 *
 * @property CarsModels[] $carsModels
 */
class CarBrand extends \yii\db\ActiveRecord {
	public function getCars() {
		return $this->hasMany(Car::class, ['brand_id' => 'id']);
	}

// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	public static function tableName() {
		return 'cars_brands';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['name'], 'required'],
			[['name'], 'string', 'max' => 25],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'   => 'ID',
			'name' => 'Name',
		];
	}

	/**
	 * Gets query for [[CarsModels]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getCarsModels() {
		return $this->hasMany(CarsModels::class, ['brand_id' => 'id']);
	}
}
