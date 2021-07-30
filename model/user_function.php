<?php
require_once('db.php');
require_once('./model/common_function.php');

function user_variable($name) {
  if ($_POST[$name]) {
     $value = get_post($name);
  } else {
     $value = $user[$name];
  }
  return $value;
}

function get_user($dbh, $user_id) {
  $sql = "
  SELECT
   * 
   FROM
   user
  WHERE
    user_id = :user_id
  ";
  $params = array(':user_id' => $user_id);
  return fetch_query($dbh, $sql, $params);
}

function update_user($dbh, $user_name, $introduction, $user_image, $user_id) {
  $sql = "
  UPDATE
    user 
  SET
    user_name = :user_name,
    introduction = :introduction,
    user_image = :user_image
  WHERE
    user_id = :user_id
  ";

  $params = array(':user_name' => $user_name, ':introduction' => $introduction, ':user_image' => $user_image, ':user_id' => $user_id);
	return execute_query($dbh, $sql, $params);
}
?>