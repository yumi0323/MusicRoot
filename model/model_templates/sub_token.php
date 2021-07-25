<?php
$sub_token = get_post('sub_token');

if (is_valid_sub_csrf_token($sub_token) === false) {
  unset($_SESSION['sub_csrf_token']);
  header('Location: ./top.php');
}

unset($_SESSION['sub_csrf_token']);
?>