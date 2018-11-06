<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建项目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // ['attribute' => 'ascription_type', 'value' => function ($model) {
            //     $keys = [1 => '个人', '组织', '企业'];
            //     return $keys[$model->ascription_type] ?: '异常';
            // }],
            ['attribute' => 'name', 'format' => 'html', 'value' => function ($model) {
                // fixme: 是否跳到新的页面
                return Html::a($model->name, ['/projects/app', '_id' => $model->id]);
            }],
            'description',
            'app_number',
            ['attribute' => 'status', 'value' => function ($model) {
                $keys = [-2 => '删除', -1 => '封号', 0 => '停用', 1 => '使用'];
                return $keys[$model->status];
            }],
            // ['attribute' => 'created_at', 'value' => function ($model) {
            //     return date('Y-m-d H:i:s', $model->created_at);
            // }],
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
