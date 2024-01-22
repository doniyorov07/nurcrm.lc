<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Lids;

/**
 * LidsSearch represents the model behind the search form of `common\models\Lids`.
 */
class LidsSearch extends Lids
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number', 'parent_number', 'gender'], 'integer'],
            [['username', 'full_name', 'parent_name', 'password', 'telegram', 'location'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Lids::find();

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
            'number' => $this->number,
            'parent_number' => $this->parent_number,
            'gender' => $this->gender,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'parent_name', $this->parent_name])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'telegram', $this->telegram])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
