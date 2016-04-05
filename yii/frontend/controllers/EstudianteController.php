<?php

namespace frontend\controllers;

use common\models\Estudiante;

class EstudianteController extends \yii\web\Controller
{
    public function actionAdd()
    {
      $model = new Estudiante;
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
        return $this->render('index');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
