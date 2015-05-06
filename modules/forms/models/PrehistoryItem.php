<?php

namespace app\modules\forms\models;

use Yii;

/**
 * This is the model class for table "prehistory_item".
 *
 * @property integer $id
 * @property string $name
 *
 * @property PatientPrehistory[] $patientPrehistories
 */
class PrehistoryItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prehistory_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientPrehistories()
    {
        return $this->hasMany(PatientPrehistory::className(), ['prehistory_item_id' => 'id']);
    }
}
