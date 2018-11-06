<?php

namespace backend\models;

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "{{%projects_app}}".
 *
 * @property int $id 应用ID
 * @property int $project_id 项目ID
 * @property string $name 应用名称
 * @property string $type 应用类型web
 * @property string $description 应用描述
 * @property int $uid 创建者
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class ProjectsApp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%projects_app}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'name'], 'required'],
            [['project_id', 'uid', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['type', 'description'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '应用ID',
            'project_id' => '项目ID',
            'name' => '应用名称',
            'type' => '应用类型',
            'description' => '应用描述',
            'uid' => '创建者',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return ProjectsAppQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectsAppQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if ($insert == self::EVENT_BEFORE_INSERT) {
            $this->created_at = time();
        } else {
            $this->updated_at = time();
        }

        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert == self::EVENT_BEFORE_INSERT) {
            $projectId = Yii::$app->request->getQueryParam('_id');
            $projectModel = Projects::findOne(['id' => $projectId]);
            if (!$projectModel->updateAttributes(['app_number' => $projectModel->app_number + 1])) {
                // TODO: 制定错误码 项目应用数更新失败
                throw new Exception('项目应用数新增失败');
            }
        }
    }
}
