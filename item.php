<?php
session_start();
date_default_timezone_set('Asia/Tokyo');
require_once('./model/item_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';

$item_id = get_get('item_id');
$dbh = getDbh();
$get_item = get_item($dbh, $item_id);

//出品停止した商品にアクセスさせない
if ($get_item['delete_flag'] == 1) {
	header('Location: ./top.php');
	exit;
}

//パラメータがない場合のアクセス制限
if (null == $item_id) {
  header('Location: ./top.php');
  exit;
}

if (!empty($item_id)) {
  $_SESSION['item_id'] = $_GET['item_id'];
}

include_once './view/item_view.php';
?>