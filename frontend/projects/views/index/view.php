<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Projects */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '项目管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'app_number',
            ['attribute' => 'status', 'value' => function ($model) {
                $keys = [-2 => '删除', -1 => '封号', 0 => '停用', 1 => '使用'];
                return $keys[$model->status];
            }],
            ['attribute' => 'created_at', 'value' => function ($model) {
                return date('Y-m-d H:i:s', $model->created_at);
            }],
            ['attribute' => 'updated_at', 'value' => function ($model) {
                return $model->updated_at > 0 ? date('Y-m-d H:i:s', $model->updated_at) : '';
            }],
        ],
    ]) ?>

</div>
