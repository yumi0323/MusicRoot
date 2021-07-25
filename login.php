<?php
session_start();
require_once('./model/login_function.php');
require_once('./model/common_function.php');

$errors = array();
$msg = null;
$dbh = getDbh();

//ログインしているとtopに戻る
if (!empty($_SESSION['user_name'])) {
	if ($_SESSION['user_name']) {
		header('Location: ./top.php');
		exit;
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['guest'])) {
		//csrf対策
		include './model/model_templates/token.php';
		$email ='kei@gmail.com';
		$pass = '11112222Z';
	}

	if (isset($_POST['submit'])) {
		$email = get_post('email');
		$pass = get_post('pass');
		//csrf対策
		include './model/model_templates/token.php';
		if (empty($email)) {
			$errors[] = 'メールアドレスが未入力です';
		} else {
			$email_exit = email_exist($dbh, $email);
			if (empty($email_exit)) {
				$errors[] = 'メールアドレスが違います';
			}
		}

		if (empty($pass)) {
			$errors[] = 'パスワードが未入力です';
		} else {
			$pass_exit = pass_exist($dbh, $pass);
			if (empty($pass_exit)) {
				$errors[] = 'パスワードが違います';
			}
		}
	}
	
	if (empty($errors)) {
		$user = user_exist($dbh, $email, $pass);

		if (!empty($user)) {
			$_SESSION['user_name'] = $user['user_name'];
			$_SESSION['user_id'] = $user['user_id'];
			header('Location: ./top.php');
			exit;
		}
	}
}

$token = get_csrf_token();
include_once './view/login_view.php';
?>
