<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albumes".
 *
 * @property integer $id
 * @property string $titulo
 * @property integer $artista_id
 *
 * @property Artistas $artista
 * @property Temas[] $temas
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'albumes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'artista_id'], 'required'],
            [['artista_id'], 'integer'],
            [['titulo'], 'string', 'max' => 255],
            [['titulo'], 'unique'],
            [['artista_id'], 'exist', 'skipOnError' => true, 'targetClass' => Artista::className(), 'targetAttribute' => ['artista_id' => 'id']],
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
            'titulo' => 'Título',
            'artista_id' => 'Artista',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtista()
    {
        return $this->hasOne(Artista::className(), ['id' => 'artista_id'])->inverseOf('albumes');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemas()
    {
        return $this->hasMany(Tema::className(), ['album_id' => 'id'])->inverseOf('album');
    }
}
