<?php

namespace app\modules\admin\models;

use app\behaviors\PrettyDateBehavior;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $naam
 * @property string $password
 * @property string $doc_naam
 * @property string $rights
 * @property string $datum_aanmaak
 * @property string $datum_stop
 * @property string $omschrijving
 * @property string $locatie
 * @property string $telefoon
 * @property string $title
 * @property string $initials
 * @property string $surname
 * @property string $maiden_name
 * @property string $insertion
 * @property string $department
 * @property string $doc_id
 * @property string $abbreviation
 * @property string $function
 * @property integer $disabled
 */
class Users extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'datum_aanmaak',
                ],
                'value' => function() { return date('Y-m-d H:i:s', time());},
            ],
            'prettyDate' => [
                'class' => PrettyDateBehavior::className(),
                'attributes' => ['datum_stop'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['naam', 'password', 'rights'], 'required'],
            [['omschrijving'], 'string'],
            [['disabled'], 'integer'],
            [['naam'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 40],
            [['doc_naam'], 'string', 'max' => 11],
            [['rights', 'datum_aanmaak', 'datum_stop'], 'string', 'max' => 30],
            [['locatie'], 'string', 'max' => 50],
            [['telefoon', 'title'], 'string', 'max' => 15],
            [['initials', 'surname','first_name', 'maiden_name', 'insertion', 'department', 'doc_id', 'abbreviation', 'function'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'naam' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'doc_naam' => Yii::t('app', 'Doc Naam'),
            'rights' => Yii::t('app', 'Rights'),
            'datum_aanmaak' => Yii::t('app', 'Datum Aanmaak'),
            'datum_stop' => Yii::t('app', 'Datum Stop'),
            'omschrijving' => Yii::t('app', 'Omschrijving'),
            'locatie' => Yii::t('app', 'Locatie'),
            'telefoon' => Yii::t('app', 'Telefoon'),
            'title' => Yii::t('app', 'Title'),
            'initials' => Yii::t('app', 'Initials'),
            'first_name' => Yii::t('app', 'First name'),
            'surname' => Yii::t('app', 'Surname'),
            'maiden_name' => Yii::t('app', 'Maiden Name'),
            'insertion' => Yii::t('app', 'Insertion'),
            'department' => Yii::t('app', 'Department'),
            'doc_id' => Yii::t('app', 'Doc ID'),
            'abbreviation' => Yii::t('app', 'Abbreviation'),
            'function' => Yii::t('app', 'Function'),
            'disabled' => Yii::t('app', 'Disabled'),
        ];
    }
}
