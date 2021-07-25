<?php
session_start();
date_default_timezone_set('Asia/Tokyo');
require_once('./model/common_function.php');
require_once('./model/top_function.php');
require_once('./model/pagenation_function.php');

$msg = null;
$name = null;
$url = 'top.php';

$dbh = getDbh();
$name = get_session('user_name');
$user_id = get_session('user_id');

//新着一覧
$recommend_item = get_recommend($dbh);
	
//検索
if (isset($_POST['submit'])){
  //csrf対策
  include './model/model_templates/token.php';
  $get_search = get_post('search');
}
  
list($search, $search_value) = search_value($get_search);
$search_item = '%' . $search .'%';
$list_item = search_top($dbh, $search_item);
if (!$list_item) {
  $no_item = '該当する商品がありません';
}

//pagenation
$total_count = top_count($dbh, $search_item);
include './model/model_templates/pagenation.php';
$top_item = top_pagenation($dbh, $start_no, $max, $search_item);

$token = get_csrf_token();
$sub_token = get_sub_csrf_token();
include_once './view/top_view.php';
?>