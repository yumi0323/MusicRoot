<?php
session_start();
require_once('./model/register_function.php');
require_once('./model/common_function.php');

//ログインしているとtopに戻る
if (!empty($_SESSION['user_name'])) {
	if ($_SESSION['user_name']) {
		header('Location: ./top.php');
		exit;
	}
}

$errors = array();
$msg = null;
$link = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['submit'])) {
		//csrf対策
		include './model/model_templates/token.php';
		$new_name = get_post('name');
		$new_email = get_post('email');
		$new_pass = get_post('pass');

		if (empty($new_name)) {
			$errors[] = '名前が未入力です';
		}

		if (empty($new_email)) {
			$errors[] = 'メールアドレスが未入力です';
		} elseif (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zAZ0-9\._-]+)+$/", $new_email)) {
			$errors[] = 'メールアドレスの形式で入力してください';
		}

		if (empty($new_pass)) {
			$errors[] = 'パスワードが未入力です';
		} elseif (!preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $new_pass)) {
			$errors[] = 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください';
		}

		if (empty($errors)) {
			$dbh = getDbh();
			$user_email = user_email($dbh, $new_email);
			
			if ($user_email['email'] === $new_email) {
				$msg = '同じメールアドレスが存在します。';
			} else {
				$insert_user = insert_user($dbh, $new_name, $new_email, $new_pass);
				$msg = '会員登録が完了しました';
			}
		}
	}
}

$token = get_csrf_token();
include_once './view/register_view.php';
?>