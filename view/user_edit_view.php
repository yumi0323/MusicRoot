<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>MusicRoot</title>
</head>
<body>
<h1>出品編集ページ</h1>
  <p><?php echo h($error); ?></p>
<form method="post" action="user_edit.php" enctype="multipart/form-data">
  <div>
    <label for="image">画像</label>
    <p><img src="./images/<?php echo h($user['user_image']); ?>" width="300" height="300"></p>
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo h(MAX_FILE_SIZE); ?>">
    <input type="file" name="image">
    <p>※画像(300MB以上)はアップロードできません</p>
  </div>
  <div>
    <label for="user_name">名前</label>
    <input type="text" name="user_name" value="<?php echo h($user['user_name']); ?>">
  </div>
  <div>
    <label for="introduction">紹介文</label>
    <textarea id="text" name="introduction" >
    <?php echo h($user['introduction']);?>
    </textarea>
  </div>
  <input type="hidden" name="user_id" value="<?php echo h($user['user_id']); ?>">
  <p><input type="submit" name="submit" value="確認"></p>
  <input type="hidden" name="token" value="<?php echo h($token);?>">
</form>
<a class="btn_cancel" href="user.php?user_id=<?php echo h($user_id); ?>">キャンセル</a>
</body>
</html>