<?php
require_once('db.php');

function user_email($dbh, $new_email) {
  $sql = "
    SELECT
      * 
    FROM
      user
    WHERE
      email = :email
    ";

  $params = array(':email' => $new_email);
  return fetch_query($dbh, $sql, $params);
}

function insert_user($dbh, $new_name, $new_email, $new_pass) {
  $sql = "
    INSERT INTO
      user(
        user_name,
        email,
        pass
        )
    VALUES (:user_name, :email, :pass)
    ";
			
  $params = array(':user_name' => $new_name, ':email' => $new_email, ':pass' => $new_pass);
  return execute_query($dbh, $sql, $params);
}
?>