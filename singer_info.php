<?php
session_start();
require_once('./model/singer_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';
$token = $_SESSION['csrf_token'];
$singer_id = get_get('singer_id');

//パラメータがない場合のアクセス制限
if (null == $singer_id) {
	header('Location: ./top.php');
	exit;
}

if (isset($_GET['singer_id'])) {
  $dbh = getDbh();
  $singer = get_singer($dbh, $singer_id);
}

include_once './view/singer_info_view.php';
?>