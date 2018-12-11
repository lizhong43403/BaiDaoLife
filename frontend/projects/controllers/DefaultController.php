<?php

namespace frontend\projects\controllers;

use yii\web\Controller;

/**
 * Default controller for the `projects` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('index');
    }
}
