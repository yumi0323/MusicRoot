<?php
session_start();
require_once('./model/purchase_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';

if (isset($_POST['contenue']))  {
  header('Location: ./top.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['purchase'])) {
    //csrf対策
    include './model/model_templates/token.php';
    $order_id = get_post('order_id');
    $item_id = get_post('item_id');
    $quantity = get_post('quantity');

    //historyに記録を残す
    $dbh = getDbh();
    $insert_history = insert_history($dbh);
    if ($insert_history) {
      $subtract_quantity = subtract_quantity($dbh);
      if ($subtract_quantity) {
        $delete_all_cart = delete_all_cart($dbh);
      }
    }
  }
}

include_once './view/purchase_view.php';
?>