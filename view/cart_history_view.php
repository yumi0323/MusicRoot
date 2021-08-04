<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>MusicRoot</title>
  <link rel="stylesheet" href="./css/history.css">
</head>
<body>
<header>
  <h1>購入履歴ページ</h1>
</header>
<div id="header2">
  <ul>
  <div class="pic_frame">
    <li><a href='user.php?user_id=<?php echo h($login_id); ?>'><p><img src="./contents/person.png" alt="person"><br>マイページ</p></a></li>
  </div>
  <div class="pic_frame">
    <li><a href='top.php'><p><img src="./contents/top.png" alt="top"><br>TOP</p></a></li>
  </div>
  </ul>
</div>
<div class="contents-wrap">
<?php foreach ($cart_history as $history) : ?>
<div class="contents-box">
<img src="./images/<?php echo h($history['item_image']); ?>" width="20%" height="auto">
<p><?php echo h($history['item_name']); ?></p>
<p><?php echo h($history['cart_price']); ?>円</p>
<p><?php echo h($history['order_date']); ?></p>
</div>
<?php endforeach; ?>
 </div>
 <?php include './view/view_templates/pagenation_form.php'; ?> 
</body>
</html>