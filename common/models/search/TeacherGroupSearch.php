<?php

namespace common\models\search;

use common\models\Teacher;
use common\models\TeacherGroup;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class TeacherGroupSearch extends TeacherGroup
{

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['teacher_id', 'group_id'], 'integer'],
            [['created_teacher_at', 'updated_teacher_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TeacherGroup::find();

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
            'teacher_id' => $this->teacher_id,
            'group_id' => $this->group_id,
        ]);

        $query->andFilterWhere(['like', 'created_teacher_at', $this->created_teacher_at])
            ->andFilterWhere(['like', 'updated_teacher_at', $this->updated_teacher_at]);

        return $dataProvider;
    }

}