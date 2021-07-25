<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ecサイト</title>
</head>
<body>
<header>
  <h1>出品編集ページ</h1>
</header>
<div>
  <label for="explanation">説明</label>
  <p>※値下げまたは値上げをすることができます</p>
  <p>※説明書きと個数を編集することができます</p>
  <p>※名前などを変更したい場合は商品を削除して商品を再出品してください</p>
</div>
<div>
  <label for="name">名前</label>
  <?php echo h($edit['item_name']); ?>
</div>
<div>
  <label for="category">ジャンル：</label>
  <?php echo h($edit['category']);?>
</div>
<div>
  <label for="singer">アーティスト名：</label>
  <?php echo h($edit['singer_name']); ?>
</div>
<form method="post" action="exhibit_edit.php">
  <div>
    <img src="./images/<?php echo h($edit['item_image']); ?>" width="20%" height="auto"><br>
  </div>
  <div>
    <label for="price">金額</label>
    <input type="text" name="price" value="<?php echo h($edit['sale_price']); ?>">
  </div>
  <div>
    <label for="quantity">在庫</label>
    <input type="number" name="quantity" value="<?php echo h($edit['quantity']); ?>">
  </div>
  <div>
    <label for="discription">説明</label>
    <textarea id="text" name="discription" >
      <?php echo h($edit['discription']);?>
    </textarea>
  </div>
  <input type="hidden" name="item_id" value="<?php echo h($edit['item_id']); ?>">
  <input type="hidden" name="token" value="<?php echo h($token); ?>">
  <button type="submit" name="submit">確認</button>
  <?php if ($edit['delete_flag'] === 0): ?>
    <button type="submit" name="stop">出品停止</button>
  <?php else: ?>
    <button type="submit" name="return">出品再開</button>
  <?php endif;?>
</form>
<a class="btn_cancel" href="exhibit_history.php">キャンセル</a>
</body>
</html>