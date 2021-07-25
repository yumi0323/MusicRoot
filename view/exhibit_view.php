<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ecサイト</title>
</head>
<body>
<header>
  <h1>出品ページ</h1>
</header>
<form method="post" action="exhibit_confirm.php" enctype="multipart/form-data">
  <?php if (!empty($errors)): ?>
    <ul class="error_msg">
      <?php foreach ($errors as $error): ?>
        <li><?php echo h($error); ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <div>
    <label for="name">名前</label>
    <input type="text" name="name" value="<?php if (!empty($item_name)){ echo h($item_name); } ?>">
  </div>
  <div>
    <label for="price">金額</label>
    <input type="text" name="price" value="<?php if (!empty($sale_price)){ echo h($sale_price); } ?>">
  </div>
  <div>
    <label for="quantity">個数</label>
    <input type="number" name="quantity" value="<?php if (!empty($quantity)){ echo h($quantity); } ?>">
  </div>
  <div>
    <label for="category">ジャンル</label>
    <select name="category">
      <?php echo $lists;?>
    </select>
  </div>
  <div>
    <label for="singer">アーティスト名</label>
    <input type="text" name="singer" value="<?php if (!empty($singer_id)){ echo h($singer_name); } ?>">
  </div>
  <div>
    <p>アップロード画像</p>
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>">
    <input type="file" name="image">
    <p>※画像(300MB以上)はアップロードできません</p>
    <p>画像を選択し直してください</p>
  </div>
  <div>
    <label for="discription">説明</label>
    <textarea id="text" name="discription" >
      <?php if (!empty($discription)){ echo h($discription); } ?>
    </textarea>
  </div>
  <input type="hidden" name="token" value="<?php echo h($token); ?>">
  <p><input type="submit" name="submit" value="確認"></p>
</form>
<a class="btn_cancel" href="top.php">キャンセル</a>
</body>
</html>