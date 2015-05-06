<?php

namespace app\modules\admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Users as UsersModel;

/**
 * Users represents the model behind the search form about `app\models\Users`.
 */
class Users extends UsersModel
{
    public function rules()
    {
        return [
            [['id', 'disabled'], 'integer'],
            [['naam', 'password', 'doc_naam', 'rights', 'datum_aanmaak', 'datum_stop', 'omschrijving', 'locatie', 'telefoon', 'title', 'initials', 'first_name', 'surname', 'maiden_name', 'insertion', 'department', 'doc_id', 'abbreviation', 'function'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = UsersModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'disabled' => $this->disabled,
        ]);

        $query->andFilterWhere(['like', 'naam', $this->naam])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'doc_naam', $this->doc_naam])
            ->andFilterWhere(['like', 'rights', $this->rights])
            ->andFilterWhere(['like', 'datum_aanmaak', $this->datum_aanmaak])
            ->andFilterWhere(['like', 'datum_stop', $this->datum_stop])
            ->andFilterWhere(['like', 'omschrijving', $this->omschrijving])
            ->andFilterWhere(['like', 'locatie', $this->locatie])
            ->andFilterWhere(['like', 'telefoon', $this->telefoon])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'initials', $this->initials])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'maiden_name', $this->maiden_name])
            ->andFilterWhere(['like', 'insertion', $this->insertion])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'doc_id', $this->doc_id])
            ->andFilterWhere(['like', 'abbreviation', $this->abbreviation])
            ->andFilterWhere(['like', 'function', $this->function]);

        return $dataProvider;
    }
}
