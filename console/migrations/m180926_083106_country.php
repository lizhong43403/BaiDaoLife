<?php

use yii\db\Migration;

/**
 * Class m180926_083106_country
 */
class m180926_083106_country extends Migration {
    /**
     * {@inheritdoc}
     * @link http://doc.chacuo.net/iso-3166-1 iso-3166-1全球国家名称代码
     * @link https://baike.baidu.com/item/%E5%9B%BD%E5%AE%B6%E4%BB%A3%E7%A0%81/6518042?fr=aladdin 国家代码
     * @link https://baike.baidu.com/item/%E4%B8%96%E7%95%8C%E5%90%84%E5%9B%BD%E5%92%8C%E5%9C%B0%E5%8C%BA%E5%90%8D%E7%A7%B0%E4%BB%A3%E7%A0%81%E8%A1%A8/4385340 世界各国和地区名称代码表
     */
    public function safeUp() {
        $tableOptions = null;
        if($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey()->comment('国家记录ID'),
            'chinese_name' => $this->string()->notNull()->comment('中文名称'),
            'chinese_name_short' => $this->string(32)->unique()->notNull()->comment('中文简称'),
            'english_name' => $this->string()->notNull()->comment('英文名称'),
            'description' => $this->string()->defaultValue('')->comment('国家描述'),
            'continent' => $this->string()->comment('所属洲'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%country}}', '国家或地区信息表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('{{%country}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180926_083106_country cannot be reverted.\n";

        return false;
    }
    */
}
