<?php
require_once('db.php');

function user_exist($dbh, $email, $pass) {
  $sql = "
    SELECT
      * 
    FROM 
      user 
    WHERE 
      email = :email
    AND
      pass = :pass
    ";

  $params = array(':email' => $email, ':pass' => $pass);
  return fetch_query($dbh, $sql, $params);
}

function email_exist($dbh, $email) {
  $sql = "
    SELECT
      * 
    FROM 
      user 
    WHERE 
      email = :email
    ";

  $params = array(':email' => $email);
  return fetch_query($dbh, $sql, $params);
}

function pass_exist($dbh, $pass) {
  $sql = "
    SELECT
      * 
    FROM 
      user 
    WHERE 
      pass = :pass
    ";

  $params = array(':pass' => $pass);
  return fetch_query($dbh, $sql, $params);
}
?>