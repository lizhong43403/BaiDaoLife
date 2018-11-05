<?php

use yii\db\Migration;

/**
 * Class m181018_100914_projects
 */
class m181018_100914_projects extends Migration
{
    /**
     * 项目信息表
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%projects}}', [
            'id' => $this->primaryKey()->comment('项目ID'),
            'name' => $this->string(64)->unique()->notNull()->comment('项目名称'),
            'description' => $this->string()->defaultValue('')->comment('项目描述'),
            // 'role_type' => $this->tinyInteger()->defaultValue(1)->comment('用户角色类型 1个人/2团队/3公司'),
            'app_number' => $this->smallInteger()->defaultValue(0)->comment('项目下应用数'),
            'status' => $this->tinyInteger()->notNull()->defaultValue(1)->comment('项目状态 1使用/0停用/-1封号/-2删除'),
            'uid' => $this->integer()->notNull()->defaultValue(1)->comment('应用创建者'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%projects}}', '项目表');

        $this->insert('{{%projects}}', ['name' => '百道生活', 'description' => '不一样的生活方式', 'created_at' => time()]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%projects}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181018_100914_projects cannot be reverted.\n";

        return false;
    }
    */
}
