<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Country;

/**
 * CountrySearch represents the model behind the search form of `backend\models\Country`.
 */
class CountrySearch extends Country
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['chinese_name', 'chinese_name_short', 'english_name', 'description', 'continent'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Country::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'chinese_name', $this->chinese_name])
            ->andFilterWhere(['like', 'chinese_name_short', $this->chinese_name_short])
            ->andFilterWhere(['like', 'english_name', $this->english_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'continent', $this->continent]);

        return $dataProvider;
    }
}
