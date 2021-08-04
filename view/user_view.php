<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>MusicRoot</title>
  <link rel="stylesheet" href="./css/info.css">
</head>
<body>
<h1>マイページ</h1>
<div id="header2">
  <ul>
    <div class="pic_frame">
      <li><a href='cart_history.php'><p><img src="./contents/cart_history.png" alt="cart_history"><br>購入履歴</p></a></li>
    </div>
    <div class="pic_frame">
      <li><a href='exhibit_history.php'><p><img src="./contents/exhibit_history.png" alt="exhibit_history"><br>出品履歴</p></a></li>
    </div>
    <div class="pic_frame">
      <li><a href='top.php'><p><img src="./contents/top.png" alt="top"><br>TOP</p></a></li>
    </div>
  </ul>
</div>
<div class="wrapper">
    <div class="contents-box">
    <?php if ($user['user_image']): ?>
      <img src="./images/<?php echo h($user['user_image']); ?>" width="300" height="300">
    <?php else: ?>
      <p>画像はありません未登録です</p>
    <?php endif; ?>
    <a href="user_edit.php">編集</a>
  </div>
  <div class="main">
    <h2><span class="border">名前</span></h2>
      <p><?php echo h($user['user_name']); ?></p>
    <h2><span class="border">説明</span></h2>
      <p><?php echo h($user['introduction']); ?></p>
  </div>
</div>
</body>
</html>