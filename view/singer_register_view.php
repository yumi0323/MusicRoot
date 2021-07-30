<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ecサイト</title>
</head>
<body>
<h1>アーティスト登録</h1>
<?php if (!$insert_singer): ?>
  <?php echo h($msg);?>
  <form method="post" action="singer_register.php" enctype="multipart/form-data">
    <?php if (!empty($errors)): ?>
      <ul class="error_msg">
        <?php foreach ($errors as $error): ?>
          <li><?php echo h($error); ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <div>
      <label for="name">名前</label>
      <input type="text" name="name" value="<?php if (!empty($singer_name)) { echo h($singer_name); } ?>">
    </div>
    <div>
      <label for="activity">状態</label>
      <select name="activity">
        <?php echo $lists;?>
      </select>
    </div>
    </div>
    <div>
      <p>アップロード画像</p>
      <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo h(MAX_FILE_SIZE); ?>">
      <input type="file" name="image">
      <p>※画像(300MB以上)はアップロードできません</p>
      <p><?php echo h($again); ?></p>
    </div>
    <div>
      <label for="discription">説明</label>
      <textarea id="text" name="discription">
        <?php if (!empty($discription)) { echo h($discription); } ?>
      </textarea>
    </div>
    <input type="hidden" name="token" value="<?php echo h($token); ?>">
    <p><input type="submit" name="submit" value="登録"></p>
  </form>
  <form method="post" action="exhibit_search.php">
    <input type="hidden" name="token" value="<?php echo h($token); ?>">
    <p><input type="submit" name="cancel" value="キャンセル"></p>
  </form>
<?php else: ?>
  <p>成功しました</p>
  <form method="post" action="exhibit_search.php">
    <p><input type="submit" name="back_register" value="戻る"></p>
    <input type="hidden" name="token" value="<?php echo h($token); ?>">
  </form>
<?php endif; ?>
</body>
</html>