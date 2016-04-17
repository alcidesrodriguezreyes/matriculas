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
                //'created_en' => SORT_DESC,
                'apellidos' => SORT_ASC,
                'nombres' => SORT_ASC,
            ]
        ],
      ]);
        return $this->render('index', [
          'dataProvider' => $provider
        ]);
    }

    /**
     * Displays a single Estudiante model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
      $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['view', 'id' => $model->idestudiante]);
      } else {
          return $this->render('update', [
              'model' => $model,
          ]);
      }
    }

    /**
     * Finds the Estudiante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estudiante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estudiante::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
