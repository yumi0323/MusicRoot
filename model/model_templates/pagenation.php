<?php
require_once('./conf/const.php');

$max = max_view;
//ページの最大値（総ページ数を計算するsql）
$max_pages = ceil($total_count['count'] / $max);

//現在いるページのページ番号を取得         
if (!isset($_GET['page_id'])){
  $now = 1;
} else {
  $now = $_GET['page_id'];
  if (1 > $now) {
    $now = 1;
  }
}

//現在いるページより総ページ数がちいさかったら
if ($now > $max_pages) {
  $now = $max_page;
}

//スタートするページを取得
if ($now == 1) {
  //1ページ目の処理
   $start_no = $now - 1;
} else {
  //１ページ目以降の処理
  $start_no = ($now - 1) * $max;
}
?>


