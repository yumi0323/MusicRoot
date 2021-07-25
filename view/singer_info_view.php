<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ecサイト</title>
  <link rel="stylesheet" href="./css/info.css">
</head>
<body>
<h1>アーティスト紹介ページ</h1>
<div class="wrapper">
  <div class="contents-box">
    <img src="./images/<?php echo h($singer['singer_image']); ?>">
  </div>
  <div class="main">
    <h2><span class="border">名前</span></h2>
      <p><?php echo h($singer['singer_name']); ?></span></p>
    <h2><span class="border">状況</span></h2>
      <p><?php echo h($singer['activity']); ?></p>
    <h2><span class="border">説明</span></h2>
      <p><?php echo h($singer['discription']); ?></p>
  </div>
</div>
<form method="post" action="exhibit_search.php">
  <input type="hidden" name="token" value="<?php echo h($token); ?>">
  <p><input type="submit" name="back" value="検索に戻る"></p>
</form>
</body>
</html>