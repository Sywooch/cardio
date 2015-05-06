<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "report".
 *
 * @property integer $id
 * @property string $report
 * @property string $type
 * @property string $patient_id
 * @property integer $created_at
 */
class Report extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report'], 'string'],
            [['created_at'], 'integer'],
            [['type', 'patient_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'report' => Yii::t('app', 'Report'),
            'type' => Yii::t('app', 'Type'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
