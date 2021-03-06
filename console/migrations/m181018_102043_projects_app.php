<?php

use yii\db\Migration;

/**
 * Class m181018_102043_projects_app
 */
class m181018_102043_projects_app extends Migration
{
    /**
     * 项目应用表
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%projects_app}}', [
            'id' => $this->primaryKey()->comment('应用ID'),
            'project_id' => $this->integer()->notNull()->comment('项目ID'),
            'name' => $this->string(64)->unique()->notNull()->comment('应用名称'),
            'type' => $this->integer()->notNull()->defaultValue(0)->comment('应用类型 0web'),
            'description' => $this->string()->defaultValue('')->comment('应用描述'),
            // 'theme' => $this->string(20)->notNull()->defaultValue('default')->comment('主题UI名称'),
            // 'version' => $this->string()->defaultValue('')->comment('当前版本'),
            // fixme: 版本状态在版本管理部分设计完成后添加 2018/10/18 19:11记录
            // 'version_state' => $this->tinyInteger()->notNull()->defaultValue(-1)->comment('版本状态-1待开发、0停用、1dev、2审核、3发布'),
            // 'is_private' => $this->tinyInteger()->notNull()->defaultValue(1)->comment('是否私有 0否、1是'),
            'uid' => $this->integer()->notNull()->defaultValue(1)->comment('创建者'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%projects_app}}', '项目应用表');

        $this->insert('{{%projects_app}}', ['project_id' => 1, 'name' => '百道后台', 'type' => 'web', 'description' => '不一样的生活方式', 'created_at' => time()]);
        $this->update('{{%projects}}', ['app_number' => 1], 'id = 1');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%projects_app}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181018_102043_projects_app cannot be reverted.\n";

        return false;
    }
    */
}
