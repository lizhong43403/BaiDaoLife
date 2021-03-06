<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ProjectsApp */

$this->title = '创建项目下的应用';
$this->params['breadcrumbs'][] = ['label' => '项目应用', 'url' => ['index', '_id' => Yii::$app->request->getQueryParam('_id')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-app-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
