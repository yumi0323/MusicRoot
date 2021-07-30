<?php
$token = get_post('token');

if(is_valid_csrf_token($token) === false) {
  unset($_SESSION['csrf_token']);
  /*
  header('Location: ./top.php');
  */
  echo 'tokenちゃいます';
}

unset($_SESSION['csrf_token']);
?>