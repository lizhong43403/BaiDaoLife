<?php

use yii\db\Migration;

/**
 * Class m181021_051828_project_auth
 */
class m181021_051828_projects_app_auth extends Migration
{
    /**
     * 项目权限管理
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%projects_app_auth}}', [
            'id' => $this->primaryKey()->comment('权限分组ID'),
            'app_id' => $this->integer()->notNull()->comment('应用ID'),
            'role_id' => $this->integer()->notNull()->comment('父级分组ID'),
            'catalog_id' => $this->integer()->notNull()->comment('菜单ID'),
            'uid' => $this->integer()->notNull()->comment('授权用户ID'),
            'status' => $this->tinyInteger()->notNull()->defaultValue(1)->comment('权限状态1启用/0关闭/-1删除'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%projects_app_auth}}', '项目应用权限分组表');
    }

    /**
     * 删除项目权限管理表
     */
    public function safeDown()
    {
        $this->dropTable('{{%projects_app_auth}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181021_051828_project_auth cannot be reverted.\n";

        return false;
    }
    */
}
