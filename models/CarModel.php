<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cars_models".
 *
 * @property int $id
 * @property string $name
 * @property int $brand_id
 *
 * @property CarsBrands $brand
 */
class CarModel extends \yii\db\ActiveRecord {

	public function getCars() {
		return $this->hasMany(Car::class, ['model_id' => 'id']);
	}

	// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	public static function tableName() {
		return 'cars_models';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['name', 'brand_id'], 'required'],
			[['brand_id'], 'integer'],
			[['name'], 'string', 'max' => 25],
			[['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarsBrands::class, 'targetAttribute' => ['brand_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'       => 'ID',
			'name'     => 'Name',
			'brand_id' => 'Brand ID',
		];
	}

	/**
	 * Gets query for [[Brand]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getBrand() {
		return $this->hasOne(CarsBrands::class, ['id' => 'brand_id']);
	}
}
