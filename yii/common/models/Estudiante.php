<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property integer $idestudiante
 * @property integer $tipo_identificacion
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
 * @property ClaseHasEstudiante[] $claseHasEstudiantes
 * @property Clase[] $claseIdclases
 */
class Estudiante extends \yii\db\ActiveRecord
{
  const SCENARIO_ADD = 'add';

  public function scenarios()
  {
      $scenarios = parent::scenarios();
      $scenarios[self::SCENARIO_ADD] = ['tipo_identificacion', 'identificacion', 'nombres', 'apellidos', 'direccion', 'celular', 'email', 'creado_por'];
      return $scenarios;
  }

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
            [['tipo_identificacion', 'identificacion', 'nombres', 'apellidos', 'direccion', 'celular', 'email', 'creado_por'], 'required', 'on' => self::SCENARIO_ADD],
            ['email', 'email'],
            [['tipo_identificacion', 'creado_por', 'activo', 'telefono', 'celular'], 'integer'],
            [['creado_en'], 'safe'],
            [['identificacion', 'nombres', 'apellidos', 'direccion', 'telefono', 'celular', 'email'], 'string', 'max' => 255],
            [['identificacion'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestudiante' => 'Idestudiante',
            'tipo_identificacion' => 'Tipo de documento',
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
    public function getClaseHasEstudiantes()
    {
        return $this->hasMany(ClaseHasEstudiante::className(), ['estudiante_idestudiante' => 'idestudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaseIdclases()
    {
        return $this->hasMany(Clase::className(), ['idclase' => 'clase_idclase'])->viaTable('clase_has_estudiante', ['estudiante_idestudiante' => 'idestudiante']);
    }
}
