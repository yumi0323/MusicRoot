<?php
session_start();
require_once('./model/exhibit_function.php');
require_once('./model/common_function.php');
require_once('./model/image_function.php');

include './model/model_templates/no_login.php';

$token = get_post('token');
$dbh = getDbh();

if (isset($_POST['submit'])) {
	$_SESSION['category'] = get_post('category');
	$_SESSION['name'] = get_post('name');
	$_SESSION['price'] = get_post('price');
	$_SESSION['discription'] = get_post('discription');
	$_SESSION['singer']= get_post('singer');
	$_SESSION['quantity'] = get_post('quantity');

	$singer_name = get_post('singer');

	//singer_nameの取得
	$search_name = '%' . $singer_name . '%';
	$singer_select = search_singer_name($dbh, $search_name);
  //選択肢の確認
	$column = array_column($singer_select, 'singer_name');
	$count = count($column);

	foreach ($singer_select as $select) {
		if (!empty($singer_name)) {
			$singer .= '<input type="radio" name="singer" value="' . h($select['singer_id']) . '" checked>' . h($select['singer_name']);
			if (1 < $count) {
				$warning = '※選択の当てはまるものにチェックしてください';
			}
		} else {
			$singer = '<input type="radio" name="singer" value="1" checked>' . 'その他';
		}
		$_SESSION['singer_session'] = $singer;
	}
	
	//画像のアップロード
	if (is_uploaded_file($temp_file)) {
	 $item_image = getImg($temp_file, $dir);
 }

  $errors = array();
	include './model/model_templates/error.php';
	
	if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
		$errors[] = '金額を入力してください';
	}
	$_SESSION['errors'] = $errors;
}

if (isset($_POST['get_search']) || isset($_POST['back_search'])) {
	$singer_id = get_post('search_singer');
	$get_singer = get_singer_name($dbh, $singer_id);

  if (!empty($singer_id)) {
		$singer_search = '<input type="radio" name="singer" value="' . h($singer_id) . '" checked>' . h($get_singer['singer_name']);
	} else {
		$singer_search = get_session('singer_session');
	}
}

$category_name = get_session('category');
$item_name = get_session('name');
$sale_price = get_session('price');
$discription = get_session('discription');
$quantity = get_session('quantity');

include_once './view/exhibit_confirm_view.php';
?>