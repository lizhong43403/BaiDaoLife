<?php

use yii\db\Migration;

/**
 * Class m181016_100129_enterprise
 */
class m181016_100129_enterprise extends Migration {
    /**
     * 2018/10/16 18:09 创建企业信息表
     */
    public function safeUp() {
        $tableOptions = null;
        if($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // fixme: 企业类型需要查看具体的公司法 2018/10/18 19:11
        $this->createTable('{{%enterprise}}', [
            'id' => $this->primaryKey()->comment('企业ID'),
            'type' => $this->string()->notNull()->comment('企业类型'),
            'name' => $this->string()->notNull()->comment('企业名称'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ]);

        $this->addCommentOnTable('{{%enterprise}}', '企业信息表');
    }

    /**
     * 2018/10/17 11:48 删除企业信息表
     */
    public function safeDown() {
        $this->renameTable('{{%enterprise}}', '{{%enterprise_' . date('YmdHis') . '}}');
        // $this->dropTable('{{%enterprise}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181016_100129_enterprise cannot be reverted.\n";

        return false;
    }
    */
}
