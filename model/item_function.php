<?php
require_once('db.php');

function get_item($dbh, $item_id) {
  $sql = "
    SELECT
      i.*,
      s.singer_name,
      u.user_name
    FROM
      item i 
    JOIN 
      singer s 
    ON
      i.singer_id = s.singer_id 
    JOIN
      user u 
    ON
      i.user_id = u.user_id
    WHERE 
      item_id = :item_id
    ";

  $params = array(':item_id' => $item_id);
  return fetch_query($dbh, $sql, $params);
}