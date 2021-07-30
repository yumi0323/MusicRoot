<?php
require_once('db.php');

function top_count($dbh, $search_item) {
  $sql = "
    SELECT 
      COUNT(*) AS count 
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
    ";

  $params = array(':search_item' => $search_item);
  return fetch_query($dbh, $sql, $params);
}

function top_pagenation($dbh, $start_no, $max, $search_item) {
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
    LIMIT :start, :max
    ";

  $params = array(':start' => $start_no, ':max' => $max, ':search_item' => $search_item);
  return fetch_all_query($dbh, $sql, $params);
}

function cart_history_count($dbh, $login_id) {
  $sql = "
    SELECT 
      COUNT(*) AS count 
    FROM
      item i 
    JOIN 
      history h 
    ON 
      i.item_id = h.item_id 
    WHERE 
      h.user_id = :user_id 
    ";
        
  $params = array(':user_id' => $login_id);
  return fetch_query($dbh, $sql, $params);
}

function cart_history_pagenation($dbh, $start_no, $max, $login_id) {
  $sql = "
    SELECT
          i.item_name, 
          i.item_image,
          h.*
        FROM 
          item i 
        JOIN
          history h 
        ON 
          i.item_id = h.item_id 
        WHERE 
          h.user_id = :user_id 
        ORDER BY
          h.order_date 
        DESC
          LIMIT :start, :max
        ";

$params = array(':start' => $start_no, ':max' => $max, ':user_id' => $login_id);
return fetch_all_query($dbh, $sql, $params);
}

function exhibit_history_count($dbh, $login_id) {
  $sql = "
    SELECT 
      COUNT(*) AS count 
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
      i.user_id = :user_id
    ";
    
  $params = array(':user_id' => $login_id);
  return fetch_query($dbh, $sql, $params);
}

function exhibit_history_pagenation($dbh, $start_no, $max, $login_id) {
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
      i.user_id = :user_id
    LIMIT :start, :max
    ";

  $params = array(':start' => $start_no, ':max' => $max, ':user_id' => $login_id);
  return fetch_all_query($dbh, $sql, $params);
}
?>
