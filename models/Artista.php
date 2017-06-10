<?php

namespace app\models;

use Yii;

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
}
