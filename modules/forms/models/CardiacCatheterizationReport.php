<?php

namespace app\modules\forms\models;

use app\behaviors\PrettyDateBehavior;
use app\modules\admin\models\Patient;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cardiac_catheterization_report".
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
 * @property integer $complication
 * @property string $complication_details
 * @property integer $lm
 * @property integer $rdap
 * @property integer $rdam
 * @property integer $rdad
 * @property integer $d1
 * @property integer $d2
 * @property integer $s1
 * @property integer $al
 * @property integer $cxp
 * @property integer $cxm
 * @property integer $mo
 * @property integer $cxd
 * @property integer $plx1
 * @property integer $plx2
 * @property integer $plx3
 * @property integer $rca
 * @property integer $ma
 * @property integer $rdp
 * @property integer $plr1
 * @property integer $plr2
 * @property integer $plr3
 * @property integer $graft1
 * @property integer $graft2
 * @property integer $lima
 * @property integer $rima
 * @property string $cag_details
 * @property string $proposal
 *
 * @property Patient $patient
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class CardiacCatheterizationReport extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cardiac_catheterization_report';
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'clinical', 'supervisor_present'], 'required'],
            [['patient_id', 'created_by', 'updated_by', 'clinical', 'supervisor_present', 'complication', 'lm', 'rdap', 'rdam', 'rdad', 'd1', 'd2', 's1', 'al', 'rcxp', 'rcxm', 'mo', 'rcxd', 'plx1', 'plx2', 'plx3', 'rca', 'ma', 'rdp', 'plr1', 'plr2', 'plr3', 'graft1', 'graft2', 'lima', 'rima'], 'integer'],
            [['created_at', 'updated_at', 'movie_date'], 'safe'],
            [['complication_details', 'cag_details', 'proposal', 'small_description'], 'string'],
            [['phd_candidate', 'supervised_cardiologist'], 'string', 'max' => 100],
            [['graft1_details', 'graft2_details', 'lima_details', 'rima_details'], 'string', 'max' => 512]
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
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'movie_date' => Yii::t('modules/forms/app', 'Movie Date'),
            'clinical' => Yii::t('modules/forms/app', 'Clinical'),
            'supervisor_present' => Yii::t('modules/forms/app', 'Supervisor present'),
            'phd_candidate' => Yii::t('modules/forms/app', 'Phd candidate'),
            'supervised_cardiologist' => Yii::t('modules/forms/app', 'Supervised cardiologist'),
            'complication' => Yii::t('app', 'Complication'),
            'complication_details' => Yii::t('modules/forms/app', 'Complication details'),
            'lm' => Yii::t('app', 'LM'),
            'rdap' => Yii::t('app', 'RDAp'),
            'rdam' => Yii::t('app', 'RDAm'),
            'rdad' => Yii::t('app', 'RDAd'),
            'd1' => Yii::t('app', 'D1'),
            'd2' => Yii::t('app', 'D2'),
            's1' => Yii::t('app', 'S1'),
            'al' => Yii::t('app', 'AL'),
            'rcxp' => Yii::t('app', 'RCXp'),
            'rcxm' => Yii::t('app', 'RCXm'),
            'mo' => Yii::t('app', 'MO'),
            'rcxd' => Yii::t('app', 'RCXd'),
            'plx1' => Yii::t('app', 'PLX1'),
            'plx2' => Yii::t('app', 'PLX2'),
            'plx3' => Yii::t('app', 'PLX3'),
            'rca' => Yii::t('app', 'RCA'),
            'ma' => Yii::t('app', 'MA'),
            'rdp' => Yii::t('app', 'RDP'),
            'plr1' => Yii::t('app', 'PLR1'),
            'plr2' => Yii::t('app', 'PLR2'),
            'plr3' => Yii::t('app', 'PLR3'),
            'graft1' => Yii::t('app', 'Graft1'),
            'graft2' => Yii::t('app', 'Graft2'),
            'lima' => Yii::t('app', 'Lima'),
            'rima' => Yii::t('app', 'Rima'),
            'graft1_details' => Yii::t('app', 'Graft1 Details'),
            'graft2_details' => Yii::t('app', 'Graft2 Details'),
            'lima_details' => Yii::t('app', 'Lima Details'),
            'rima_details' => Yii::t('app', 'Rima Details'),
            'cag_details' => Yii::t('modules/forms/app', 'Cag Details'),
            'proposal' => Yii::t('app', 'Proposal Details'),
            'small_description' => Yii::t('app', 'Small description'),
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
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'updated_by']);
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
