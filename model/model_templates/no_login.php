<?php
//ログインしてないとtopに戻る
if (empty($_SESSION['user_name'])) {
		header('Location: ./top.php');
		exit;
}
?>