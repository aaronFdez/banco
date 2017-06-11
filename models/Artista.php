<?php

namespace app\models;

use Yii;
use yii\data\Sort;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "artistas".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Albumes[] $albumes
 * @property Temas[] $temas
 */
class Artista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artistas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
            [['foto'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'foto' => 'Url de la foto',
        ];
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumes()
    {
        return $this->hasMany(Album::className(), ['artista_id' => 'id'])->inverseOf('artista');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemas()
    {
        return $this->hasMany(Tema::className(), ['artista_id' => 'id'])->inverseOf('artista');
    }

    public function verAlbumes()
    {
        return new ActiveDataProvider([
            'query' => $this->getAlbumes(),
            'sort' => new Sort([
                'sortParam' => 'sortDisp',
                'attributes' => [
                    'nombre' => [
                        'asc' => [
                            'titulo' => SORT_ASC,
                        ],
                        'desc' => [
                            'titulo' => SORT_DESC,
                        ],
                    ],
                ],
            ])
        ]);
    }

}
