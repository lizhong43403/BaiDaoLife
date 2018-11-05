<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[ProjectsApp]].
 *
 * @see ProjectsApp
 */
class ProjectsAppQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProjectsApp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProjectsApp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
