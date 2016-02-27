<?php

namespace app\modules\exchange\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\exchange\models\Onlinemonitor;

/**
 * OnlinemonitorSearch represents the model behind the search form about `app\modules\exchange\models\Onlinemonitor`.
 */
class OnlinemonitorSearch extends Onlinemonitor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_order', 'id_user', 'id_translater', 'created_at', 'updated_at', 'done', 'status'], 'integer'],
            [['text', 'filename'], 'safe'],
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
        $query = Onlinemonitor::find();

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
            'id_order' => $this->id_order,
            'id_user' => $this->id_user,
            'id_translater' => $this->id_translater,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'done' => $this->done,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'filename', $this->filename]);

        return $dataProvider;
    }
}
