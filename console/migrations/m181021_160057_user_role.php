<?php

use yii\db\Migration;

/**
 * Class m181021_160057_user_app_auth
 */
class m181021_160057_user_role extends Migration
{
    /**
     * 应用角色更新
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_role}}', [
            'id' => $this->primaryKey()->comment('角色ID'),
            'name' => $this->integer()->unique()->notNull()->comment('角色名称'),
            'uid' => $this->integer()->notNull()->comment('创建用户ID'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%user_role}}', '用户角色表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_role}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181021_160057_users_app_auth cannot be reverted.\n";

        return false;
    }
    */
}
