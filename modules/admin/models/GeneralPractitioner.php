<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "general_practitioner".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $zip_code
 * @property string $city
 * @property string $code
 *
 * @property Patient[] $patients
 */
class GeneralPractitioner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'general_practitioner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'code'], 'required'],
            [['name', 'address'], 'string', 'max' => 1024],
            [['zip_code', 'code'], 'string', 'max' => 12],
            [['city'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'zip_code' => Yii::t('app', 'Zip Code'),
            'city' => Yii::t('app', 'City'),
            'code' => Yii::t('app', 'Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatients()
    {
        return $this->hasMany(Patient::className(), ['general_practitioner_id' => 'id']);
    }
}
