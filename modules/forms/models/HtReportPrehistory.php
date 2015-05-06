<?php

namespace app\modules\forms\models;

use Yii;

/**
 * This is the model class for table "ht_report_prehistory".
 *
 * @property integer $id
 * @property string $date
 * @property string $description
 * @property string $type
 * @property integer $ht_report_id
 *
 * @property HtReport $htReport
 */
class HtReportPrehistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ht_report_prehistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'type', 'ht_report_id'], 'required'],
            [['description'], 'string'],
            [['ht_report_id'], 'integer'],
            [['date', 'type'], 'string', 'max' => 255],
            ['date', 'validateCustomDate'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('modules/forms/app', 'ID'),
            'date' => Yii::t('modules/forms/app', 'Date'),
            'description' => Yii::t('modules/forms/app', 'Description'),
            'type' => Yii::t('modules/forms/app', 'Type'),
            'ht_report_id' => Yii::t('modules/forms/app', 'Ht Report ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHtReport()
    {
        return $this->hasOne(HtReport::className(), ['id' => 'ht_report_id']);
    }

    /**
     * Custom validator for date
     */
    public function validateCustomDate($attribute)
    {
        $errorOccurred = false;
        $message = Yii::t('modules/forms/app', 'Wrong date format. It should be either dd/mm/yyyy or mm/yyyy or yyyy');
        if (!preg_match('/(\d{2}\/)?(\d{2}\/)?(\d{4})/', $this->{$attribute}, $matches)) {
            $errorOccurred = true;
        } else {
            // Validating day
            if (preg_match('/(\d{2})\//', $matches[1], $dayMatches)) {
                if (intval($dayMatches[1]) > 31) {
                    $errorOccurred = true;
                }
            }

            // Validating month
            if (isset($matches[2]) && preg_match('/(\d{2})\//', $matches[2], $monthMatches)) {
                if (intval($monthMatches[1]) > 12) {
                    $errorOccurred = true;
                }
            }

            // Validating year
            if ((int)$matches[3] > (int) date('Y')) {
                $errorOccurred = true;
            }
        }

        if ($errorOccurred) {
            $this->addError($attribute, $message);
        }
    }
}
