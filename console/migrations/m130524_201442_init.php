<?php

use yii\db\Migration;

class m130524_201442_init extends Migration {
    public function up() {
        $tableOptions = null;
        if($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey()->comment('系统用户ID'),
            'username' => $this->string()->notNull()->unique()->comment('系统用户名称'),
            'auth_key' => $this->string(32)->notNull()->comment('权限key'),
            'password_hash' => $this->string()->notNull()->comment('系统用户密码'),
            'password_reset_token' => $this->string()->unique()->comment('用户密码重置令牌'),
            'email' => $this->string()->notNull()->unique()->comment('系统用户邮箱'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('系统用户状态 0已注销、10有效的'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%user}}', '用户表');

        $this->batchInsert('{{%user}}', ['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'created_at', 'updated_at'], [
            ['李中俊', Yii::$app->security->generateRandomString(), Yii::$app->security->generatePasswordHash('123456'), Yii::$app->security->generateRandomString() . '_' . time(), 'lizhong43403@163.com', 10, time(), 0],
            ['马潇', Yii::$app->security->generateRandomString(), Yii::$app->security->generatePasswordHash('123456'), Yii::$app->security->generateRandomString() . '_' . time(), 'hellomybabe@aliyun.com', 10, time(), 0]
        ]);
    }

    public function down() {
        $this->dropTable('{{%user}}');
    }
}
