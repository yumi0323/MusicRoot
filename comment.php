<?php
session_start();
require_once('./model/item_function.php');
require_once('./model/comment_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';

if (isset($_POST['question'])) {
  $_SESSION['item_id'] = get_post('item_id');
}

$item_id = get_session('item_id');

//商品一覧
$dbh = getDbh();
$get_item = get_item($dbh, $item_id);

//コメント一覧
$comment_list = get_comment($dbh, $item_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['submit'])) {
    //csrf対策
    include './model/model_templates/token.php';
    $comment = get_post('comment');
    $user_id = get_session('user_id');
    $item_id = get_post('item_id');
    
    $insert_comment = insert_comment($dbh, $user_id, $item_id, $comment);
    if ($insert_comment) {
      header('Location: ./comment.php');
      exit;
    }
  }

  if (isset($_POST['delete'])) {
    //csrf対策
    include './model/model_templates/token.php';
    $comment_id = get_post('comment_id');
    $delete_comment = delete_comment($dbh, $comment_id);
    if ($delete_comment) {
      header('Location: ./comment.php');
      exit;
    }
  }
}

$token = get_csrf_token();
include_once './view/comment_view.php';
?>