<?php
session_start();
require_once('./model/common_function.php');
require_once('./model/exhibit_function.php');
require_once('./model/image_function.php');

include './model/model_templates/no_login.php';

$token = get_post('token');

//検索//
if (isset($_POST['submit'])) {
    $get_search = get_post('search');
  }

list($search, $search_value) = search_value($get_search);
$search_name = '%' . $search . '%';
$dbh = getDbh();
$singer_select = search_singer_name($dbh, $search_name);

include_once './view/exhibit_search_view.php';
?>