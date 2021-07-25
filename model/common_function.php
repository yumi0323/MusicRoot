<?php
require_once('./conf/const.php');

//検索で必要な＄_GETを受け取る
function search_value($get_search) {
  if (isset($get_search)) {
    $search = h($_POST['search']);
    $search_value = $search;
  } else {
    $search = '';
    $search_value = '';
  }
  
return array($search, $search_value);
}

function get_get($name) {
  if(isset($_GET[$name]) === true) {
    return $_GET[$name];
  };
  return '';
}

function get_post($name) {
  if(isset($_POST[$name]) === true) {
    return $_POST[$name];
  };
  return '';
}


function get_session($name) {
  if(isset($_SESSION[$name]) === true) {
    return $_SESSION[$name];
  };
  return '';
}

function set_session($name, $value) {
  $_SESSION[$name] = $value;
}

//csrf対策
function get_random_string($length = 20) {
  return substr(base_convert(hash('sha256', uniqid()), 16, 36), 0, $length);
}

// トークンの生成
function get_csrf_token() {
  $token = get_random_string(30);
  
  set_session('csrf_token', $token);
  return $token;
}

// トークンのチェック
function is_valid_csrf_token($token) {
  if($token === '') {
    return false;
  }
  // get_session()はユーザー定義関数
  return $token === get_session('csrf_token');
}

// subトークンの生成
function get_sub_csrf_token() {
  $sub_token = get_random_string(30);
  
  set_session('sub_csrf_token', $sub_token);
  return $sub_token;
}

// subトークンのチェック
function is_valid_sub_csrf_token($sub_token) {
  if($sub_token === '') {
    return false;
  }
  // get_session()はユーザー定義関数
  return $sub_token === get_session('sub_csrf_token');
}

//クロスサイトスプリティング（xss）
function h($s) {
	return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

?>
