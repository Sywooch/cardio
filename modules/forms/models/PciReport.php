<?php

namespace app\modules\forms\models;

use app\behaviors\PrettyDateBehavior;
use app\behaviors\CompoundFieldBehavior;
use app\modules\admin\models\Patient;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pci_report".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $movie_date
 * @property integer $clinical
 * @property integer $supervisor_present
 * @property string $phd_candidate
 * @property string $supervised_cardiologist
 * @property string $small_description
 *
 * @property PciReportArtery[] $arteries
 * @property Patient $patient
 */
class PciReport extends ActiveRecord
{
    /**
     * @var
     * Supervised cardiologist checkbox values first row
     */
    public static $scValuesFirstRow = [
        'be' => 'BE',
        'bo' => 'BO',
        'cdc' => 'CDC',
        'ern' => 'ERN',
    ];

    /**
     * @var
     * Supervised cardiologist checkbox values second row
     */
    public static $scValuesSecondRow = [
    ];

    /**
     * @var
     * Supervised cardiologist checkbox values third row
     */
    public static $scValuesThirdRow = [
        'ho' => 'HO',
        'il' => 'IL',
        'ra' => 'RA',
        've' => 'VE',
        'erd' => 'ERD',
    ];

    /**
     * @var
     * Supervised cardiologist checkbox values fourth row
     */
    public static $scValuesFourthRow = [
        'ru' => 'RU',
        'va' => 'VA',
        'vo' => 'vO',
        'th' => 'TH',
        're' => 'RE',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pci_report';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function() { return date('Y-m-d H:i:s', time());},
            ],
            'cutOfTime' => [
                'class' => PrettyDateBehavior::className(),
                'attributes' => ['movie_date'],
            ],
            'compoundField' => [
                'class' => CompoundFieldBehavior::className(),
                'attributes' => ['supervised_cardiologist'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $scValues = array_keys(array_merge(
            static::$scValuesFirstRow,
            static::$scValuesSecondRow,
            static::$scValuesThirdRow,
            static::$scValuesFourthRow
        ));

        return [
            [['patient_id', 'clinical', 'supervisor_present'], 'required'],
            [['patient_id', 'created_by', 'updated_by', 'clinical', 'supervisor_present'], 'integer'],
            [['created_at', 'updated_at', 'movie_date'], 'safe'],
            [['small_description'], 'string'],
            [['phd_candidate'], 'string', 'max' => 100],
            ['supervised_cardiologist', 'in', 'range' => $scValues, 'allowArray' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('modules/forms/app', 'ID'),
            'patient_id' => Yii::t('modules/forms/app', 'Patient ID'),
            'created_at' => Yii::t('modules/forms/app', 'Created At'),
            'created_by' => Yii::t('modules/forms/app', 'Created By'),
            'updated_at' => Yii::t('modules/forms/app', 'Updated At'),
            'updated_by' => Yii::t('modules/forms/app', 'Updated By'),
            'movie_date' => Yii::t('modules/forms/app', 'Movie Date'),
            'clinical' => Yii::t('modules/forms/app', 'Clinical'),
            'supervisor_present' => Yii::t('modules/forms/app', 'Supervisor Present'),
            'phd_candidate' => Yii::t('modules/forms/app', 'Phd Candidate'),
            'supervised_cardiologist' => Yii::t('modules/forms/app', 'Supervised Cardiologist'),
            'small_description' => Yii::t('modules/forms/app', 'Small Description'),
        ];
    }

    /**
     * Perform some additional checks before save
     *
     * @param boolean $insert whether this is method called while inserting a 
     * record.
     * @return boolean whether saving should continue
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert) && ($insert || $this->isUpdatable())) {
            return true;
        }

        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArteries()
    {
        return $this->hasMany(PciReportArtery::className(), ['pci_report_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }

    /**
     * Check if form is updatable today
     */
    public function isUpdatable()
    {
        $created_at_time = strtotime($this->created_at);

        if (strftime('%Y-%m-%d', $created_at_time) === strftime('%Y-%m-%d')) {
            // checking whether form was created today
            return true;
        }

        return false;
    }
}
