<?php

namespace app\modules\forms\models;

use app\behaviors\PrettyDateBehavior;
use app\behaviors\CompoundFieldBehavior;
use app\modules\admin\models\Patient;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "ht_report".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property integer $ccr_report_id
 * @property string $created_at
 * @property string $created_by
 * @property string $small_description
 * @property integer $clinical
 * @property string $discuss_date
 * @property string $thoracic_surgeon
 * @property string $intervention_cardiologist
 * @property string $cardiologist
 * @property string $referring_cardiologist
 *
 * @property string $anamnese
 * @property integer $ischemia_detection_x_ecg
 * @property integer $ischemia_detection_x_echo
 * @property integer $ischemia_detection_tc_ggm
 * @property string $ischemia_detection_tc_ggm_text
 * @property integer $ischemia_detection_x_mri
 * @property string $ischemia_detection_x_mri_text
 * @property string $recent_ef
 * @property string $recent_rvsp
 * @property integer $recent_mi
 * @property string $recent_ms
 * @property string $recent_mva
 * @property integer $recent_ti
 * @property string $recent_ts
 * @property string $recent_as
 * @property string $recent_ava
 * @property integer $recent_ai
 * @property string $recent_vvv
 * @property integer $cag_lm
 * @property integer $cag_rdap
 * @property integer $cag_rdam
 * @property integer $cag_d1
 * @property integer $cag_d2
 * @property integer $cag_s1
 * @property integer $cag_al
 * @property integer $cag_rcxp
 * @property integer $cag_mo
 * @property integer $cag_plx1
 * @property integer $cag_plx2
 * @property integer $cag_plx3
 * @property integer $cag_rca
 * @property integer $cag_ma
 * @property integer $cag_rdp
 * @property integer $cag_plr1
 * @property integer $cag_plr2
 * @property integer $cag_plr3
 * @property integer $cag_graft1
 * @property integer $cag_graft2
 * @property integer $cag_lima
 * @property integer $cag_rima
 * @property string $heerlen_advice_cons
 * @property string $heerlen_advice_ffr
 * @property string $heerlen_advice_consultation_ctc
 * @property string $heerlen_advice_naber_speak_with
 * @property string $ctc_maastricht_advice
 * @property string $additional
 * @property string $wait_advice
 * @property integer $hold_included
 * @property integer $urgent
 * @property integer $elective
 * @property string $cag_graft1_details
 * @property string $cag_graft2_details
 * @property string $cag_lima_details
 * @property string $cag_rima_details
 *
 * @property Patient $patient
 * @property CardiacCatheterizationReport $ccrReport
 * @property HtReportPrehistory[] $htReportPrehistories
 */
class HtReport extends ActiveRecord
{
    public static $interventionCardiologistValues = [
        'be' => 'BE',
        'ern' => 'ERN',
        'bo' => 'BO',
        'il' => 'IL',
    ];

