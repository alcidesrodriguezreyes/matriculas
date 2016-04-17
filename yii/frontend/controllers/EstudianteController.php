<?php

namespace frontend\controllers;

use common\models\Estudiante;
use Yii;
use yii\data\ActiveDataProvider;

class EstudianteController extends \yii\web\Controller
{



    public function actionAdd()
    {
      $model = new Estudiante(['scenario'=>Estudiante::SCENARIO_ADD]);
      $model->creado_por = Yii::$app->user->id;

      if($model->load(Yii::$app->request->post()) && $model->validate()){
        $model->save();
        Yii::$app->session->setFlash('success', 'El estudiante ha sido agregado');
      }
      return $this->render('add', [
        'model' => $model
      ]);
    }

    public function actionDeactivate()
    {
        return $this->render('deactivate');
    }

    public function actionIndex()
    {
      $query = Estudiante::find()->where(['activo' => 1]);

      $provider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 10,
        ],
        'sort' => [
            'defaultOrder' => [
                'created_en' => SORT_DESC,
                'nombres' => SORT_ASC,
            ]
        ],
      ]);
        return $this->render('index', [
          'dataProvider' => $provider
        ]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
