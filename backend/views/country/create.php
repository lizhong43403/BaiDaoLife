<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Country */

$this->title = '添加国家信息';
$this->params['breadcrumbs'][] = ['label' => '国家地区信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
