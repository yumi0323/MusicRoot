<?php
require_once('db.php');

 function get_cart($dbh) {
  $sql = "
    SELECT
      c.*,
      i.item_name,
      i.item_image
    FROM 
      cart c 
    JOIN
      item i 
    ON
      c.item_id = i.item_id 
    WHERE
      delete_flag = 0
    ";

  return all_query($dbh, $sql);
 }

 function update_quantity($dbh, $change_quantity, $order_id) {
  $sql = "
    UPDATE
      cart 
    SET 
      quantity = :quantity 
    WHERE
      order_id = :order_id
    ";

  $params = array(':quantity' => $change_quantity, ':order_id' => $order_id);
  return execute_query($dbh, $sql, $params);
 }

 function delete_cart($dbh, $order_id) {
  $sql = "
    DELETE FROM 
      cart
    WHERE
      order_id = :order_id
    ";

  $params = array(':order_id' => $order_id);
  return execute_query($dbh, $sql, $params);
 }

 function get_item_id($dbh, $item_id) {
  $sql = "
    SELECT
      item_id 
    FROM 
      cart 
    WHERE
    item_id = :item_id
    ";

  $params = array(':item_id' => $item_id);
  return fetch_query($dbh, $sql, $params);
 }

 function insert_cart($dbh, $user_id, $order_date, $item_id, $quantity, $cart_price) {
  $sql = "
    INSERT INTO 
    cart(
      user_id,
      order_date, 
      item_id,
      quantity,
      cart_price
       ) 
    VALUE (:user_id, :order_date,:item_id, :quantity, :cart_price)
    ";

  $params = array(':user_id' => $user_id, ':order_date' => $order_date, ':item_id' => $item_id, ':quantity' => $quantity, ':cart_price' => $cart_price);
  return execute_query($dbh, $sql, $params);
 }

 function add_quantity($dbh, $quantity, $item_id) {
  $sql = "
    UPDATE
      cart 
    SET 
      quantity = quantity + :quantity 
    WHERE
      item_id = :item_id
    ";

  $params = array(':quantity' => $quantity, ':item_id' => $item_id);
  return execute_query($dbh, $sql, $params);
 }

 function quantity_count($dbh) {
  $sql = "
    SELECT
      c.item_id,
      i.item_name, 
      c.quantity AS c_quantity,
      s.quantity AS s_quantity
    FROM 
      cart c 
    JOIN
      stock s 
    ON 
     c.item_id = s.item_id 
    JOIN 
      item i 
    ON
      i.item_id = c.item_id
    ";
    
  return all_query($dbh, $sql);
 }

 //cart合計
 function sum_cart($cart_list)  {
	$total_price = 0;
	foreach($cart_list as $cart)  {
		$total_price += $cart['cart_price'] * $cart['quantity'];
	}
	return $total_price;
}
?>