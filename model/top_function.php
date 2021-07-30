<?php
require_once('db.php');

function get_recommend($dbh) {
  $sql = "
  SELECT
    u.user_id,
    u.user_name,
    i.item_id,
    i.item_name,
    i.item_image,
    i.sale_price,
    i.register_date,
    s.quantity
  FROM
    item i 
  JOIN 
    user u 
  ON
    i.user_id = u.user_id
  JOIN
    stock s 
  ON
    i.item_id = s.item_id
  WHERE
    delete_flag = 0
  AND
    i.register_date
  ORDER BY 
    i.register_date
  DESC
    LIMIT 5
  ";

  return all_query($dbh, $sql);
}

function search_top($dbh, $search_item) {
  $sql = "
    SELECT
      u.user_id,
      u.user_name,
      i.item_id,
      i.item_name,
      i.item_image,
      i.sale_price,
      s.quantity
    FROM
      item i 
    JOIN 
      user u 
    ON
      i.user_id = u.user_id
    JOIN
      stock s 
    ON
      i.item_id = s.item_id
    WHERE
      delete_flag = 0
    AND
      item_name 
    LIKE 
      :search_item 
    ORDER BY 
      item_name
    ";

  $params = array(':search_item' => $search_item);
  return fetch_all_query($dbh, $sql,$params);
}
?>