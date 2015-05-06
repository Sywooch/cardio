<?php

namespace app\modules\forms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\PciReport as PciReportModel;

/**
 * PciReport represents the model behind the search form about `app\modules\forms\models\PciReport`.
 */
class PciReport extends PciReportModel
{
    public function rules()
    {
        return [
            [['id', 'patient_id', 'created_by', 'updated_by', 'clinical', 'supervisor_present'], 'integer'],
            [['created_at', 'updated_at', 'movie_date', 'phd_candidate', 'supervised_cardiologist', 'small_description'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PciReportModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'movie_date' => $this->movie_date,
            'clinical' => $this->clinical,
            'supervisor_present' => $this->supervisor_present,
        ]);

        $query->andFilterWhere(['like', 'phd_candidate', $this->phd_candidate])
            ->andFilterWhere(['like', 'supervised_cardiologist', $this->supervised_cardiologist])
            ->andFilterWhere(['like', 'small_description', $this->small_description]);

        return $dataProvider;
    }
}
