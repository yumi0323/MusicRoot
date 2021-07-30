<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ecサイト</title>
</head>
<body>
<h1>ようこそ、ログインしてください。</h1>
<div style="color:red;">
  <p><?php echo h($msg); ?></p>
  <?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
      <li><?php echo h($error); ?></li>
    <?php endforeach; ?>
  <?php endif; ?>
</div><br>
<form  action="login.php" method="post">
  <div>
    <label for="email">メールアドレス</label>
    <input type="email" name="email">
  </div>
  <div>
    <label for="pass">パスワード</label>
    <input type="pass" name="pass">
  </div>
  <input type="hidden" name="token" value="<?php echo h($token); ?>">
  <button type="submit" name="submit">ログイン</button><br>
  <button type="submit" name="guest">ゲストログイン</button>
</form>
<h2>または<a href='register.php'>会員登録</a></h2>
<p><a href="top.php">ホーム画面</a></p>
</body>
</html>
