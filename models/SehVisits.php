<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emergency_check".
 *
 * @property integer $id
 * @property string $pid
 * @property string $type_of_treatment
 * @property string $emergency_id
 * @property string $filename
 * @property string $mtime
 * @property string $arrival_date
 * @property string $departure_date
 * @property string $treating_speciality
 * @property integer $treating_speciality_disabled
 * @property string $emergency_status
 */
class SehVisits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seh_visits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename'], 'required'],
            [['arrival_date', 'departure_date'], 'safe'],
            [['treating_speciality_disabled'], 'integer'],
            [['pid'], 'string', 'max' => 12],
            [['type_of_treatment', 'emergency_id', 'mtime', 'treating_speciality'], 'string', 'max' => 255],
            [['filename', 'emergency_status'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pid' => Yii::t('app', 'Pid'),
            'type_of_treatment' => Yii::t('app', 'Type Of Treatment'),
            'emergency_id' => Yii::t('app', 'Emergency ID'),
            'filename' => Yii::t('app', 'Filename'),
            'mtime' => Yii::t('app', 'Mtime'),
            'arrival_date' => Yii::t('app', 'Arrival Date'),
            'departure_date' => Yii::t('app', 'Departure Date'),
            'treating_speciality' => Yii::t('app', 'Treating Speciality'),
            'treating_speciality_disabled' => Yii::t('app', 'Treating Speciality Disabled'),
            'emergency_status' => Yii::t('app', 'Emergency Status'),
        ];
    }
}
