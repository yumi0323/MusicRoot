<?php
session_start();

include './model/model_templates/no_login.php';

$_SESSION = array();
if (ini_get('session.use_cookies')) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

session_destroy();
include_once './view/logout_view.php';
?>