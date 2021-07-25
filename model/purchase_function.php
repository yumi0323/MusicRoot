<?php
require_once('db.php');

function insert_history($dbh) {
  $sql = "
    INSERT INTO
      history(
        order_id,
        order_date,
        user_id,
        item_id,
        quantity,
        cart_price
        )
    SELECT
      order_id,
      DATE_FORMAT(order_date,'%Y-%m-%d %H:%i:%s'), 
      user_id,
      item_id,
      quantity, 
      cart_price 
    FROM
      cart
    ";

  return query($dbh, $sql);
}

function subtract_quantity($dbh) {
  $sql = "
    UPDATE
      stock s,
      cart c 
    SET
     s.quantity = s.quantity - c.quantity 
     WHERE 
     s.item_id = c.item_id
    ";

  return query($dbh, $sql);
}
function delete_all_cart($dbh) {
  $sql = "
    DELETE FROM
      cart
    ";

   return query($dbh, $sql);
}
?>