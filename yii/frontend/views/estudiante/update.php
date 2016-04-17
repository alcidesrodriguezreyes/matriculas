<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>estudiante/update</h1>

<div class="row">
  <div class="col-lg-4">
    hola
  </div>
  <div class="col-lg-8">
    <div class="row">
      <?php $form = ActiveForm::begin();?>
      <div class="col-lg-6">
        <?= $form->field($model, 'tipo_identificacion')->dropdownList(['1'=>'cédula'],['prompt'=>'Tipo de documento', 'options'=>['1'=>['selected'=>true]]]); ?>

        <?= $form->field($model, 'identificacion')->textInput(['autofocus'=>true]); ?>

        <?= $form->field($model, 'nombres'); ?>

        <?= $form->field($model, 'apellidos'); ?>
      </div>
      <div class="col-lg-6">
        <?= $form->field($model, 'email'); ?>

        <?= $form->field($model, 'direccion'); ?>

        <?= $form->field($model, 'telefono'); ?>

        <?= $form->field($model, 'celular'); ?>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
      </div>
      <?php $form = ActiveForm::begin();?>
    </div>
  </div>
</div>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
