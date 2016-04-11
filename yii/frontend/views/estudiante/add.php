<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $this->title = "Agregar Estudiante";?>
<h1>estudiante/add</h1>

<div class="row">
  <div class="col-lg-5">
    hola
  </div>
  <div class="col-lg-7">
    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model, 'identificacion'); ?>

    <?= $form->field($model, 'nombres'); ?>

    <?= $form->field($model, 'apellidos'); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>


  </div>
</div>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
