<?php

use yii\db\Migration;

/**
 * Class m181021_052246_project_menu
 */
class m181021_052246_project_app_catalog extends Migration
{
    /**
     * 安全更新项目目录菜单管理
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%projects_app_catalog}}', [
            'id' => $this->primaryKey()->comment('权限管理ID'),
            'app_id' => $this->integer()->notNull()->comment('项目应用ID'),
            'pid' => $this->integer()->notNull()->comment('父级菜单ID'),
            'path' => $this->string(255)->notNull()->comment('菜单路径'),
            'description' => $this->string()->notNull()->defaultValue('')->comment('菜单描述'),
            'level' => $this->smallInteger()->defaultValue(10)->comment('菜单等级'),
            'icon_path' => $this->string()->defaultValue('')->comment('菜单图标'),
            'sorted' => $this->smallInteger()->notNull()->comment('排序号'),
            'status' => $this->tinyInteger()->notNull()->defaultValue(1)->comment('菜单使用状态 0否/1是'),
            'is_home' => $this->tinyInteger()->comment('是否主页 0否/1是'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%projects_app_catalog}}', '项目目录菜单表');

        $this->batchInsert('{{%projects_app_catalog}}', ['app_id', 'pid', 'path', 'description', 'level', 'icon_path', 'sorted', 'created_at'], [
            [1, 1, '?r=site/index', '首页', 1, '', 1, time()]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%projects_app_catalog}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181021_052246_project_menu cannot be reverted.\n";

        return false;
    }
    */
}
