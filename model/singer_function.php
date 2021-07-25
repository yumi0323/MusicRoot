<?php
require_once('db.php');

function get_singer($dbh, $singer_id) {
  $sql = "
    SELECT
      * 
    FROM 
      singer 
    WHERE 
      singer_id = :singer_id
    ";
    
  $params = array(':singer_id' => $singer_id);
  return fetch_query($dbh, $sql, $params);
}

function check_singer_name($dbh, $singer_name) {
  $sql = "
    SELECT
      * 
    FROM
      singer 
    WHERE 
      singer_name = :singer_name
    ";

  $params = array(':singer_name' => $singer_name);
  return fetch_query($dbh, $sql, $params);
}

function insert_singer($dbh, $singer_name, $activity, $discription, $singer_image) {
  $sql = "
    INSERT INTO 
    singer(
      singer_name,
      activity,
      discription,
      singer_image
      )
    VALUE (:singer_name, :activity, :discription, :singer_image)
    ";

  $params = array(':singer_name' => $singer_name, ':activity' => $activity, ':discription' => $discription, ':singer_image' => $singer_image);
  return execute_query($dbh, $sql, $params);
}
?>