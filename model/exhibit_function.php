<?php
require_once('db.php');
require_once('./model/common_function.php');

function edit_variable($name) {
  if ($_POST[$name]) {
     $value = get_post($name);
  } else {
     $value = $edit[$name];
  }
  return $value;
}

function search_singer_name($dbh, $search_name) {
  $sql = "
    SELECT
      * 
    FROM 
      singer 
    WHERE
      singer_name 
    LIKE 
      :search_name
      ORDER BY
      singer_name
      DESC
    ";

  $params = array(':search_name' => $search_name);
  return fetch_all_query($dbh, $sql, $params);
}

function get_singer_name($dbh, $singer_id) {
  $sql = "
    SELECT 
      singer_name 
    FROM 
      singer 
    WHERE 
      singer_id = :singer_id
    ";

  $params = array(':singer_id' => $singer_id);
  return fetch_query($dbh, $sql, $params);
}

function insert_item($dbh, $user_id, $singer_id, $category_name,$item_name, $item_image, $sale_price, $register_date, $discription) {
  $sql = "
    INSERT INTO 
    item(
      user_id,
      singer_id,
      category,
      item_name,
      item_image,
      sale_price,
      register_date,
      discription
      ) 
    VALUE (:user_id, :singer_id,:category, :item_name, :item_image, :sale_price, :register_date, :discription)
    ";

  $params = array(':user_id' => $user_id, ':singer_id' => $singer_id, ':category' => $category_name, ':item_name' => $item_name, ':item_image' => $item_image, ':sale_price' => $sale_price, ':register_date' => $register_date, ':discription' => $discription);
  return execute_query($dbh, $sql, $params);
}

function insert_stock($dbh, $item_id, $quantity) {
  $sql = "
    INSERT INTO 
    stock(
      item_id, 
      quantity
    ) 
    VALUE (:item_id, :quantity)
    ";
	
  $params = array(':item_id' => $item_id, ':quantity' => $quantity);
  return execute_query($dbh, $sql, $params);
}

function get_exhibit_edit($dbh, $item_id, $user_id) {
  $sql = "
    SELECT
      i.*,
      s1.singer_name,
      s2.quantity
    FROM 
      item i 
    JOIN
      singer s1 
    ON
      i.singer_id = s1.singer_id
    JOIN
      stock s2 
    ON
      i.item_id = s2.item_id 
    WHERE 
      i.item_id = :item_id
    AND 
      i.user_id = :user_id
    ";

  $params = array(':item_id' => $item_id, ':user_id' => $user_id);
  return fetch_query($dbh, $sql, $params);
}

function update_exhibit($dbh, $price, $discription, $quantity, $item_id) {
  $sql = "
    UPDATE
      item i,
      stock s2
    SET
      i.sale_price = :sale_price,
      i.discription = :discription,
      s2.quantity = :quantity
    WHERE
      i.item_id = :i_item_id
    AND
      s2.item_id = :s2_item_id
    ";
  $params = array(':sale_price' => $price, ':discription' => $discription, ':quantity' => $quantity, ':i_item_id' => $item_id, ':s2_item_id' => $item_id);
  return execute_query($dbh, $sql, $params);
}

function stop_exhibit($dbh, $item_id) {
  $sql = "
    UPDATE
      item 
    SET
      delete_flag = :delete_flag
    WHERE
      item_id = :item_id
    ";

  $params = array(':delete_flag' => 1, ':item_id' => $item_id);
  return execute_query($dbh, $sql, $params);
}

function return_exhibit($dbh, $item_id) {
  $sql = "
    UPDATE
      item 
    SET
      delete_flag = :delete_flag
    WHERE
      item_id = :item_id
    ";

  $params = array(':delete_flag' => 0, ':item_id' => $item_id);
  return execute_query($dbh, $sql, $params);
}

function stop_cart($dbh, $item_id) {
  $sql = "
    DELETE FROM 
      cart
    WHERE
      item_id = :item_id
    ";

  $params = array(':item_id' => $item_id);
  return execute_query($dbh, $sql, $params);
 }
?>