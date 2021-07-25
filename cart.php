<?php
session_start();
require_once('./model/cart_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';

$dbh = getDbh(); 
$cart_list = get_cart($dbh);
$total_price = sum_cart($cart_list);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['change'])) {
        //csrf対策
        include './model/model_templates/token.php';
        $order_id = get_post('order_id');
        $change_quantity = get_post('change_quantity');
        $update_quantity = update_quantity($dbh, $change_quantity, $order_id);
    }

    if (isset($_POST['delete'])) {
        //csrf対策
        include './model/model_templates/token.php';
        $order_id = get_post('order_id');
        $delete_cart = delete_cart($dbh, $order_id);
    }

    if (isset($_POST['get_item'])) {
        //csrf対策
        include './model/model_templates/sub_token.php';
        $user_id = get_post('user_id');
        $item_id = get_post('item_id');
        $quantity = get_post('quantity');
        $cart_price = get_post('price');
        $item_data = get_item_id($dbh, $item_id);

        if ($item_data['item_id'] === null) {
            $order_date = date('Y-m-d H:i:s');
            $insert_cart = insert_cart($dbh, $user_id, $order_date, $item_id, $quantity, $cart_price);
        } else {
            $add_quantity = add_quantity($dbh, $quantity, $item_id);
        }
    }
    header('Location: ./cart.php');
}

$quantity_count = quantity_count($dbh);
foreach ($quantity_count as $count) {
    if ($count['c_quantity'] > $count['s_quantity']) {
        $error .= '<li>' . h($count['item_name']) . 'の在庫数がありませんので数量を変更してください(在庫数' . h($count['s_quantity']) . '個)</li>';
    }
 }   
$token = get_csrf_token();
include_once './view/cart_view.php';
?>