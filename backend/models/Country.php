<?php

namespace backend\models;

/**
 * This is the model class for table "{{%country}}".
 * @property int    $id 国家记录ID
 * @property string $chinese_name 中文名称
 * @property string $chinese_name_short 中文简称
 * @property string $english_name 英文名称
 * @property string $description 国家描述
 * @property string $continent 所属洲
 * @property int    $created_at 添加时间
 * @property int    $updated_at 更新时间
 */
class Country extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%country}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['chinese_name', 'chinese_name_short', 'english_name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['chinese_name', 'english_name', 'description', 'continent'], 'string', 'max' => 255],
            [['chinese_name_short'], 'string', 'max' => 32],
            [['chinese_name_short'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'chinese_name' => '中文名称',
            'chinese_name_short' => '中文简称',
            'english_name' => '英文名称',
            'description' => '描述',
            'continent' => '所属洲',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function beforeSave($insert) {
        if(!parent::beforeSave($insert)) {
            return false;
        }

        if($insert) {
            $this->created_at = time();
            $this->updated_at = 0;
        } else {
            $this->updated_at = time();
        }

        return true;
    }
}
