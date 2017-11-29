-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tbl_history`;
CREATE TABLE `tbl_history` (
  `status` varchar(30) NOT NULL,
  `distance` float NOT NULL,
  `request_time` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `start_city_name` varchar(50) NOT NULL,
  `start_city_latitude` float NOT NULL,
  `start_city_longitude` float NOT NULL,
  `end_time` int(11) NOT NULL,
  `product_id` varchar(150) NOT NULL,
  `request_id` varchar(150) NOT NULL,
  `uuid` varchar(150) NOT NULL,
  UNIQUE KEY `request_id` (`request_id`),
  KEY `product_id` (`product_id`),
  KEY `status` (`status`),
  KEY `request_time` (`request_time`),
  KEY `start_time` (`start_time`),
  KEY `end_time` (`end_time`),
  KEY `distance` (`distance`),
  KEY `start_city_name` (`start_city_name`),
  KEY `uuid` (`uuid`),
  CONSTRAINT `tbl_history_ibfk_1` FOREIGN KEY (`uuid`) REFERENCES `tbl_profile` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_history` (`status`, `distance`, `request_time`, `start_time`, `start_city_name`, `start_city_latitude`, `start_city_longitude`, `end_time`, `product_id`, `request_id`, `uuid`) VALUES
('completed',	1.69295,	1505595178,	1505595326,	'Nairobi',	-1.2831,	36.8209,	1505595988,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'09fb1a4a-0b47-4e99-843d-ddf6ec76f61b',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	9.76943,	1489768927,	1489769397,	'Nairobi',	-1.2831,	36.8209,	1489770877,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'0ef32374-e522-44af-8829-736546141882',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	3.84792,	1511640294,	1511640621,	'Nairobi',	-1.2831,	36.8209,	1511641577,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'1f4ef2ee-8c6a-4ca0-bd1f-fa5279da4a5a',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	6.76771,	1478381403,	1478382502,	'Nairobi',	-1.2831,	36.8209,	1478384099,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'26ed543a-4ede-4174-84d3-15dfcb583ae4',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	3.93023,	1493505945,	1493506156,	'Nairobi',	-1.2831,	36.8209,	1493506560,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'302003f9-f300-4477-87ae-8fe1b77d6a93',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	9.75501,	1489369460,	1489370266,	'Nairobi',	-1.2831,	36.8209,	1489371819,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'34006411-46cb-47bb-ae63-2875fa227f5e',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	4.46923,	1479304692,	1479304953,	'Nairobi',	-1.2831,	36.8209,	1479307373,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'3465f33e-7148-4ff1-8a63-b68a9140049d',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	9.91852,	1505090886,	1505092530,	'Nairobi',	-1.2831,	36.8209,	1505093762,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'384b364c-229b-4016-a0eb-fd8cc83dfb2e',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	9.51196,	1505612114,	1505612771,	'Nairobi',	-1.2831,	36.8209,	1505614707,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'43879a0f-b339-4ec7-831e-88957b1c20ad',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	6.81581,	1489317017,	1489317363,	'Nairobi',	-1.2831,	36.8209,	1489318593,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'4391fecc-8131-4cf8-a5a7-3585e89abce5',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	10.4172,	1490320439,	1490321059,	'Nairobi',	-1.2831,	36.8209,	1490322532,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'468375b2-d1d3-4cdf-9132-fde9f584c80a',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	9.44478,	1480529501,	1480530155,	'Nairobi',	-1.2831,	36.8209,	1480531439,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'472b3550-7c0a-4573-baad-9f1a0ef1b53d',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	9.47288,	1496854179,	1496854832,	'Nairobi',	-1.2831,	36.8209,	1496856049,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'47adb4bb-bfcb-4cab-bcbe-498dfc9bc665',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	5.61671,	1489324842,	1489326953,	'Nairobi',	-1.2831,	36.8209,	1489328000,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'4a398560-d99e-444b-86df-8c5aabcbcd9e',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	6.04497,	1490330783,	1490331131,	'Mombasa',	-3.9766,	39.7242,	1490332702,	'ad405a79-3a5c-44b8-b7b2-93fa7a998cec',	'543a9bba-4234-4e9e-9354-acc394759ac7',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	3.88803,	1485915416,	1485915884,	'Nairobi',	-1.2831,	36.8209,	1485916497,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'59cb02e3-c74a-4f54-944e-9937bdae4d3e',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	3.9817,	1482142845,	1482143056,	'Nairobi',	-1.2831,	36.8209,	1482143877,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'6945e4c3-9ab2-4754-8690-164b9c2700e8',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	13.0337,	1470242421,	1470243744,	'Nairobi',	-1.2831,	36.8209,	1470245698,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'6fef7e1b-39ec-4fe7-9716-3209d67aea8e',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	12.9557,	1478996119,	1478996288,	'Nairobi',	-1.2831,	36.8209,	1478998354,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'72b78d44-25ac-4ff7-82b6-65beadf6dfce',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	2.91164,	1508600240,	1508600708,	'Nairobi',	-1.2831,	36.8209,	1508601588,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'74dec320-37ca-4bc5-b1f9-96e4d0212aa2',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	4.65497,	1511655544,	1511656083,	'Nairobi',	-1.2831,	36.8209,	1511657035,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'81570096-d95f-4145-b8f5-1be32f006f19',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	10.1257,	1496800683,	1496801177,	'Nairobi',	-1.2831,	36.8209,	1496802867,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'96d79921-f5cd-4e93-8bd6-553f225178d3',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	1.47119,	1508598186,	1508598521,	'Nairobi',	-1.2831,	36.8209,	1508599116,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'9ca716a6-e302-47e4-b3b5-e53ecb1d2650',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	4.25365,	1504603016,	1504603261,	'Nairobi',	-1.2831,	36.8209,	1504604321,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'a0c1edfd-428d-42dd-bdd0-25113f0f5b4d',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	10.4167,	1506733474,	1506733969,	'Nairobi',	-1.2831,	36.8209,	1506735567,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'b50dde74-1cfe-43c4-b7c1-7619cc9ab319',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	4.35379,	1481623956,	1481624284,	'Nairobi',	-1.2831,	36.8209,	1481625802,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'bb729d89-b334-4824-bdb2-6c1d0ef56fee',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	10.0454,	1492480073,	1492480825,	'Nairobi',	-1.2831,	36.8209,	1492482557,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'bee50fb3-4f11-4d7d-b1de-20dfab1c2851',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	4.41847,	1504600721,	1504600794,	'Nairobi',	-1.2831,	36.8209,	1504601807,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'd895107d-f647-4427-9214-7a6e6e269a59',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	5.98336,	1490358363,	1490359056,	'Mombasa',	-3.9766,	39.7242,	1490360370,	'ad405a79-3a5c-44b8-b7b2-93fa7a998cec',	'da558e39-e141-496f-9de1-cf2374da3d55',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	0.977262,	1484897832,	1484898494,	'Nairobi',	-1.2831,	36.8209,	1484898843,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'e36b8dcd-6bba-472c-9906-5d38f5ffd30e',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	4.58224,	1486138994,	1486140413,	'Nairobi',	-1.2831,	36.8209,	1486142511,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'e39d37f4-4552-436a-b74b-80f46c1a0f17',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	6.81097,	1498852069,	1498852456,	'Nairobi',	-1.2831,	36.8209,	1498853289,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'f08b0d55-9024-43c4-8cc5-5bb066999825',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2'),
('completed',	13.6346,	1471324404,	1471324989,	'Nairobi',	-1.2831,	36.8209,	1471328006,	'aefc2fdf-a513-4602-bfa2-c8f946ef1d0a',	'fb9f9833-4436-447e-a31c-54faf718bf41',	'5821b9a7-8591-416d-93e2-2daa1d9b63a2');

DROP TABLE IF EXISTS `tbl_profile`;
CREATE TABLE `tbl_profile` (
  `uuid` varchar(150) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `mobile_verified` enum('true','false') NOT NULL,
  `promo_code` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `rider_id` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `uuid` (`uuid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_profile` (`uuid`, `first_name`, `last_name`, `email`, `password`, `mobile_verified`, `promo_code`, `picture`, `rider_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('5821b9a7-8591-416d-93e2-2daa1d9b63a2',	'Kevin',	'Morez',	'kevomarete@yahoo.com',	'',	'true',	'kevinm19019ue',	'https://d1w2poirtb3as9.cloudfront.net/default.jpeg',	'8MeSlnIeIjzBaoGN-vWge8FPYcoEQyibuTgit5-WU6_TJwDNLMEa_agu3zjYOx2Wyd3ic7PHrbViLFACc6i55Vml0DbxRE5Bu3b6OEgJISxlVMDXKksXN3ggkCYgvmKfsQ==',	'2017-11-29 20:17:25',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `tbl_token`;
CREATE TABLE `tbl_token` (
  `last_authenticated` int(11) NOT NULL,
  `access_token` text NOT NULL,
  `expires_in` int(11) NOT NULL,
  `token_type` varchar(50) NOT NULL,
  `scope` varchar(100) NOT NULL,
  `refresh_token` int(11) NOT NULL,
  `uuid` varchar(150) NOT NULL,
  UNIQUE KEY `profile_id` (`uuid`),
  KEY `expires_in` (`expires_in`),
  KEY `scope` (`scope`),
  CONSTRAINT `tbl_token_ibfk_1` FOREIGN KEY (`uuid`) REFERENCES `tbl_profile` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_token` (`last_authenticated`, `access_token`, `expires_in`, `token_type`, `scope`, `refresh_token`, `uuid`) VALUES
(0,	'KA.eyJ2ZXJzaW9uIjoyLCJpZCI6IityTWZ1LzZ1VEZHM0ZKOUdDK2hVblE9PSIsImV4cGlyZXNfYXQiOjE1MTQ1Nzg2NDAsInBpcGVsaW5lX2tleV9pZCI6Ik1RPT0iLCJwaXBlbGluZV9pZCI6MX0.iRTwCqgGMHzsLPTLK9FPmvVWiVUn1IzSD46cvE9L5-U',	2592000,	'Bearer',	'history profile request',	0,	'5821b9a7-8591-416d-93e2-2daa1d9b63a2');

-- 2017-11-29 20:40:10
