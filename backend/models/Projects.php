<?php

namespace backend\models;

/**
 * This is the model class for table "{{%projects}}".
 *
 * @property int $id 项目ID
 * @property string $name 项目名称
 * @property string $description 项目描述
 * @property int $app_number 项目下应用数
 * @property int $status 项目状态 1使用/0停用/-1封号/-2删除
 * @property int $uid 创建者
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%projects}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['app_number', 'uid', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 3],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '项目ID',
            'name' => '项目名称',
            'description' => '项目描述',
            'app_number' => '项目下应用数',
            'status' => '项目状态',
            'uid' => '创建者',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return ProjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectsQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if ($insert == self::EVENT_BEFORE_INSERT) {
            $this->uid = \Yii::$app->user->getId();
            $this->created_at = time();
        } else {
            $this->updated_at = time();
        }

        return parent::beforeSave($insert);
    }
}
