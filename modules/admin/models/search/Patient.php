<?php

namespace app\modules\admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Patient as PatientModel;

/**
 * Patient represents the model behind the search form about `app\modules\admin\models\Patient`.
 */
class Patient extends PatientModel
{
    public function rules()
    {
        return [
            [['id', 'died', 'general_practitioner_id'], 'integer'],
            [['pid', 'name', 'bsn', 'sex', 'birth_date', 'address', 'zip_code', 'city', 'country', 'phone', 'maiden_name', 'died_at', 'insurance', 'fds_polis_nr'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PatientModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birth_date' => $this->birth_date,
            'died' => $this->died,
            'died_at' => $this->died_at,
            'general_practitioner_id' => $this->general_practitioner_id,
        ]);

        $query->andFilterWhere(['like', 'pid', $this->pid])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'bsn', $this->bsn])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'maiden_name', $this->maiden_name])
            ->andFilterWhere(['like', 'insurance', $this->insurance])
            ->andFilterWhere(['like', 'fds_polis_nr', $this->fds_polis_nr]);

        return $dataProvider;
    }
}
