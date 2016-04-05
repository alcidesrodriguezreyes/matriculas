<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property integer $idestudiante
 * @property string $tipo_identificacion
 * @property string $identificacion
 * @property string $nombres
 * @property string $apellidos
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property integer $creado_por
 * @property string $creado_en
 * @property integer $activo
 *
 * @property Matricula[] $matriculas
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['creado_por', 'activo'], 'integer'],
            [['creado_en'], 'safe'],
            [['tipo_identificacion', 'identificacion', 'nombres', 'apellidos', 'direccion', 'telefono', 'celular'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 200],
            [['email'], 'unique'],
            [['identificacion'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestudiante' => 'Idestudiante',
            'tipo_identificacion' => 'Tipo Identificacion',
            'identificacion' => 'Identificacion',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'email' => 'Email',
            'creado_por' => 'Creado Por',
            'creado_en' => 'Creado En',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['estudiante_idestudiante' => 'idestudiante']);
    }
}
