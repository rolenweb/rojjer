<?php

namespace app\modules\exchange\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\exchange\models\Orders3;

/**
 * Orders3Search represents the model behind the search form about `app\modules\exchange\models\Orders3`.
 */
class Orders3Search extends Orders3
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_translater', 'created_at', 'updated_at', 'lang_from', 'lang_to', 'category', 'assist_expir', 'country', 'status'], 'integer'],
            [['username', 'srok', 'title', 'text', 'texthiden', 'filename', 'textready', 'filenameready', 'commentclient', 'commenttranslate'], 'safe'],
            [['cost', 'totalcost'], 'number'],
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
        $query = Orders3::find()->where(['status' => 3])->orderBy(['updated_at' => SORT_DESC]);

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'lang_from' => $this->lang_from,
            'lang_to' => $this->lang_to,
            'srok' => $this->srok,
            'category' => $this->category,
            'assist_expir' => $this->assist_expir,
            'country' => $this->country,
            'cost' => $this->cost,
            'totalcost' => $this->totalcost,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'texthiden', $this->texthiden])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'textready', $this->textready])
            ->andFilterWhere(['like', 'filenameready', $this->filenameready])
            ->andFilterWhere(['like', 'commentclient', $this->commentclient])
            ->andFilterWhere(['like', 'commenttranslate', $this->commenttranslate]);

        return $dataProvider;
    }
}
