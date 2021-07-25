<?php
session_start();
date_default_timezone_set('Asia/Tokyo');
require_once('./model/exhibit_function.php');
require_once('./model/common_function.php');
require_once('./model/pagenation_function.php');

include './model/model_templates/no_login.php';

$url = 'exhibit_history.php';
$login_id = get_session('user_id');
$dbh = getDbh();

//pagenation
$total_count = exhibit_history_count($dbh, $login_id);
include './model/model_templates/pagenation.php';
$exhibit_history = exhibit_history_pagenation($dbh, $start_no, $max, $login_id);
  
include_once './view/exhibit_history_view.php';
?>