<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Album;

/**
 * AlbumSearch represents the model behind the search form about `app\models\Album`.
 */
class AlbumSearch extends Album
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'artista_id'], 'integer'],
            [['titulo'], 'safe'],
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
        $query = Album::find();

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
            'Título' => $this->titulo,
        ]);

        $query->andFilterWhere(['ilike', 'titulo', $this->titulo]);


        return $dataProvider;
    }
}
