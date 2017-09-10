<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Setting;

/**
 * SearchSetting represents the model behind the search form about `\backend\models\Setting`.
 */
class SearchSetting extends Setting {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'group_id'], 'integer'],
            [['key', 'value', 'title', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Setting::find();

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
            'group_id' => $this->group_id,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key])
                ->andFilterWhere(['like', 'value', $this->value])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }

}
