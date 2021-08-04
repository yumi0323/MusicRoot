<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>MusicRoot</title>
  <link rel="stylesheet" href="./css/history.css">
</head>
<body>
<header>
<h1>出品履歴ページ</h1>
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
  <?php foreach ($exhibit_history as $exhibit) : ?>
    <div class="contents-box">
      <img src="./images/<?php echo h($exhibit['item_image']); ?>" width="20%" height="auto">
      <p>タイトル：<?php echo h($exhibit['item_name']); ?></p>
      <p>金額：<?php echo h($exhibit['sale_price']); ?>円</p>
      <p>アーティスト：<?php echo h($exhibit['singer_name']); ?></p>
      <p>在庫数：<?php echo h($exhibit['quantity']); ?></p>
      <p>出品日：<?php echo h($exhibit['register_date']); ?></p>
      <p><a href="exhibit_edit.php?item_id=<?php echo h($exhibit['item_id']); ?>">編集ページ</a></p+>
    </div>
  <?php endforeach; ?>
</div>
<?php include './view/view_templates/pagenation_form.php'; ?> 
</body>
</html>