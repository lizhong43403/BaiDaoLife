<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php if ($model->id > 1) {
        $statusItems = [0 => '停用', 1 => '使用'];
    } else {
        $statusItems = [-2 => '删除', -1 => '封号', 0 => '停用', 1 => '使用'];
    }
    echo $form->field($model, 'status')->dropDownList($statusItems, ['value' => $model->status ?: 1]) ?>

    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