    public static $cardiologistValues = [
        're' => 'RE',
        'cdc' => 'CDC',
        'ra' => 'RA',
        'erd' => 'ERD',
        've' => 'VE',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ht_report';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => function() { return date('Y-m-d H:i:s', time());},
            ],
            'cutOfTime' => [
                'class' => PrettyDateBehavior::className(),
                'attributes' => ['discuss_date'],
            ],
            'compoundField' => [
                'class' => CompoundFieldBehavior::className(),
                'attributes' => ['intervention_cardiologist', 'cardiologist'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'recent_mi', 'recent_ti', 'recent_ai'], 'required'],
            [['patient_id', 'created_by', 'clinical', 'ischemia_detection_x_ecg', 'ischemia_detection_x_echo', 'ischemia_detection_x_mri', 'recent_mi', 'recent_ti', 'recent_ai', 'cag_lm', 'cag_rdap', 'cag_rdam', 'cag_d1', 'cag_d2', 'cag_s1', 'cag_al', 'cag_mo', 'cag_plx1', 'cag_plx2', 'cag_plx3', 'cag_rca', 'cag_ma', 'cag_rdp', 'cag_plr1', 'cag_plr2', 'cag_plr3', 'cag_graft1', 'cag_graft2', 'cag_lima', 'cag_rima', 'hold_included', 'urgent', 'elective', 'cag_rcxp', 'cag_rcxm', 'cag_rcxd'], 'integer'],
            [['created_at', 'discuss_date', 'ccr_report_id'], 'safe'],
            [['small_description', 'anamnese', 'ctc_maastricht_advice', 'ischemia_detection_tc_ggm', 'additional'], 'string'],
            [['thoracic_surgeon', 'referring_cardiologist', 'ischemia_detection_tc_ggm_text', 'ischemia_detection_x_mri_text', 'recent_ef', 'recent_rvsp', 'recent_ms', 'recent_mva', 'recent_ts', 'recent_as', 'recent_ava', 'recent_vvv', 'heerlen_advice_cons', 'heerlen_advice_ffr', 'heerlen_advice_consultation_ctc', 'heerlen_advice_naber_speak_with', 'wait_advice'], 'string', 'max' => 255],
            [['cag_graft1_details', 'cag_graft2_details', 'cag_lima_details', 'cag_rima_details'], 'string', 'max' => 512],
            ['intervention_cardiologist', 'in', 'range' => array_keys(self::$interventionCardiologistValues), 'allowArray' => true],
            ['cardiologist', 'in', 'range' => array_keys(self::$cardiologistValues), 'allowArray' => true],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert) || !$insert) {
            // Do not allow update for ht report
            return false;
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('modules/forms/app', 'ID'),
            'patient_id' => Yii::t('modules/forms/app', 'Patient ID'),
            'ccr_report_id' => Yii::t('modules/forms/app', 'Ccr Report ID'),
            'created_at' => Yii::t('modules/forms/app', 'Created At'),
            'created_by' => Yii::t('modules/forms/app', 'Created By'),
            'small_description' => Yii::t('modules/forms/app', 'Small Description'),
            'clinical' => Yii::t('modules/forms/app', 'Clinical'),
            'discuss_date' => Yii::t('modules/forms/app', 'Discuss Date'),
            'thoracic_surgeon' => Yii::t('modules/forms/app', 'Thoracic Surgeon'),
            'intervention_cardiologist' => Yii::t('modules/forms/app', 'Intervention Cardiologist'),
            'cardiologist' => Yii::t('modules/forms/app', 'Cardiologist'),
            'referring_cardiologist' => Yii::t('modules/forms/app', 'Referring Cardiologist'),
            'anamnese' => Yii::t('modules/forms/app', 'Anamnese'),
            'ischemia_detection_x_ecg' => Yii::t('modules/forms/app', 'X-Ecg'),
            'ischemia_detection_x_echo' => Yii::t('modules/forms/app', 'X-Echo'),
            'ischemia_detection_tc_ggm' => Yii::t('modules/forms/app', 'Tc-99m'),
            'ischemia_detection_tc_ggm_text' => Yii::t('modules/forms/app', 'EF Tc-99m'),
            'ischemia_detection_x_mri' => Yii::t('modules/forms/app', 'X-MRI'),
            'ischemia_detection_x_mri_text' => Yii::t('modules/forms/app', 'X-MRI'),
            'recent_ef' => Yii::t('modules/forms/app', 'EF'),
            'recent_rvsp' => Yii::t('modules/forms/app', 'RVSP'),
            'recent_mi' => Yii::t('modules/forms/app', 'MI'),
            'recent_ms' => Yii::t('modules/forms/app', 'MS'),
            'recent_mva' => Yii::t('modules/forms/app', 'MVA'),
            'recent_ti' => Yii::t('modules/forms/app', 'TI'),
            'recent_ts' => Yii::t('modules/forms/app', 'TS'),
            'recent_as' => Yii::t('modules/forms/app', 'AS'),
            'recent_ava' => Yii::t('modules/forms/app', 'AVA'),
            'recent_ai' => Yii::t('modules/forms/app', 'AI'),
            'recent_vvv' => Yii::t('modules/forms/app', 'VVV'),
            'cag_lm' => Yii::t('modules/forms/app', 'Cag Lm'),
            'cag_rdap' => Yii::t('modules/forms/app', 'Cag Rdap'),
            'cag_rdam' => Yii::t('modules/forms/app', 'Cag Rdam'),
            'cag_lm' => Yii::t('app', 'LM'),
            'cag_rdap' => Yii::t('app', 'RDAp'),
            'cag_rdam' => Yii::t('app', 'RDAm'),
            'cag_rdad' => Yii::t('app', 'RDAd'),
            'cag_d1' => Yii::t('app', 'D1'),
            'cag_d2' => Yii::t('app', 'D2'),
            'cag_s1' => Yii::t('app', 'S1'),
            'cag_al' => Yii::t('app', 'AL'),
            'cag_rcxp' => Yii::t('app', 'RCXp'),
            'cag_rcxm' => Yii::t('app', 'RCXm'),
            'cag_mo' => Yii::t('app', 'MO'),
            'cag_rcxd' => Yii::t('app', 'RCXd'),
            'cag_plx1' => Yii::t('app', 'PLX1'),
            'cag_plx2' => Yii::t('app', 'PLX2'),
            'cag_plx3' => Yii::t('app', 'PLX3'),
            'cag_rca' => Yii::t('app', 'RCA'),
            'cag_ma' => Yii::t('app', 'MA'),
            'cag_rdp' => Yii::t('app', 'RDP'),
            'cag_plr1' => Yii::t('app', 'PLR1'),
            'cag_plr2' => Yii::t('app', 'PLR2'),
            'cag_plr3' => Yii::t('app', 'PLR3'),
            'cag_graft1' => Yii::t('app', 'Graft1'),
            'cag_graft2' => Yii::t('app', 'Graft2'),
            'cag_lima' => Yii::t('app', 'Lima'),
            'cag_rima' => Yii::t('app', 'Rima'),
            'cag_graft1_details' => Yii::t('app', 'Graft1 Details'),
            'cag_graft2_details' => Yii::t('app', 'Graft2 Details'),
            'cag_lima_details' => Yii::t('app', 'Lima Details'),
            'cag_rima_details' => Yii::t('app', 'Rima Details'),
            'heerlen_advice_cons' => Yii::t('modules/forms/app', 'CONS'),
            'heerlen_advice_ffr' => Yii::t('modules/forms/app', 'FFR'),
            'heerlen_advice_consultation_ctc' => Yii::t('modules/forms/app', 'Consultation CTC'),
            'heerlen_advice_naber_speak_with' => Yii::t('modules/forms/app', 'Naber Speak With'),
            'ctc_maastricht_advice' => Yii::t('modules/forms/app', 'CTC Maastricht Advice'),
            'additional' => Yii::t('modules/forms/app', 'Optional'),
            'wait_advice' => Yii::t('modules/forms/app', 'Wait Advice'),
            'hold_included' => Yii::t('modules/forms/app', 'Hold Included'),
            'urgent' => Yii::t('modules/forms/app', 'Urgent'),
            'elective' => Yii::t('modules/forms/app', 'Elective'),
            'cag_graft1_details' => Yii::t('modules/forms/app', 'Cag Graft1 Details'),
            'cag_graft2_details' => Yii::t('modules/forms/app', 'Cag Graft2 Details'),
            'cag_lima_details' => Yii::t('modules/forms/app', 'Cag Lima Details'),
            'cag_rima_details' => Yii::t('modules/forms/app', 'Cag Rima Details'),
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
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCcrReport()
    {
        return $this->hasOne(CardiacCatheterizationReport::className(), ['id' => 'ccr_report_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHtReportPrehistories()
    {
        return $this->hasMany(HtReportPrehistory::className(), ['ht_report_id' => 'id']);
    }

    /**
     * Generates array of cardiac catheterization reports in form [ccr_id => ccr->created_at]
     * @return array
     */
    public function getCcrArray()
    {
        $ccReports = $this->patient
            ->getCardiacCatheterizationReports()
            ->orderBy('created_at desc')
            ->all();

        $ccrSelect = [];
        foreach ($ccReports as $report) {
            $ccrSelect[$report->id] = $report->updated_at;
        }

        return $ccrSelect;
    }

    /**
     * Loads data from specified hc report
     *
     * @param CardiacCatheterizationReport $hc
     */
    public function loadFromHc(CardiacCatheterizationReport $hc)
    {
        foreach ($this->attributes as $key => $value) {
            if (preg_match('/^cag_(.*)$/', $key, $matches)) {
                // Load CAG data
                $hcKey = $matches[1];
                $this->{$key} = $hc->{$hcKey};
            }
        }
    }
}
