<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temas".
 *
 * @property integer $id
 * @property string $titulo
 * @property integer $artista_id
 * @property integer $album_id
 * @property string $duracion
 *
 * @property Albumes $album
 * @property Artistas $artista
 */
class Tema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'artista_id', 'album_id'], 'required'],
            [['artista_id', 'album_id'], 'integer'],
            [['duracion'], 'number'],
            [['titulo'], 'string', 'max' => 255],
            [['titulo'], 'unique'],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => Album::className(), 'targetAttribute' => ['album_id' => 'id']],
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
            'nombreArtista' => 'Nombre del artista',
            'tituloAlbum' => 'Título del álbum',
            'duracion' => 'Duración',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Album::className(), ['id' => 'album_id'])->inverseOf('temas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtista()
    {
        return $this->hasOne(Artista::className(), ['id' => 'artista_id'])->inverseOf('temas');
    }

    public function getNombreArtista()
    {
        return $this->artista->nombre;
    }

    public function getTituloAlbum()
    {
        return $this->album->titulo;
    }

    public function getTiempo()
    {
        $segundos=$this->duracion % 60;
        $minutos = $this->duracion /60;
        if ($segundos < 10) {
            $segundos = "0" . $segundos;
        }
        $tiempo = intval($minutos) . ":" . $segundos;
        return $tiempo;
    }
}
