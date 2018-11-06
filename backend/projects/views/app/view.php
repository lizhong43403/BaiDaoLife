<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectsApp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '项目应用', 'url' => ['index', '_id' => Yii::$app->request->getQueryParam('_id')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-app-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id, '_id' => Yii::$app->request->getQueryParam('_id')], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['attribute' => 'project_id', 'value' => function ($model) {
                return \backend\models\Projects::findOne(['id' => $model->project_id])->getAttribute('name');
            }],
            'name',
            ['attribute' => 'type', 'value' => function ($model) {
                $types = ['web'];
                return $types[$model->type] ?: '未知';
            }],
            'description',
            ['attribute' => 'created_at', 'value' => function ($model) {
                return date('Y-m-d H:i:s', $model->created_at);
            }],
            ['attribute' => 'updated_at', 'value' => function ($model) {
                return $model->updated_at > 0 ? date('Y-m-d H:i:s', $model->updated_at) : '';
            }],
        ],
    ]) ?>

</div>
