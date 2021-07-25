<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ecサイト</title>
  <link rel="stylesheet" href="./css/top.css">
</head>
<body>
<header>
  <h1>ecサイト</h1>
</header>
<div id="header">
  <label>記事の検索</label>
  <form action="top.php" method="post">
    <?php include './view/view_templates/search_form.php'; ?>  
  </form>
</div>
<div id="header2">
  <ul>
  <?php if (isset($_SESSION['user_name'])): ?>
    <div class="pic_frame">
      <li><a href='cart.php'><p><img src="./contents/cart.png" alt="cart"><br>購入</p></a></li>
    </div>
    <div class="pic_frame">
      <li><a href='exhibit.php'><p><img src="./contents/cd.png" alt="cd"><br>出品</p></a></li>
    </div>
    <div class="pic_frame">
      <li><a href='user.php?user_id=<?php echo h($user_id); ?>'><p><img src="./contents/person.png" alt="person"><br><?php echo h($name); ?>さん</p></a></li>
    </div>
    <div class="pic_frame">
      <li><a href='logout.php'><p><img src="./contents/exit.png" alt="exit"><br>ログアウト</p></a></li>
    </div>
  <?php  else: ?>
    <div class="pic_frame">
      <li><a href='login.php'><p><img src="./contents/login.png" alt="person"><br>ログイン</p></a></li>
    </div>
  <?php  endif; ?>
  </ul>
</div>
<div class="title">
  <h3>新着TOP5</h3>
</div>
<ul class="horizontal-list">
  <?php foreach ($recommend_item as $item): ?>
    <li class="item">
    <?php include './view/view_templates/top_form.php'; ?> 
  <?php  endforeach; ?>
    </li>
</ul>
<div class="title">
  <h3>商品一覧</h3>
</div>
<h3><?php echo h($no_item); ?></h3>
<div class="contents-wrap">
  <?php foreach ($top_item as $item): ?>
    <div class="contents-box">
      <?php include './view/view_templates/top_form.php'; ?> 
    </div>
  <?php endforeach; ?>
</div>
<?php include './view/view_templates/pagenation_form.php'; ?> 
</body>
</html>