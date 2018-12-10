<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectsApp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-app-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->textInput(['value' => Yii::$app->request->getQueryParam('_id'), 'readonly' => 'readonly']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([0 => 'web']) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <? //= $form->field($model, 'created_at')->textInput() ?>

    <? //= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
