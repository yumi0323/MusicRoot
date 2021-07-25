<?php
session_start();
date_default_timezone_set('Asia/Tokyo');
require_once('./model/cart_function.php');
require_once('./model/common_function.php');
require_once('./model/pagenation_function.php');

include './model/model_templates/no_login.php';

$url = 'cart_history.php';
$login_id = get_session('user_id');
$dbh = getDbh();

//pagenation
$total_count = cart_history_count($dbh, $login_id);
include './model/model_templates/pagenation.php';
$cart_history = cart_history_pagenation($dbh, $start_no, $max, $login_id);
  
include_once './view/cart_history_view.php';
?>