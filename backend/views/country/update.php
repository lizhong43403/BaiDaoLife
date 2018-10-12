<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Country */

$this->title = 'Update Country: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '国家', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
