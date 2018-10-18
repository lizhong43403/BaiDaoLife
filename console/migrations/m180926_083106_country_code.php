<?php

use yii\db\Migration;

/**
 * Class m180926_083106_country_code
 */
class m180926_083106_country_code extends Migration {
    /**
     * 国家代码数据初始化
     * @link http://doc.chacuo.net/iso-3166-1 iso-3166-1全球国家名称代码
     * @link https://www.iso.org/iso-3166-country-codes.html
     * @link https://baike.baidu.com/item/%E5%9B%BD%E5%AE%B6%E4%BB%A3%E7%A0%81/6518042?fr=aladdin 国家代码
     */
    public function safeUp() {
        $tableOptions = null;
        if($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%country_code}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'chinese_name' => $this->string()->notNull()->defaultValue('')->comment('中文名称'),
            'chinese_name_short' => $this->string(32)->unique()->notNull()->comment('中文简称'),
            'english_name' => $this->string()->notNull()->comment('英文名称'),
            'country_code' => $this->string(3)->notNull()->defaultValue('')->comment('国家代码Country code（3字符）'),
            'domain_abbreviation' => $this->string(3)->notNull()->comment('国际域名缩写International domain name abbreviation'),
            'area_code' => $this->string(10)->notNull()->comment('国际区域编码Area code'),
            'area_code_tel' => $this->string(10)->notNull()->comment('国际电话区号International telephone area code'),
            'time_difference' => $this->string(10)->notNull()->comment('国际时差time difference'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%country_code}}', '国家和地区信息表');

        $this->batchInsert('{{%country_code}}', ['chinese_name', 'chinese_name_short', 'english_name', 'country_code', 'domain_abbreviation', 'area_code', 'area_code_tel', 'time_difference', 'created_at'], [
            ['中华人民共和国', '中国', 'China', 'CHN', 'CN', '156', '86', '0', time()],
        ]);
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
