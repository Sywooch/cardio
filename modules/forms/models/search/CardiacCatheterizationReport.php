<?php

namespace app\modules\forms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\forms\models\CardiacCatheterizationReport as CardiacCatheterizationReportModel;

/**
 * CardiacCatheterizationReport represents the model behind the search form about `app\modules\admin\models\CardiacCatheterizationReport`.
 */
class CardiacCatheterizationReport extends CardiacCatheterizationReportModel
{
    public function rules()
    {
        return [
            [['id', 'patient_id', 'created_by', 'updated_by', 'clinical', 'supervisor_present', 'complication', 'lm', 'rdap', 'rdam', 'rdad', 'd1', 'd2', 's1', 'al', 'cxp', 'cxm', 'mo', 'cxd', 'plx1', 'plx2', 'plx3', 'rca', 'ma', 'rdp', 'plr1', 'plr2', 'plr3', 'graft1', 'graft2', 'lima', 'rima'], 'integer'],
            [['created_at', 'updated_at', 'movie_date', 'phd_candidate', 'supervised_cardiologist', 'complication_details', 'cag_details', 'proposal'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = CardiacCatheterizationReportModel::find();

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
            'complication' => $this->complication,
            'lm' => $this->lm,
            'rdap' => $this->rdap,
            'rdam' => $this->rdam,
            'rdad' => $this->rdad,
            'd1' => $this->d1,
            'd2' => $this->d2,
            's1' => $this->s1,
            'al' => $this->al,
            'cxp' => $this->cxp,
            'cxm' => $this->cxm,
            'mo' => $this->mo,
            'cxd' => $this->cxd,
            'plx1' => $this->plx1,
            'plx2' => $this->plx2,
            'plx3' => $this->plx3,
            'rca' => $this->rca,
            'ma' => $this->ma,
            'rdp' => $this->rdp,
            'plr1' => $this->plr1,
            'plr2' => $this->plr2,
            'plr3' => $this->plr3,
            'graft1' => $this->graft1,
            'graft2' => $this->graft2,
            'lima' => $this->lima,
            'rima' => $this->rima,
        ]);

        $query->andFilterWhere(['like', 'phd_candidate', $this->phd_candidate])
            ->andFilterWhere(['like', 'supervised_cardiologist', $this->supervised_cardiologist])
            ->andFilterWhere(['like', 'complication_details', $this->complication_details])
            ->andFilterWhere(['like', 'cag_details', $this->cag_details])
            ->andFilterWhere(['like', 'proposal', $this->proposal]);

        return $dataProvider;
    }
}
