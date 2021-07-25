<?php
//画像
define('MAX_FILE_SIZE', 307200);
//DB接続
define ('DSN', 'mysql:host=mysql;dbname=test;charset=utf8');
define ('DB_USER', 'test');
define ('DB_PASS', 'test');
//カテゴリー
define ('CATEGORY_LIST', array(
  "その他",
  "J-ポップ",
  "邦楽ロック",
  "アニメ",
  "邦楽ヒップホップ",
  "邦楽エレクトロニカ",
	"洋楽総合",
	"jazz",
	"クラシック",
));
define ('ACTIVITY_LIST', array(
  "活動中",
  "休止中",
  "解散済"
));
//１ページに表示する記事の数
define('max_view',6);
?>