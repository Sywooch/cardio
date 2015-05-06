<?php

namespace app\modules\forms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\HtReport as HtReportModel;

/**
 * HtReport represents the model behind the search form about `app\modules\forms\models\HtReport`.
 */
class HtReport extends HtReportModel
{
    public function rules()
    {
        return [
            [['id', 'patient_id', 'ccr_report_id', 'created_by', 'clinical'], 'integer'],
            [['created_at', 'small_description', 'discuss_date', 'thoracic_surgeon', 'intervention_cardiologist', 'cardiologist', 'refferring_cardiologist'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = HtReportModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'ccr_report_id' => $this->ccr_report_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'clinical' => $this->clinical,
            'discuss_date' => $this->discuss_date,
        ]);

        $query->andFilterWhere(['like', 'small_description', $this->small_description])
            ->andFilterWhere(['like', 'thoracic_surgeon', $this->thoracic_surgeon])
            ->andFilterWhere(['like', 'intervention_cardiologist', $this->intervention_cardiologist])
            ->andFilterWhere(['like', 'cardiologist', $this->cardiologist])
            ->andFilterWhere(['like', 'refferring_cardiologist', $this->refferring_cardiologist]);

        return $dataProvider;
    }
}
