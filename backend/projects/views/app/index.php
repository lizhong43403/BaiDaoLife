<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectsAppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目应用';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-app-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建应用', ['create', '_id' => Yii::$app->request->getQueryParam('_id')], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'project_id',
            'name',
            ['attribute' => 'type', 'value' => function ($model) {
                $types = ['web'];
                return $types[$model->type] ?: '未知';
            }],
            'description',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'template' => Yii::$app->request->getQueryParam('_id') == 1 ? '{view} {update}' : '{view} {update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        $options = ['title' => Yii::t('yii', 'Update'), 'aria-label' => 'Update', 'data-pjax' => '0'];
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-pencil"]);
                        $_id = Yii::$app->request->getQueryParam('_id');
                        return Html::a($icon, ['update', 'id' => $model->id, '_id' => $_id], $options);
                    }
                ]],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
