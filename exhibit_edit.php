<?php
session_start();
date_default_timezone_set('Asia/Tokyo');
require_once('./model/exhibit_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';

$item_id = get_get('item_id');
$user_id = $_SESSION['user_id'];

//パラメータがない場合のアクセス制限
if (null == $item_id) {
	header('Location: ./top.php');
	exit;
}

$dbh = getDbh();
$edit = get_exhibit_edit($dbh, $item_id, $user_id);
//他人からアクセスさせない
if (!$edit) {
	header('Location: ./top.php');
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$item_id = get_post('item_id');

	if (isset($_POST['submit'])) {
		//csrf対策
		include './model/model_templates/token.php';

		$price = edit_variable('price');
		$quantity = edit_variable('quantity');
		$discription = edit_variable('discription');

		$update_exhibit = update_exhibit($dbh, $price, $discription, $quantity, $item_id);
		if ($update_exhibit) {
			header('Location: ./exhibit_history.php');
			exit;
		}
	}

	if (isset($_POST['stop'])) {
		//csrf対策
		include './model/model_templates/token.php';
		$stop_exhibit = stop_exhibit($dbh, $item_id);
		if ($stop_exhibit) {
			$stop_cart = stop_cart($dbh, $item_id);
			if ($stop_cart) {
				header('Location: ./exhibit_history.php');
				exit;
			}
		}
	}

	if (isset($_POST['return'])) {
		//csrf対策
		include './model/model_templates/token.php';
		$return_exhibit = return_exhibit($dbh, $item_id);
		if ($return_exhibit) {
			header('Location: ./exhibit_history.php');
			exit;
		}
	}
}

$token = get_csrf_token();
include_once './view/exhibit_edit_view.php';
?>