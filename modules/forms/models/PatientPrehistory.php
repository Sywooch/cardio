<?php

namespace app\modules\forms\models;

use Yii;
use app\modules\admin\models\Patient;

/**
 * This is the model class for table "patient_prehistory".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property integer $prehistory_item_id
 * @property string $date
 * @property string $text
 *
 * @property Patient $patient
 * @property PrehistoryItem $prehistoryItem
 */
class PatientPrehistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_prehistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'prehistory_item_id'], 'integer'],
            [['date'], 'safe'],
            [['text'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'prehistory_item_id' => Yii::t('app', 'Prehistory Item ID'),
            'date' => Yii::t('app', 'Date'),
            'text' => Yii::t('app', 'Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrehistoryItem()
    {
        return $this->hasOne(PrehistoryItem::className(), ['id' => 'prehistory_item_id']);
    }
}
