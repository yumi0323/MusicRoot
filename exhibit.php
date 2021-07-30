<?php
session_start();
//warningエラーを非表示
error_reporting(0);
require_once('./model/exhibit_function.php');
require_once('./model/image_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';

$lists = CATEGORY_LIST;
$post_value = get_post('category');
include './model/model_templates/list.php';

$user_id = $_SESSION['user_id'];

if (empty($_SESSION['user_name'])) {
	header('Location: ./top.php');
	exit;
}

$singer_id = get_post('singer');
$category_name = get_post('category');
$item_name = get_post('name');
$item_image = get_post('image');
$sale_price = get_post('price');
$discription = get_post('discription');
$quantity = get_post('quantity');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$dbh = getDbh();
	if (isset($_POST['btn_back'])) {
		//csrf対策
		include './model/model_templates/token.php';
		//戻るボタンが押されたら画像を消す
		$d_file = get_post('image');
		$d_img = deleteImg($dir, $d_file);

		//singer_nameの取得
		$singer_name = get_singer_name($dbh, $singer_id);
		$singer_name = $singer_name['singer_name'];
	}

	if (isset($_POST['btn_confirm'])) {
		//csrf対策
		include './model/model_templates/token.php';
		if (empty($item_image)) {
			$item_image = '190244106260b4e74b10828.png';
		} else {
			$item_image = get_post('image');
		}

		$register_date = date('Y-m-d H:i:s');
		$insert_item = insert_item($dbh, $user_id, $singer_id, $category_name,$item_name, $item_image, $sale_price, $register_date, $discription);
		$item_id = $dbh->lastInsertId();

		if ($insert_item) {
			$insert_stock = insert_stock($dbh, $item_id, $quantity);
		}
		if ($insert_stock) {
			header('Location: ./top.php');
			exit;
		}
	}
}

$token = get_csrf_token();
include_once './view/exhibit_view.php';
?>