<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\employee;

/**
 * EmployeeSearch represents the model behind the search form about `app\models\employee`.
 */
class EmployeeSearch extends employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'departmentId', 'ext'], 'integer'],
            [['firstName', 'lastName', 'email', 'hireDate', 'leaveDate'], 'safe'],
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
        $query = employee::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'departmentId' => $this->departmentId,
            'ext' => $this->ext,
            'hireDate' => $this->hireDate,
            'leaveDate' => $this->leaveDate,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
