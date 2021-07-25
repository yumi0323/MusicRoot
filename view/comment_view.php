<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ecサイト</title>
  <link rel="stylesheet" href="./css/comment.css">
</head>
<body>
<header>
    <h1>コメント</h1>
</header>
<p><a href="board_info.php?user_id=<?php echo h($get_item['user_id']); ?>"><?php echo h($get_item['user_name']); ?>さんの商品です</a></p>
<div class="wrapper">
  <div class="contents-box">
    <img src="./images/<?php echo h($get_item['item_image']); ?>" width="300" height="300">
    <p>◆商品名</p>
    <p><?php echo h($get_item['item_name']); ?></p>
    <p>◆アーティスト名</p>
    <p><?php echo h($get_item['singer_name']); ?></p>
    <p>◆金額</p>
    <p>￥<?php echo h($get_item['sale_price']); ?></p>
  </div><!--content-boxの終わり-->
  <div class="main">
    <form method="post" action="comment.php">
      <label for="comnt">コメント</label>
      <input type="text" name="comment" >
      <input type="hidden" name="item_id" value="<?php echo h($get_item['item_id']); ?>">
      <input type="hidden" name="token" value="<?php echo h($token); ?>">
      <button type="submit" name="submit">送信</button>
    </form>
    <div class="box">
      <?php foreach ($comment_list as $list): ?>
        <form method="post" action="comment.php">
          <p><?php echo h($list['user_name']); ?> さん: <?php echo h($list['comment']); ?>
          <?php if ($list['user_id'] === $_SESSION['user_id']): ?> 
            <button type="submit" name="delete">削除</button>
          <?php endif; ?></p>
          <input type="hidden" name="comment_id" value="<?php echo h($list['comment_id']); ?>">
          <input type="hidden" name="token" value="<?php echo h($token); ?>">
        </form>
      <?php endforeach; ?>
    </div><!--boxの終わり-->
  </div><!--mainの終わり-->
</div><!--wrapperの終わり-->
<p><a href="item.php?item_id=<?php echo h($item_id); ?>">商品一覧</a></p>
<p><a href="top.php">ホーム</a></p>
</body>
</html>   