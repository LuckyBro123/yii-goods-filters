<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cars_photos".
 *
 * @property int $id
 * @property string $filename
 * @property int $car_id
 * @property int $number
 * @property string $description
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class CarPhoto extends \yii\db\ActiveRecord {
	public function getCar()
	{
		return $this->hasOne(Car::class, ['id' => 'car_id']);
	}
	// ▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪
	public static function tableName() {
		return 'cars_photos';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['filename', 'car_id', 'description'], 'required'],
			[['car_id', 'number'], 'integer'],
			[['created_at', 'updated_at'], 'safe'],
			[['filename'], 'string', 'max' => 50],
			[['description'], 'string', 'max' => 200],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'          => 'ID',
			'filename'    => 'Filename',
			'car_id'      => 'Car ID',
			'number'      => 'Number',
			'description' => 'Description',
			'created_at'  => 'Created At',
			'updated_at'  => 'Updated At',
		];
	}
}
