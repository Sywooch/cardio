<?php

namespace app\modules\admin\models;

use app\behaviors\PrettyDateBehavior;
use app\modules\forms\models\PciReport;
use app\modules\forms\models\HtReport;
use app\modules\forms\models\CardiacCatheterizationReport;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $pid
 * @property string $name
 * @property string $bsn
 * @property string $sex
 * @property string $birth_date
 * @property string $address
 * @property string $zip_code
 * @property string $city
 * @property string $country
 * @property string $phone
 * @property string $maiden_name
 * @property integer $died
 * @property string $died_at
 * @property integer $general_practitioner_id
 * @property string $insurance
 * @property string $fds_polis_nr
 *
 * @property GeneralPractitioner $generalPractitioner
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    public function behaviors()
    {
        return [
            'cutOffTime' => [
                'class' => PrettyDateBehavior::className(),
                'attributes' => ['birth_date'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'name', 'sex'], 'required'],
            [['birth_date', 'died_at'], 'safe'],
            [['died', 'general_practitioner_id'], 'integer'],
            [['pid', 'zip_code', 'country'], 'string', 'max' => 12],
            [['name', 'city'], 'string', 'max' => 1024],
            [['bsn', 'address'], 'string', 'max' => 2048],
            [['sex', 'phone', 'maiden_name', 'fds_polis_nr'], 'string', 'max' => 255],
            [['insurance'], 'string', 'max' => 512]
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
            'name' => Yii::t('app', 'Name'),
            'bsn' => Yii::t('app', 'Bsn'),
            'sex' => Yii::t('app', 'Sex'),
            'birth_date' => Yii::t('app', 'Birth Date'),
            'address' => Yii::t('app', 'Address'),
            'zip_code' => Yii::t('app', 'Zip Code'),
            'city' => Yii::t('app', 'City'),
            'country' => Yii::t('app', 'Country'),
            'phone' => Yii::t('app', 'Phone'),
            'maiden_name' => Yii::t('app', 'Maiden Name'),
            'died' => Yii::t('app', 'Died'),
            'died_at' => Yii::t('app', 'Died At'),
            'general_practitioner_id' => Yii::t('app', 'General Practitioner ID'),
            'insurance' => Yii::t('app', 'Insurance'),
            'fds_polis_nr' => Yii::t('app', 'Fds Polis Nr'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralPractitioner()
    {
        return $this->hasOne(GeneralPractitioner::className(), ['id' => 'general_practitioner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPciReports()
    {
        return $this->hasMany(PciReport::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHtReports()
    {
        return $this->hasMany(HtReport::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardiacCatheterizationReports()
    {
        return $this->hasMany(CardiacCatheterizationReport::className(), ['patient_id' => 'id']);
    }
}
