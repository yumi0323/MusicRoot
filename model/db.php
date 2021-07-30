<?php
require_once('./conf/const.php');

function getDbh() {
	try {
		$dbh = new PDO(DSN, DB_USER, DB_PASS);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	} catch (Exception $e) {
		echo '接続失敗 '.$e->getMessage;
		die();
	}
	 return $dbh;
}

function query($dbh, $sql) {
  try {
    $stmt = $dbh->query($sql);
    return $stmt;
  } catch(PDOException $e) {
    set_error('更新に失敗しました。');
  }
  return false;
}

function all_query($dbh, $sql) {
  try {
    $stmt = $dbh->query($sql);
    return $stmt->fetchAll();
  } catch(PDOException $e) {
    set_error('更新に失敗しました。');
  }
  return false;
}

function execute_query($dbh, $sql, $params = array()) {
  try {
    $stmt = $dbh->prepare($sql);
    return $stmt->execute($params);
  } catch(PDOException $e) {
    set_error('更新に失敗しました。');
  }
  return false;
}

function fetch_all_query($dbh, $sql, $params = array()) {
  try {
    $stmt = $dbh->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
  } catch(PDOException $e) {
    set_error('データ取得に失敗しました。');
  }
  return false;
}

//functinが偽の場合falseを返す？
function fetch_query($dbh, $sql, $params = array()) {
  try {
    $stmt = $dbh->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetch();
  } catch (PDOException $e) {
    set_error('データ取得に失敗しました。');
  }
  return false; 
}
 ?>
