<?php
session_start();
date_default_timezone_set('Asia/Tokyo');
require_once('./model/image_function.php');
require_once('./model/user_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';

$user_id = get_session('user_id');
$dbh = getDbh();
$user = get_user($dbh, $user_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['submit'])) {
		//csrf対策
		include './model/model_templates/token.php';
		$user_name = user_variable('user_name');
		$introduction = user_variable('introduction');

		if ($_FILES['image']['error'] === 2) {
			$error = 'error:ファイルサイズを小さくしてください';
		}

		if (empty($error)) {
			//画像のアップロード
			$d_file = $user['user_image'];

			if (is_uploaded_file($temp_file)) {
				$user_image = getImg($temp_file, $dir);
				$d_img = deleteImg($dir, $d_file);
			} else {
				$user_image = $user['user_image'];
			}
			//userデータの更新
			$user = update_user($dbh, $user_name, $introduction, $user_image, $user_id);
			if ($user) {
			header('Location: ./user.php?user_id='. "$user_id");
			exit;
			}
		}
	}
}

$token = get_csrf_token();
include_once './view/user_edit_view.php';
?>