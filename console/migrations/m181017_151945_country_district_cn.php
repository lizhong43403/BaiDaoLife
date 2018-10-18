<?php

use yii\db\Migration;

/**
 * Class m181017_151945_country_district
 */
class m181017_151945_country_district_cn extends Migration {
    /**
     * 国家城市区划表
     */
    public function safeUp() {
        $tableOptions = null;
        if($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // 中国性质区划表
        $this->createTable('{{%country_district_cn}}', [
            'postal_code' => $this->string(10)->unique()->notNull()->comment('邮政编码'),
            'name' => $this->string(40)->notNull()->comment('城市名称'),
            'level' => $this->string(16)->notNull()->comment('行政区划级别 province-city-district-street(省-市-区-街道)'),
            'pid' => $this->integer()->notNull()->defaultValue(0)->comment('父级Postal code'),
            'center' => $this->string(32)->notNull()->comment('城市中心点坐标'),
            'area_code' => $this->string(20)->notNull()->comment('区号'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%country_district_cn}}', '中国行政区划信息表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('{{%country_district_cn}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181017_151945_country_district cannot be reverted.\n";

        return false;
    }
    */
}
