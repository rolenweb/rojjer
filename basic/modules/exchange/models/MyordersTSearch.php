<?php

namespace app\modules\exchange\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\exchange\models\Orders;

/**
 * OrdersSearch represents the model behind the search form about `app\modules\exchange\models\Orders`.
 */
class MyordersTSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_translater', 'created_at', 'updated_at'], 'integer'],
            [['username', 'lang_from', 'lang_to', 'srok', 'category', 'title', 'text', 'filename', 'assist_expir', 'country', 'status'], 'safe'],
            [['cost'], 'number'],
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
    public function search($params, $id)
    {
        $query = Orders::find()->where(['id_translater' => $id])->orderBy(['updated_at' => SORT_DESC]);

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
            'id_user' => $this->id_user,
            'id_translater' => $this->id_translater,
            'srok' => $this->srok,
            'cost' => $this->cost,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'lang_from', $this->lang_from])
            ->andFilterWhere(['like', 'lang_to', $this->lang_to])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'assist_expir', $this->assist_expir])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
