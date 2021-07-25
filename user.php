<?php
session_start();
require_once('./model/user_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';

$user_id = get_get('user_id');
$session_user = $_SESSION['user_id'];

//他人からアクセスさせない
if ($user_id != $session_user) {
	header('Location: ./top.php');
	exit;
}

//パラメータがない場合のアクセス制限
if (null == $user_id) {
	header('Location: ./top.php');
	exit;
}

$dbh = getDbh();
$user = get_user($dbh, $user_id);

include_once './view/user_view.php';
?>