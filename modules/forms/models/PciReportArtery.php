<?php

namespace app\modules\forms\models;

use Yii;

/**
 * This is the model class for table "artery".
 *
 * @property integer $id
 * @property integer $pci_report_id
 * @property string $artery
 * @property integer $is_ffr
 * @property string $ffr1
 * @property string $ffr2
 * @property string $ffr3
 * @property integer $is_adenosine
 * @property string $ic_iv
 * @property string $small_description
 *
 * @property PciReport $pciReport
 */
class PciReportArtery extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    public static $arteries = [
        'lm' => 'LM',
        'rdap' => 'RDAp',
        'd1' => 'D1',
        'rdam' => 'RDAm',
        'd2' => 'D2',
        's1' => 'S1',
        'rcxp' => 'RCXp',
        'al' => 'AL',
        'rcxm' => 'RCXm',
        'mo' => 'MO',
        'rcxd' => 'RCXd',
        'plx1' => 'PLX1',
        'plx2' => 'PLX2',
        'plx3' => 'PLX3',
        'rca' => 'RCA',
        'ma' => 'MA',
        'rdp' => 'RDP',
        'plr1' => 'PLR1',
        'plr2' => 'PLR2',
        'plr3' => 'PLR3',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pci_report_artery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pci_report_id', 'artery', 'ic_iv'], 'required'],
            [['pci_report_id', 'is_ffr', 'is_adenosine'], 'integer'],
            [['small_description'], 'string'],
            [['artery'], 'string', 'max' => 24],
            [['ffr1', 'ffr2', 'ffr3'], 'string', 'max' => 128],
            [['ic_iv'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('modules/forms/app', 'ID'),
            'pci_report_id' => Yii::t('modules/forms/app', 'Pci Report ID'),
            'artery' => Yii::t('modules/forms/app', 'Artery'),
            'is_ffr' => Yii::t('modules/forms/app', 'FFR'),
            'ffr1' => Yii::t('modules/forms/app', 'Ffr1'),
            'ffr2' => Yii::t('modules/forms/app', 'Ffr2'),
            'ffr3' => Yii::t('modules/forms/app', 'Ffr3'),
            'is_adenosine' => Yii::t('modules/forms/app', 'adenosine'),
            'ic_iv' => Yii::t('modules/forms/app', 'Ic Iv'),
            'small_description' => Yii::t('modules/forms/app', 'Small Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPciReport()
    {
        return $this->hasOne(PciReport::className(), ['id' => 'pci_report_id']);
    }
}
