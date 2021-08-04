<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>MusicRoot</title>
  <link rel="stylesheet" href="./css/info.css">
</head>
<body>
<header>
    <h1>商品一覧</h1>
</header>
<p><a href="user.php?user_id=<?php echo h($get_item['user_id']); ?>"><?php echo h($get_item['user_name']); ?>さんの商品です</a></p>
<form action="comment.php" method="post">
  <input type="hidden" name="item_id" value="<?php echo h($get_item['item_id']); ?>">
  <input type="submit" name="question" value="しつもん">
</form>
<div class="wrapper">
  <div class="contents-box">
    <img src="./images/<?php echo h($get_item['item_image']); ?>" width="300" height="300">
  </div>
  <div class="main">
    <p>◆商品名</p>
    <p><?php echo h($get_item['item_name']); ?></p>
    <p>◆アーティスト名</p>
    <p><?php echo h($get_item['singer_name']); ?></p>
    <p>◆金額</p>
    <p><?php echo h($get_item['sale_price']); ?></p>
    <p>◆カテゴリー</p>
    <p><?php echo h($get_item['category_id']); ?></p>
    <p>◆一言コメント</p>
    <p><?php echo h($get_item['discription']); ?></p>
    <p>◆発売日</p>
    <p><?php echo h($get_item['register_date']); ?></p>
  </div>
</div>
<p><a href="top.php">ホーム</a></p>
</body>
</html>