<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProjectsApp;

/**
 * ProjectAppSearch represents the model behind the search form of `backend\models\ProjectsApp`.
 */
class ProjectsAppSearch extends ProjectsApp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'uid', 'created_at', 'updated_at'], 'integer'],
            [['name', 'type', 'description'], 'safe'],
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
        $query = ProjectsApp::find();

        // add conditions that should always apply here
        $query->where(['project_id' => $params['_id']]);

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
            'project_id' => $this->project_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
