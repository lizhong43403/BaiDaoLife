<?php

use yii\db\Migration;

/**
 * Class m180926_083106_country_code
 */
class m180926_083106_country_code extends Migration {
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

        $this->createTable('{{%country_code}}', [
            'id' => $this->primaryKey()->comment('国家记录ID'),
            'chinese_name' => $this->string()->notNull()->defaultValue('')->comment('中文名称'),
            'chinese_name_short' => $this->string(32)->unique()->notNull()->comment('中文简称'),
            'english_name' => $this->string()->notNull()->comment('英文名称'),
            'domain_abbreviation' => $this->string(3)->notNull()->comment('国际域名缩写International domain name abbreviation'),
            'area_code' => $this->string(10)->notNull()->comment('国际区域编码Area code'),
            'time_difference' => $this->string(10)->notNull()->comment('国际时差time difference'),
            'created_at' => $this->integer()->notNull()->comment('添加时间'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%country_code}}', '国家或地区信息表');

        $this->batchInsert('{{%country_code}}', ['english_name', 'chinese_name_short', 'domain_abbreviation', 'area_code', 'time_difference', 'created_at'], [
            ['Angola', '安哥拉', 'AO', '244', '-7', time()],
            ['Afghanistan', '阿富汗', 'AF', '93', '0', time()],
            ['Albania', '阿尔巴尼亚', 'AL', '355', '-7', time()],
            ['Algeria', '阿尔及利亚', 'DZ', '213', '-8', time()],
            ['Andorra', '安道尔共和国', 'AD', '376', '-8', time()],
            ['Anguilla', '安圭拉岛', 'AI', '1264', '-12', time()],
            ['Antigua and Barbuda', '安提瓜和巴布达', 'AG', '1268', '-12', time()],
            ['Argentina', '阿根廷', 'AR', '54', '-11', time()],
            ['Armenia', '亚美尼亚', 'AM', '374', '-6', time()],
            ['Ascension', '阿森松', '', '247', '-8', time()],
            ['Australia', '澳大利亚', 'AU', '61', '+2', time()],
            ['Austria', '奥地利', 'AT', '43', '-7', time()],
            ['Azerbaijan', '阿塞拜疆', 'AZ', '994', '-5', time()],
            ['Bahamas', '巴哈马', 'BS', '1242', '-13', time()],
            ['Bahrain', '巴林', 'BH', '973', '-5', time()],
            ['Bangladesh', '孟加拉国', 'BD', '880', '-2', time()],
            ['Barbados', '巴巴多斯', 'BB', '1246', '-12', time()],
            ['Belarus', '白俄罗斯', 'BY', '375', '-6', time()],
            ['Belgium', '比利时', 'BE', '32', '-7', time()],
            ['Belize', '伯利兹', 'BZ', '501', '-14', time()],
            ['Benin', '贝宁', 'BJ', '229', '-7', time()],
            ['Bermuda Is.', '百慕大群岛', 'BM', '1441', '-12', time()],
            ['Bolivia', '玻利维亚', 'BO', '591', '-12', time()],
            ['Botswana', '博茨瓦纳', 'BW', '267', '-6', time()],
            ['Brazil', '巴西', 'BR', '55', '-11', time()],
            ['Brunei', '文莱', 'BN', '673', '0', time()],
            ['Bulgaria', '保加利亚', 'BG', '359', '-6', time()],
            ['Burkina-faso', '布基纳法索', 'BF', '226', '-8', time()],
            ['Burma', '缅甸', 'MM', '95', '-1.3', time()],
            ['Burundi', '布隆迪', 'BI', '257', '-6', time()],
            ['Cameroon', '喀麦隆', 'CM', '237', '-7', time()],
            ['Canada', '加拿大', 'CA', '1', '-13', time()],
            ['Cayman Is.', '开曼群岛', '', '1345', '-13', time()],
            ['Central African Republic', '中非共和国', 'CF', '236', '-7', time()],
            ['Chad', '乍得', 'TD', '235', '-7', time()],
            ['Chile', '智利', 'CL', '56', '-13', time()],
            ['China', '中国', 'CN', '86', '0', time()],
            ['Colombia', '哥伦比亚', 'CO', '57', '0', time()],
            ['Congo', '刚果', 'CG', '242', '-7', time()],
            ['Cook Is.', '库克群岛', 'CK', '682', '-18.3', time()],
            ['Costa Rica', '哥斯达黎加', 'CR', '506', '-14', time()],
            ['Cuba', '古巴', 'CU', '53', '-13', time()],
            ['Cyprus', '塞浦路斯', 'CY', '357', '-6', time()],
            ['Czech Republic', '捷克', 'CZ', '420', '-7', time()],
            ['Denmark', '丹麦', 'DK', '45', '-7', time()],
            ['Djibouti', '吉布提', 'DJ', '253', '-5', time()],
            ['Dominica Rep.', '多米尼加共和国', 'DO', '1890', '-13', time()],
            ['Ecuador', '厄瓜多尔', 'EC', '593', '-13', time()],
            ['Egypt', '埃及', 'EG', '20', '-6', time()],
            ['EI Salvador', '萨尔瓦多', 'SV', '503', '-14', time()],
            ['Estonia', '爱沙尼亚', 'EE', '372', '-5', time()],
            ['Ethiopia', '埃塞俄比亚', 'ET', '251', '-5', time()],
            ['Fiji', '斐济', 'FJ', '679', '+4', time()],
            ['Finland', '芬兰', 'FI', '358', '-6', time()],
            ['France', '法国', 'FR', '33', '-8', time()],
            ['French Guiana', '法属圭亚那', 'GF', '594', '-12', time()],
            ['Gabon', '加蓬', 'GA', '241', '-7', time()],
            ['Gambia', '冈比亚', 'GM', '220', '-8', time()],
            ['Georgia', '格鲁吉亚', 'GE', '995', '0', time()],
            ['Germany', '德国', 'DE', '49', '-7', time()],
            ['Ghana', '加纳', 'GH', '233', '-8', time()],
            ['Gibraltar', '直布罗陀', 'GI', '350', '-8', time()],
            ['Greece', '希腊', 'GR', '30', '-6', time()],
            ['Grenada', '格林纳达', 'GD', '1809', '-14', time()],
            ['Guam', '关岛', 'GU', '1671', '+2', time()],
            ['Guatemala', '危地马拉', 'GT', '502', '-14', time()],
            ['Guinea', '几内亚', 'GN', '224', '-8', time()],
            ['Guyana', '圭亚那', 'GY', '592', '-11', time()],
            ['Haiti', '海地', 'HT', '509', '-13', time()],
            ['Honduras', '洪都拉斯', 'HN', '504', '-14', time()],
            ['Hongkong', '香港', 'HK', '852', '0', time()],
            ['Hungary', '匈牙利', 'HU', '36', '-7', time()],
            ['Iceland', '冰岛', 'IS', '354', '-9', time()],
            ['India', '印度', 'IN', '91', '-2.3', time()],
            ['Indonesia', '印度尼西亚', 'ID', '62', '-0.3', time()],
            ['Iran', '伊朗', 'IR', '98', '-4.3', time()],
            ['Iraq', '伊拉克', 'IQ', '964', '-5', time()],
            ['Ireland', '爱尔兰', 'IE', '353', '-4.3', time()],
            ['Israel', '以色列', 'IL', '972', '-6', time()],
            ['Italy', '意大利', 'IT', '39', '-7', time()],
            ['Ivory Coast', '科特迪瓦', '', '225', '-6', time()],
            ['Jamaica', '牙买加', 'JM', '1876', '-12', time()],
            ['Japan', '日本', 'JP', '81', '+1', time()],
            ['Jordan', '约旦', 'JO', '962', '-6', time()],
            ['Kampuchea (Cambodia )', '柬埔寨', 'KH', '855', '-1', time()],
            ['Kazakstan', '哈萨克斯坦', 'KZ', '327', '-5', time()],
            ['Kenya', '肯尼亚', 'KE', '254', '-5', time()],
            ['Korea', '韩国', 'KR', '82', '+1', time()],
            ['Kuwait', '科威特', 'KW', '965', '-5', time()],
            ['Kyrgyzstan', '吉尔吉斯坦', 'KG', '331', '-5', time()],
            ['Laos', '老挝', 'LA', '856', '-1', time()],
            ['Latvia', '拉脱维亚', 'LV', '371', '-5', time()],
            ['Lebanon', '黎巴嫩', 'LB', '961', '-6', time()],
            ['Lesotho', '莱索托', 'LS', '266', '-6', time()],
            ['Liberia', '利比里亚', 'LR', '231', '-8', time()],
            ['Libya', '利比亚', 'LY', '218', '-6', time()],
            ['Liechtenstein', '列支敦士登', 'LI', '423', '-7', time()],
            ['Lithuania', '立陶宛', 'LT', '370', '-5', time()],
            ['Luxembourg', '卢森堡', 'LU', '352', '-7', time()],
            ['Macao', '澳门', 'MO', '853', '0', time()],
            ['Madagascar', '马达加斯加', 'MG', '261', '-5', time()],
            ['Malawi', '马拉维', 'MW', '265', '-6', time()],
            ['Malaysia', '马来西亚', 'MY', '60', '-0.5', time()],
            ['Maldives', '马尔代夫', 'MV', '960', '-7', time()],
            ['Mali', '马里', 'ML', '223', '-8', time()],
            ['Malta', '马耳他', 'MT', '356', '-7', time()],
            ['Mariana Is', '马里亚那群岛', '', '1670', '+1', time()],
            ['Martinique', '马提尼克', '', '596', '-12', time()],
            ['Mauritius', '毛里求斯', 'MU', '230', '-4', time()],
            ['Mexico', '墨西哥', 'MX', '52', '-15', time()],
            ['Moldova, Republic of', '摩尔多瓦', 'MD', '373', '-5', time()],
            ['Monaco', '摩纳哥', 'MC', '377', '-7', time()],
            ['Mongolia', '蒙古', 'MN', '976', '0', time()],
            ['Montserrat Is', '蒙特塞拉特岛', 'MS', '1664', '-12', time()],
            ['Morocco', '摩洛哥', 'MA', '212', '-6', time()],
            ['Mozambique', '莫桑比克', 'MZ', '258', '-6', time()],
            ['Namibia', '纳米比亚', 'NA', '264', '-7', time()],
            ['Nauru', '瑙鲁', 'NR', '674', '+4', time()],
            ['Nepal', '尼泊尔', 'NP', '977', '-2.3', time()],
            ['Netheriands Antilles', '荷属安的列斯', '', '599', '-12', time()],
            ['Netherlands', '荷兰', 'NL', '31', '-7', time()],
            ['New Zealand', '新西兰', 'NZ', '64', '+4', time()],
            ['Nicaragua', '尼加拉瓜', 'NI', '505', '-14', time()],
            ['Niger', '尼日尔', 'NE', '227', '-8', time()],
            ['Nigeria', '尼日利亚', 'NG', '234', '-7', time()],
            ['North Korea', '朝鲜', 'KP', '850', '+1', time()],
            ['Norway', '挪威', 'NO', '47', '-7', time()],
            ['Oman', '阿曼', 'OM', '968', '-4', time()],
            ['Pakistan', '巴基斯坦', 'PK', '92', '-2.3', time()],
            ['Panama', '巴拿马', 'PA', '507', '-13', time()],
            ['Papua New Cuinea', '巴布亚新几内亚', 'PG', '675', '+2', time()],
            ['Paraguay', '巴拉圭', 'PY', '595', '-12', time()],
            ['Peru', '秘鲁', 'PE', '51', '-13', time()],
            ['Philippines', '菲律宾', 'PH', '63', '0', time()],
            ['Poland', '波兰', 'PL', '48', '-7', time()],
            ['French Polynesia', '法属玻利尼西亚', 'PF', '689', '+3', time()],
            ['Portugal', '葡萄牙', 'PT', '351', '-8', time()],
            ['Puerto Rico', '波多黎各', 'PR', '1787', '-12', time()],
            ['Qatar', '卡塔尔', 'QA', '974', '-5', time()],
            ['Reunion', '留尼旺', '', '262', '-4', time()],
            ['Romania', '罗马尼亚', 'RO', '40', '-6', time()],
            ['Russia', '俄罗斯', 'RU', '7', '-5', time()],
            ['Saint Lueia', '圣卢西亚', 'LC', '1758', '-12', time()],
            ['Saint Vincent', '圣文森特岛', 'VC', '1784', '-12', time()],
            ['Samoa Eastern', '东萨摩亚(美)', '', '684', '-19', time()],
            ['Samoa Western', '西萨摩亚', '', '685', '-19', time()],
            ['San Marino', '圣马力诺', 'SM', '378', '-7', time()],
            ['Sao Tome and Principe', '圣多美和普林西比', 'ST', '239', '-8', time()],
            ['Saudi Arabia', '沙特阿拉伯', 'SA', '966', '-5', time()],
            ['Senegal', '塞内加尔', 'SN', '221', '-8', time()],
            ['Seychelles', '塞舌尔', 'SC', '248', '-4', time()],
            ['Sierra Leone', '塞拉利昂', 'SL', '232', '-8', time()],
            ['Singapore', '新加坡', 'SG', '65', '+0.3', time()],
            ['Slovakia', '斯洛伐克', 'SK', '421', '-7', time()],
            ['Slovenia', '斯洛文尼亚', 'SI', '386', '-7', time()],
            ['Solomon Is', '所罗门群岛', 'SB', '677', '+3', time()],
            ['Somali', '索马里', 'SO', '252', '-5', time()],
            ['South Africa', '南非', 'ZA', '27', '-6', time()],
            ['Spain', '西班牙', 'ES', '34', '-8', time()],
            ['Sri Lanka', '斯里兰卡', 'LK', '94', '0', time()],
            ['St.Lucia', '圣露西亚', 'LC', '1758', '-12', time()],
            ['St.Vincent', '圣文森特', 'VC', '1784', '-12', time()],
            ['Sudan', '苏丹', 'SD', '249', '-6', time()],
            ['Suriname', '苏里南', 'SR', '597', '-11.3', time()],
            ['Swaziland', '斯威士兰', 'SZ', '268', '-6', time()],
            ['Sweden', '瑞典', 'SE', '46', '-7', time()],
            ['Switzerland', '瑞士', 'CH', '41', '-7', time()],
            ['Syria', '叙利亚', 'SY', '963', '-6', time()],
            ['Taiwan', '台湾省', 'TW', '886', '0', time()],
            ['Tajikstan', '塔吉克斯坦', 'TJ', '992', '-5', time()],
            ['Tanzania', '坦桑尼亚', 'TZ', '255', '-5', time()],
            ['Thailand', '泰国', 'TH', '66', '-1', time()],
            ['Togo', '多哥', 'TG', '228', '-8', time()],
            ['Tonga', '汤加', 'TO', '676', '+4', time()],
            ['Trinidad and Tobago', '特立尼达和多巴哥', 'TT', '1809', '-12', time()],
            ['Tunisia', '突尼斯', 'TN', '216', '-7', time()],
            ['Turkey', '土耳其', 'TR', '90', '-6', time()],
            ['Turkmenistan', '土库曼斯坦', 'TM', '993', '-5', time()],
            ['Uganda', '乌干达', 'UG', '256', '-5', time()],
            ['Ukraine', '乌克兰', 'UA', '380', '-5', time()],
            ['United Arab Emirates', '阿拉伯联合酋长国', 'AE', '971', '-4', time()],
            ['United Kiongdom', '英国', 'GB', '44', '-8', time()],
            ['United States of America', '美国', 'US', '1', '-13', time()],
            ['Uruguay', '乌拉圭', 'UY', '598', '-10.3', time()],
            ['Uzbekistan', '乌兹别克斯坦', 'UZ', '233', '-5', time()],
            ['Venezuela', '委内瑞拉', 'VE', '58', '-12.3', time()],
            ['Vietnam', '越南', 'VN', '84', '-1', time()],
            ['Yemen', '也门', 'YE', '967', '-5', time()],
            ['Yugoslavia', '南斯拉夫', 'YU', '381', '-7', time()],
            ['Zimbabwe', '津巴布韦', 'ZW', '263', '-6', time()],
            ['Zaire', '扎伊尔', 'ZR', '243', '-7', time()],
            ['Zambia', '赞比亚', 'ZM', '260', '-6', time()]
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
