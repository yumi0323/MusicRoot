<?php
require_once('db.php');

function get_comment($dbh, $item_id) {
  $sql = "
    SELECT
      c.*,
      u.user_name
      FROM 
      comment c
    JOIN
      user u
    ON
      c.user_id = u.user_id
    WHERE 
      c.item_id = :item_id
    ORDER BY
      c.comment_id
    DESC
    ";

  $params = array(':item_id' => $item_id);
  return fetch_all_query($dbh, $sql, $params);
}

function insert_comment($dbh, $user_id, $item_id, $comment) {
  $sql = "
    INSERT INTO
    comment(
      user_id,
      item_id,
      comment
      )
    VALUE (:user_id, :item_id, :comment)
    ";

  $params = array(':user_id' => $user_id, ':item_id' => $item_id, ':comment' => $comment);
  return execute_query($dbh, $sql, $params);
}

function delete_comment($dbh, $comment_id) {
  $sql = "
    DELETE FROM 
      comment
    WHERE
      comment_id = :comment_id
    ";
    
  $params = array(':comment_id' => $comment_id);
  return execute_query($dbh, $sql, $params);
 }
?>