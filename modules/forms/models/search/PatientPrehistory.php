<?php

namespace app\modules\forms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\PatientPrehistory as PatientPrehistoryModel;

/**
 * PatientPrehistory represents the model behind the search form about `app\modules\forms\models\PatientPrehistory`.
 */
class PatientPrehistory extends PatientPrehistoryModel
{
    public function rules()
    {
        return [
            [['id', 'patient_id', 'prehistory_item_id'], 'integer'],
            [['date'], 'safe'],
            [['text'], 'string']
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PatientPrehistoryModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'prehistory_item_id' => $this->prehistory_item_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
