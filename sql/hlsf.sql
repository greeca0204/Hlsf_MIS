/*
MySQL Data Transfer
Source Host: 120.25.162.62
Source Database: hlsf
Target Host: 120.25.162.62
Target Database: hlsf
Date: 2016/4/3 13:29:22
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for hlsf_company
-- ----------------------------
CREATE TABLE `hlsf_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '公司的名称',
  `address` varchar(100) NOT NULL COMMENT '公司地址',
  `logo` varchar(150) NOT NULL DEFAULT '/public/img/logo.png' COMMENT '公司Logo',
  `qrCode` varchar(150) NOT NULL DEFAULT '/public/img/qrcode.jpg' COMMENT '公司二维码',
  `ICP` varchar(50) NOT NULL COMMENT '公司ICP备案号',
  `description` varchar(200) NOT NULL COMMENT '公司概述',
  `slogan` varchar(30) NOT NULL COMMENT '公司口号',
  `introduction` varchar(300) NOT NULL COMMENT '公司详细介绍',
  `culture` varchar(50) NOT NULL COMMENT '公司的文化介绍',
  `frame` varchar(150) NOT NULL DEFAULT '/Public/img/frame.png' COMMENT '公司的组织框架，可能只是一个图',
  `partner` varchar(150) NOT NULL DEFAULT '/Public/img/partner.png	' COMMENT '公司合作伙伴',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_company_copy
-- ----------------------------
CREATE TABLE `hlsf_company_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '公司的名称',
  `address` varchar(100) NOT NULL COMMENT '公司地址',
  `logo` varchar(150) NOT NULL DEFAULT '/public/img/logo.png' COMMENT '公司Logo',
  `qrCode` varchar(150) NOT NULL DEFAULT '/public/img/qrcode.jpg' COMMENT '公司二维码',
  `ICP` varchar(50) NOT NULL COMMENT '公司ICP备案号',
  `description` varchar(200) NOT NULL COMMENT '公司概述',
  `slogan` varchar(30) NOT NULL COMMENT '公司口号',
  `introduction` varchar(300) NOT NULL COMMENT '公司详细介绍',
  `culture` varchar(50) NOT NULL COMMENT '公司的文化介绍',
  `frame` varchar(150) NOT NULL DEFAULT '/Public/img/frame.png' COMMENT '公司的组织框架，可能只是一个图',
  `partner` varchar(150) NOT NULL DEFAULT '/Public/img/partner.png	' COMMENT '公司合作伙伴',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_contact_us
-- ----------------------------
CREATE TABLE `hlsf_contact_us` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `address` varchar(512) DEFAULT '',
  `zipcode` varchar(128) DEFAULT NULL COMMENT '邮政编码',
  `phone` varchar(512) DEFAULT '',
  `fax` varchar(128) DEFAULT '',
  `email` varchar(256) DEFAULT '',
  `areacode` varchar(512) NOT NULL COMMENT '区号',
  `DEFAULT` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_contact_us_jobs
-- ----------------------------
CREATE TABLE `hlsf_contact_us_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL COMMENT '职位名称',
  `duty` varchar(512) NOT NULL COMMENT '职位职责',
  `demand` varchar(512) NOT NULL COMMENT '职位要求',
  `order` int(11) NOT NULL COMMENT '官网显示顺序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order` (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_managers
-- ----------------------------
CREATE TABLE `hlsf_managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '新闻标题',
  `content` varchar(200) NOT NULL COMMENT '事件描述',
  `img_url` varchar(200) NOT NULL DEFAULT '/public/img/avatar.png' COMMENT '图片链接',
  `time` int(11) NOT NULL DEFAULT '1' COMMENT '时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_news_dsj
-- ----------------------------
CREATE TABLE `hlsf_news_dsj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT '',
  `sub_title` varchar(256) DEFAULT '',
  `img_url` varchar(128) DEFAULT '',
  `content` text,
  `time` int(11) DEFAULT '0',
  `scan_times` int(8) DEFAULT '0',
  `source` varchar(256) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_news_hlzx
-- ----------------------------
CREATE TABLE `hlsf_news_hlzx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT '',
  `sub_title` varchar(256) DEFAULT '',
  `img_url` varchar(128) DEFAULT '',
  `content` text,
  `time` int(11) DEFAULT '0',
  `scan_times` int(8) DEFAULT '0',
  `source` varchar(256) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_news_hydt
-- ----------------------------
CREATE TABLE `hlsf_news_hydt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT '',
  `sub_title` varchar(256) DEFAULT '',
  `img_url` varchar(128) DEFAULT '',
  `content` text,
  `time` int(11) DEFAULT '0',
  `scan_times` int(8) DEFAULT '0',
  `source` varchar(256) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_news_mtjj
-- ----------------------------
CREATE TABLE `hlsf_news_mtjj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT '',
  `sub_title` varchar(256) DEFAULT '',
  `img_url` varchar(128) DEFAULT '',
  `content` text,
  `time` int(11) DEFAULT '0',
  `scan_times` int(8) DEFAULT '0',
  `source` varchar(256) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_news_tpxw
-- ----------------------------
CREATE TABLE `hlsf_news_tpxw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT '',
  `sub_title` varchar(256) DEFAULT '',
  `img_url` varchar(128) DEFAULT '',
  `content` text,
  `time` int(11) DEFAULT '0',
  `scan_times` int(8) DEFAULT '0',
  `source` varchar(256) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_news_xz
-- ----------------------------
CREATE TABLE `hlsf_news_xz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT '',
  `sub_title` varchar(256) DEFAULT '',
  `img_url` varchar(128) DEFAULT '',
  `content` text,
  `time` int(11) DEFAULT '0',
  `scan_times` int(8) DEFAULT '0',
  `source` varchar(256) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_project_ssxm
-- ----------------------------
CREATE TABLE `hlsf_project_ssxm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '项目名称',
  `bourse` varchar(30) NOT NULL COMMENT '交易所',
  `code` varchar(50) NOT NULL COMMENT '项目代号',
  `img_url` varchar(150) NOT NULL DEFAULT '/Public/img/project.png' COMMENT '项目图片',
  `order` int(11) NOT NULL COMMENT '展示顺序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order` (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_project_zdxm
-- ----------------------------
CREATE TABLE `hlsf_project_zdxm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '项目名称',
  `bourse` varchar(30) NOT NULL COMMENT '交易所',
  `code` varchar(50) NOT NULL COMMENT '项目代码',
  `img_url` varchar(150) NOT NULL DEFAULT '/Public/img/project.png' COMMENT '项目图片',
  `order` int(11) NOT NULL COMMENT '顺序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `odrer` (`order`),
  UNIQUE KEY `odrer_2` (`order`),
  UNIQUE KEY `odrer_3` (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_team_member
-- ----------------------------
CREATE TABLE `hlsf_team_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '成员姓名',
  `order` int(7) DEFAULT '0' COMMENT '顺序',
  `img_url` varchar(256) DEFAULT NULL COMMENT '头像',
  `title` varchar(256) DEFAULT '/Public/img/avatar.png' COMMENT '头衔',
  `honor` varchar(256) DEFAULT NULL COMMENT '称号',
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order` (`order`),
  UNIQUE KEY `order_2` (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hlsf_user
-- ----------------------------
CREATE TABLE `hlsf_user` (
  `id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `hlsf_company` VALUES ('1', '广州和灵穗丰有限公司', '广东省广州市天河珠江新城华夏路10号1206室', '/Public/home/files/company/logo.png', '/Public/home/files/20150421H4340_uv24P.thumb.224_0.jpeg', '(粤)1009090', '概述测试', '追求你我利益，追求多方共赢', '详细介绍测试', '', '/Public/home/files/company/frame.png', '/Public/home/files/company/partner.png');
INSERT INTO `hlsf_company_copy` VALUES ('1', '广州和灵穗丰有限公司123', '广东省广州市天河珠江新城华夏路10号1206室', '/Public/upload/img/company/company_1441683922_ly.png', '/Public/upload/img/company/company_1441683960_ly.jpg', '(粤)1009090', '概述测试', '追求你我利益，追求多方共赢', '详细介绍测试', '', '/Public/upload/img/company/company_1441683975_ly.png', '/Public/img/partner.png	');
INSERT INTO `hlsf_contact_us` VALUES ('1', '北京市东城区1', '100027', '64240026,64424696', '64240856121', '7686788967@qq.com', '8610121', '0');
INSERT INTO `hlsf_contact_us_jobs` VALUES ('1', '项目经理1', '1.宏观掌握项目1\n2.测试1', '经验丰富1', '1');
INSERT INTO `hlsf_contact_us_jobs` VALUES ('6', '项目助理', '1.培云\r\n2.测试2', '本科生', '3');
INSERT INTO `hlsf_contact_us_jobs` VALUES ('11', '网络编辑', '编辑并设计网站', '有一定经验者优先', '2');
INSERT INTO `hlsf_managers` VALUES ('52', '山西果业产业投资仪式', '测试12', '/public/img/avatar.png', '1441814400');
INSERT INTO `hlsf_managers` VALUES ('54', '湖北林业', '12', '/public/img/avatar.png', '1441641600');
INSERT INTO `hlsf_managers` VALUES ('71', '果园计划', '12', '/Public/home/files/managers/avatar.png', '1447948800');
INSERT INTO `hlsf_managers` VALUES ('74', '青岛渔业', '2333', '/public/img/avatar.png', '1441987200');
INSERT INTO `hlsf_managers` VALUES ('75', '和灵穗丰', '121212', '/Public/home/files/company/logo.png', '1442592000');
INSERT INTO `hlsf_managers` VALUES ('76', '西宁特钢', '为什么还要写内容啊', '/Public/home/files/20150421H4340_uv24P.thumb.224_0.jpeg', '1449849600');
INSERT INTO `hlsf_managers` VALUES ('77', '12', '123123', '/public/img/avatar.png', '1442332800');
INSERT INTO `hlsf_news_dsj` VALUES ('1', '1', '1', '', '<p>1</p>\n', '1441873226', '0', '1');
INSERT INTO `hlsf_news_hlzx` VALUES ('2', '1', '1', '/Public/home/files/images/avatar.png', '<p>1</p>\n', '1441498751', '0', '1');
INSERT INTO `hlsf_news_hlzx` VALUES ('3', '物流在互联网的推动下走向何方？', '测试副标题1', '/Public/home/files/company/logo.png', '<blockquote>摘要 :对于今天不断有人唱衰O2O，我始终有一个比较清醒的认识：O2O、智能、大数据定将会成为互联网改造传统行业、升级传统行业的三把利剑，只是每一个O2O细分领域最终能够容纳的平台不会超过3家。</blockquote>\n\n<p><img src=\"http://f.hiphotos.baidu.com/news/crop%3D0%2C1%2C548%2C329%3Bw%3D638/sign=7eef38b7f103918fc39e678a6c0d0aa6/8c1001e93901213fa5c6218b52e736d12e2e95eb.jpg\" /></p>\n\n<p>在过去，中国的物流几乎一直都是中国邮政一家说了算。不过由于服务水平质量较差、速度效率慢等原因，在电商的冲击下，中国邮政物流很快就已经跟不上时代的发展。在淘宝、天猫、当当等电商模式的兴起下，顺丰、中通、申通等各类第三方快递公司迅速崛起，与此同时京东商城的迅猛发展也带动了自建物流京东物流的壮大。在看到京东物流的成功之后，各大电商平台也开始纷纷自建物流，不过自建物流成本之高并非一般公司能力所能承受。到了今日，整个物流又呈现出了物流O2O混战江湖的局面，并试图引导未来物流的发展。</p>\n\n<p><strong>物流O2O缘何兴起？</strong></p>\n\n<p>今天，唱衰O2O的大有人在，唱衰O2O的这部分人当中有相当一部分是来自那99%的失败者，互联网行业的特性就是如此。当年刘旷也曾参与过团购行业的千团大战，作为一名创业者，也曾感叹过团购不是人干的活，但今日美团、百度糯米、大众点评的规模却足以让我惭愧。对于今天不断有人唱衰O2O，我始终有一个比较清醒的认识：O2O、智能、大数据定将会成为互联网改造传统行业、升级传统行业的三把利剑，只是每一个O2O细分领域最终能够容纳的平台不会超过3家，物流O2O同样如此。今天物流O2O已经开始在全面流行，并将会在未来的几年时间逐渐走向成熟，对于它的兴起，刘旷认为跟以下五大原因是分不开的。</p>\n\n<p>第一个原因：到了移动互联网时代，各类O2O的兴起，带动了上门服务的流行。诸如外卖O2O、便利店O2O、医药O2O、超市O2O、生鲜O2O、鲜花O2O、蛋糕O2O&hellip;&hellip;铺天盖地而来，随之而来的则是非常严重的物流配送问题。很多上门服务O2O平台都无法顺利完成商品的配送问题：自建物流前期成本太高；依托线下商家自己配送服务水平难以保证且有相当部分商家不愿自己配送；依托顺丰、圆通、申通等第三方物流近距离配送也不现实。于是，与各种上门配送服务相关的物流O2O趁机兴起。</p>\n\n<p>第二个原因：目前在国内存在一个比较严重的现象，国内大部分的货车司机都是个体司机，他们承担着国内主要的货运量。但是这些货车司机接业务大都是通过熟人朋友的关系以及每个城市的货场，这就导致了很多货车司机大部分时间并没有接业务，而有相当部分发货人却苦于找不到货车，整个行业存在严重的信息不对称问题。如何解决这种信息不对称问题，物流O2O就有了存在的价值。</p>\n\n<p>第三个原因：电商的高速发展已经验证了当前的物流已经难以满足它的配送需求，尤其是遇到电商促销日，比如京东618、天猫双11等购物狂欢节，物流配送无法按时送达几乎成为了每一次电商促销日各大电商平台最头疼的问题。不管是自建物流的电商平台，还是依托第三方物流的电商平台，在这个时候都急切需要一些兼职或者临时性的物流配送人员，但是短时间上哪去找那么多人配送，众包模式物流O2O出现则能有效解决突增性的大量物流需求。</p>\n\n<p>第四个原因：油费、过路费、货车维修保养费等成本逐年递增，导致了很多货车司机在返程时存在大量的成本浪费，如何能够让货车司机在返程尤其是长途货运返程时同样能接到单，提升运营效率，节省运营成本，基于LBS的货运O2O也就成为了车主们急切需要的平台。</p>\n\n<p>第五个原因：目前物流行业整体普遍存在服务水平质量低现象，广大用户除了对顺丰物流的服务水平比较认可之外，对于其他诸如圆通、韵达等物流都是一肚子苦水，不过顺丰物流的价格也偏贵。整个行业的物流服务水平都急切需要提升，需要新的物流平台和模式来替代传统物流，互联网与传统物流相结合则是一个不错的选择。</p>\n\n<p><strong>物流O2O模式之争</strong></p>\n\n<p>并不是说所有物流O2O就一定会代表着整个物流行业未来的发展方向，物流O2O同样也存在相当的市场痛点，比如计费标准问题、交易安全问题、线下货车资源整合问题、跳单问题等。所以又涌现出了不同模式的物流O2O，每一种模式有它的优点，同时也有它的缺点。</p>\n\n<p><strong>一、全民众包模式</strong></p>\n\n<p>提到物流O2O，可能很多人对于众包模式都会有所了解，以达达、人人快递、京东众包、闪送、快收等为代表的众包模式受到了诸多快递人员与消费者的欢迎。</p>\n\n<p>不得不承认，全民众包的快递O2O模式在一定程度解决了大批就业问题，这是这类平台对于社会的贡献。目前在国内有相当一部分的闲散人力、同时也有相当部分人员工作之余也想赚到更多的收入，这类O2O平台无形之中会就受到这部分人群的欢迎。无论是白领阶层、学生阶层、公务员、企业老板、下岗工人，还是自由职业者，只要愿意，符合基本条件者，都可以申请成为该类平台的自由快递人。</p>\n\n<p>此外，对于顺道送快递的人员来说，这种模式也将大大降低平台的运营成本，同时也能提升寄送效率。一般来说，传统快递上门取快递的时间至少要半个小时，发货的话需要至少1个小时，但众包模式都是匹配离用户最近的快递人员，能提升发货速度。除了闪送所推出的专人快速配送价格会比较高之外，其他众包相对来说配送价格也会比较低。</p>\n\n<p>不过这种全民众包模式会存在两个非常严重的问题。一个问题是用户货品的安全性无法保证，即便是平台在最开始对快递员的资质进行严格审核，还是无法避免这类问题的发生。对于一个快递员来说，如果该用户发送的货品比较贵重，就有发生占为己有的可能。而闪送所谓的全程监控实际上也只是手机客户端的位置识别，这个位置识别并没有多大意义，如果该快递员想作弊，收到货品后完全可以把GPS关闭，闪送难道还会派专人24小时盯着每一个快递员？很明显，这种全程监控并不是一个解决货品安全的好办法。当年淘宝推出了支付宝担保交易和商家诚信金，有效解决了交易信任问题，但众包O2O物流却不同于淘宝。</p>\n\n<p>第二个问题则是配送的专业性不够，快递自然要涉及到上门取件、上门送件，众包模式在对送件人与取件人的服务水平及质量上也会存在不足。目前几大众包模式平台除了闪送在前期会快递人员进行系统培训之外，其他平台都只是通过认证的方式，有的偶尔也针对部分快递人员进行简单培训。</p>\n\n<p><strong>二、物流公司众包模式</strong></p>\n\n<p>与全民众包模式不同，PP速达、运宝网则采用的是针对物流公司的众包模式。PP速达通过与国内12家大型快递公司达成合作，运宝网则集合了8000家专线物流公司。</p>\n\n<p>当前线下传统物流公司正在受到全民众包模式物流O2O的冲击，传统物流公司缺乏线上的流量来源，这类众包平台通过把他们的物流人员资源整合到一起，能够给他们带来用户，他们自然也就比较愿意接入。</p>\n\n<p>同时，相比全民众包模式而言，这种物流公司的众包模式可以在一定程度上保证货品的安全问题。全民众包模式全部都是由独立的个人组成，一旦货品出了问题就难以找到负责人来承担，但是物流公司众包模式不一样，即便是出了问题也能找到物流公司来承担责任。此外，物流公司的快递人员都经过公司系统严格的培训之后才正式上岗，在服务的专业性上面相比全民众包模式的快递人员要强。</p>\n\n<p>不过这种物流公司的众包模式平台，也会存在两个比较严重的问题。首先就是流量入口问题，一旦这类平台没有足够的流量作为支撑，就很难为其他物流公司导入真正的用户。既然不能带来用户，这类平台也就失去了存在的价值与意义。尤其是在平台发展初期的时候，缺乏品牌效应，还要面对众多物流O2O的竞争，没有足够的资金实力砸市场，难以发展壮大起来。</p>\n\n<p>其次就是跑单问题，做流量入口平台就需要防范的就是为他人做嫁衣。很多全民众包模式平台几乎都把所有的收入全部给快递人员，这样就在一定程度上避免了跑单现象，但是物流公司众包模式却不同，一旦客户比较认为某一家公司的服务之后，定然就会经常指定这家物流公司为其发货。</p>\n\n<p><strong>三、自建物流模式</strong></p>\n\n<p>与众包模式不同，趣活美食送是一类自建物流团队的配送平台，不过与传统自建物流队伍的公司不同，这类物流平台主要以服务O2O配送为主。目前，趣活美食送主要为广大消费者提供特色美食和餐厅外卖服务。</p>\n\n<p>当前，在国内众多的O2O领域，物流配送是胜负关键的重要因素。对于这类O2O平台来说，依托第三方物流配送将帮助平台节省大量的运营成本，同时依托这种专业的物流配送，也能大幅提升平台的运作效率和用户体验。就光拿外卖来说，目前几大外卖平台几乎都是采取自有物流团队和借助趣活美食送这种第三方物流结合的方式。</p>\n\n<p>自建物流相比众包模式而言，所有的快递人员都是平台自己招聘过后再进行统一培训的，这样有利于配送服务的标准化建设。无论是从专业的角度来看，还是从服务水平、质量上来对比，自建的第三方物流都相比众包模式的零散物流更有保障。</p>\n\n<p>不过对于趣活美食送这类的第三方自建物流的O2O配送平台来说，在前期的成本会相当高，这个成本不是一般公司所能承受的。而且这种O2O物流配送单子的利润非常低，只能靠规模制胜，也就是前期盈利会比较难，如果平台前期不具备足够的资金实力，很可能难以继续经营下去，这一点从众多的校园物流O2O配送经营困难就可以看出。</p>\n\n<p>第二个，由于扩张成本非常高，这种自建物流的O2O配送模式相比众包模式而言，在前期的规模扩张速度上会进展缓慢，很容易失去市场先机。一旦其他的平台在某一个城市已经建立起了规模和壁垒，这个时候要打进该城市的难度与成本就会更高。</p>\n\n<p><strong>四、货运O2O模式</strong></p>\n\n<p><strong>1、同城货运</strong></p>\n\n<p>神盾快运、运拉拉、1号货的、蓝犀牛、速派得等则是一类同城货运O2O平台也正在受到资本的追逐，这类平台的出现就是为了解决货主与车主之间信息不对称而诞生。</p>\n\n<p>其实从整个市场需求的角度来看，同城货运还是具有相当大的市场规模。货主与车主之间的信息不对称问题就给了同城货运O2O一个巨大的生存空间，通过智能匹配与推送，这类O2O平台能够在第一时间匹配离用户最近最适合的车主去为货主服务，既节省了货主的时间成本，也提升了车主的运营效率。所以，数据分析与智能匹配对于货运O2O来说至关重要。</p>\n\n<p>其次，对于广大的私家货车主们来说，目前存在两个比较严重的现象。一个现象是目前国内整体的货车市场体量非常大，可是却有相当一部分货车主们并没有什么盈利收入来源，货运O2O的出现定然会受到这些车主们的大力欢迎；另一个现象就是返程的浪费，目前油费、货车维修费等成本都在不断上升，如何降低返程的空载率提升利润率也成为了车主们焦虑的问题，货运O2O同样也满足了这部分车主的需求。</p>\n\n<p>目前国内同城货运的O2O平台非常之多，据统计，当前整个国内的货运O2O平台已经多达200家，还有很多同城、长途兼做的货运O2O平台，市场的竞争将十分惨烈，很难想象这个地方又将血海一片。因为对于同城货运市场来说，也是血海一片。</p>\n\n<p>货运对于大部分的货主来说，实际上是一个低频事件。很多货主一年难得会叫几次货主，大部分的货运需求都是来自一些工程、企业间的需求。这还不算什么，最妨碍货运O2O的发展壮大实际上还是源于信任问题。对于货主来说，要将如此重大的一批货物全部交给司机运送，多少会有些不放心，这一点实际上与物流众包模式非常像。这样就要求平台对于货车司机端要进行严格把控，同时对于整个运送过程也要有严格的监督，否则一旦出了问题，平台难辞其咎。</p>\n\n<p>货运O2O的标准化问题就更难把控了，每台货车的大小不同、所承载的重量不同、货主们发送货品重量大小也相差较大、价格变化幅度也会比较大&hellip;&hellip;整个货运O2O市场存在太多的不确定因素和非标准化因素。此外，对于很多有着货运需求的企业来说，一般都需要长期稳定可靠的货运司机，一旦通过平台找到了合适的货运司机，发生跳单的可能概率就会非常大。</p>\n\n<p><strong>2、抢单模式</strong></p>\n\n<p>不可否认，滴滴快的的抢单模式创造了一种成功的商业模式，这也受到了货运O2O平台诸如货拉拉、罗迹物流等平台的效仿。与同城货运O2O平台的智能匹配模式不同，货拉拉、罗计物流则采用车主抢单的模式。</p>\n\n<p>不过对于货运的抢单模式，刘旷却抱有一种不是特别看好的态度。打车是高频事件，叫货车却是低频事件，一个低频的事件如何才能调动货车司机的积极性？难道这些货车司机在每天接不到几单的情况下也会像出租车司机一样踊跃去抢单？对于一些大城市来说，还稍微好点，毕竟人口集中需求相对来说也会多一点，而在一些小城市需求根本就无从谈起。所以说，所谓的货车抢单模式仍然只是智能匹配，无法实现滴滴快的的叫车规模效应，并不是任何行业都能适合滴滴快的叫车模式，还需要根据行业的特性来决定。</p>\n\n<p><strong>3、跨城货运</strong></p>\n\n<p>区别于同城货运，诸如快狗速运、云鸟配送、货车帮、运满满、物流小秘等平台并不只做同城货运市场，同时他们也会做长途货运市场，而运策网、省省回头车则专注于做中长途返程货运。在解决车主与货主的信息对称问题上，跨城货运O2O与同城货运的出发点是一致的。</p>\n\n<p>不过相比同城货运而言，跨城货运的不确定性就更大了。首先就是货品安全问题，货品的安全系数要比同城货运更低，同城货运如果是比较贵重的货品，货主还可以跟着货车一起随行。但是长途货运舟车劳顿，同时在高速上的危险系数也增加了，货主很难随同，也无法追踪监测车主的实时动态，货品的安全问题毫无疑问将是个大问题。要打破信任障碍对于长途货运来说至关重要。</p>\n\n<p>其次则是司机的人身安全问题，长途货运开车时间长，很多司机都有可能会疲劳驾驶。尽管很多平台都与保险公司达成了合作，但是一旦货车司机在中途出现了交通事故，平台是否要承担一定的事故责任，这个目前在法律上也存在一定的空白。</p>\n\n<p>此外，与同城货运一样，诸如服务的标准化问题、跑单问题等也都是长途货运O2O所要面临的问题。</p>\n\n<p><strong>物流的未来</strong></p>\n\n<p>从整个物流行业的大形势来看，虽然目前各类物流O2O都面临着一定的挑战，但是线上与线下结合的物流O2O最终仍然将是大势所趋。不可否认，物流O2O的全面兴起也将会对整个传统物流造成相当的冲击，这一点从传统物流纷纷转型O2O就可以看出。</p>\n\n<p><strong>一、传统物流转型O2O面临哪些痛点？</strong></p>\n\n<p>虽说传统物流企业在品牌积累、线下门店、资金实力上都具有一定的优势，但是传统物流转型O2O面临的几大痛点会成为他们实现成功转型的最大障碍。</p>\n\n<p>其一，传统物流转型O2O最先面临的挑战就是体制上的困难。任何一家企业要改革的话，必然会受到来自各方利益的束缚，要成功实现转型就必须打破过去的制度与利益。自从顺丰嘿客开始布局以来，包括韵达、圆通等多家快递企业也都相继通过资本入股或者合作的形式进入O2O市场，不过目前还没有哪一家传统物流转型O2O成功了。</p>\n\n<p>其二，转型O2O的话，所有的传统物流公司在线上都缺乏一个强大的流量入口作为支撑。尤其是在移动互联网领域，传统物流并没有任何优势可言，只能借助于第三方力量，最后有可能只会成为物流公司众包模式的附庸。</p>\n\n<p>其三，在互联网运营上经验的不足、人才的缺失也将会成为传统物流转型O2O的绊脚石。对于传统物流公司来说，他们中的大部分人还停留在过去的思维当中，尤其是不懂一家互联网公司要如何运营。</p>\n\n<p><strong>二、物流O2O的未来将会形成三大阵营</strong></p>\n\n<p>对于未来整个物流的发展，刘旷认为将会紧紧跟互联网相关，而且将会分成三大阵营。</p>\n\n<p>第一大阵营是电商系。目前几乎所有的传统物流诸如圆通、申通等快递公司很大一部分都是依托于电商，而京东物流则主要服务于自家的京东商城。不过这一类阵营正在受到物流O2O的冲击，最大的威胁则来自于全民众包模式。</p>\n\n<p>第二大阵营则是货运系。虽然货运O2O存在非常多的难点，但是货运O2O能够解决信息不对称这个行业痛点，这些难点最终将无法阻挡货运O2O的前进，未来在货运O2O领域一定也会崛起新的垂直巨头。</p>\n\n<p>第三大阵营则是O2O服务系。通过依托各种外卖O2O、蛋糕O2O、鲜花O2O、便利店O2O等发展起来的物流体系，一种是自建物流团队模式，另一种则是众包模式，目前这两种模式的O2O都占有一定的市场空间。</p>\n\n<p>综上所述，刘旷认为传统物流将会继续借助电商在未来的物流格局中继续占有一定的市场份额，但正在受到来自众包模式和借助O2O服务兴起的物流平台冲击，未来的物流O2O将会形成电商系、O2O服务系以及货运系三大阵营。</p>\n', '1441503549', '0', '百度百家');
INSERT INTO `hlsf_news_hydt` VALUES ('2', '怎么没动态', '怎么没动态', '', '<p>我想了解，但是动态呢？</p>\n', '1442117197', '0', '客户');
INSERT INTO `hlsf_news_mtjj` VALUES ('1', '12', '12', '', '<p>12</p>\n', '1441873532', '0', '12');
INSERT INTO `hlsf_project_ssxm` VALUES ('2', '数码视讯', '创业版', '300079', '/Public/home/files/managers/avatar.png', '1');
INSERT INTO `hlsf_project_ssxm` VALUES ('7', '杰赛科技', '纽交所', '123123123', '/public/img/project.png', '3');
INSERT INTO `hlsf_project_ssxm` VALUES ('13', 'apple', 'apple', '123', '/Public/home/files/Y%25A6%5B%258)6RF5%5B%24%7B(G9E3599.png', '2');
INSERT INTO `hlsf_project_zdxm` VALUES ('4', '杰赛科技', '深圳', '30079', '/public/img/project.png', '1');
INSERT INTO `hlsf_project_zdxm` VALUES ('13', '9', '9', '9', '/public/img/project.png', '2');
INSERT INTO `hlsf_team_member` VALUES ('7', '丘吉尔', '1', '/Public/home/files/20150421H4340_uv24P.thumb.224_0.jpeg', '英国首相', '作家', '12');
INSERT INTO `hlsf_team_member` VALUES ('8', '罗斯福', '3', '/public/img/avatar.png', '美国总统', '美国', '123123');
INSERT INTO `hlsf_team_member` VALUES ('17', '马克思', '2', '/Public/home/files/VNBGV7CI3(V0%40U7Q%7DM2E%24ON.png', '德国哲学家', '革命家', '马克思主义的创始人');
INSERT INTO `hlsf_user` VALUES ('123', '123');
INSERT INTO `hlsf_user` VALUES ('456', '456');
