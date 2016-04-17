<?php
/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\helpers\Html;
?>
<h1>estudiante/index</h1>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      [
        'class' => 'yii\grid\ActionColumn',
        'buttons' => [
          'update' => function ($url, $model, $key) {
            return Html::a('Update', $url);
          }
        ]
      ],
      'identificacion',
      'nombres',
      'apellidos',
      'email',
      'creado_en:datetime'
    ]
]);
?>
<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
