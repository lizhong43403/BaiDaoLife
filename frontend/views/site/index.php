<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = '百道';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>欢迎来到<?= Yii::$app->name ?>!</h1>

        <p class="lead">你觉得生活应该是什么样的呢.</p>

        <p><a class="btn btn-lg btn-success" href="">大声的告诉我你的想法!</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2>项目管理</h2>

                <p>你可以创建和管理自己的项目信息，借此来梳理和管理项目。当前暂不支持应用版本管理、版本管理工具的直接操作、版本权限管理等功能.</p>

                <p><a class="btn btn-default" href="<?= Url::toRoute(['/projects']); ?>">项目管理 &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>公众号管理</h2>

                <p>TODO 功能初步有微信消息管理、微信菜单管理等</p>

                <p><a class="btn btn-default" href="<? /*= Url::toRoute(['/']) */ ?>">微信公众号管理 &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
