<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>MusicRoot</title>
</head>
<body>
<h1>初めての方はこちら</h1>
<form action="register.php" method="post">
  <div>
    <label for="name">名前</label>
    <input type="text" name="name">
  </div>
  <div>
    <label for="email">メールアドレス</label>
    <input type="email" name="email">
  </div>
  <div>
    <label for="pass">パスワード</label>
    <input type="pass" name="pass" minlength="8">
  </div>
  <input type="hidden" name="token" value="<?php echo h($token); ?>">
  <button type="submit" name="submit">新規登録</button>
</form>
<p>※ パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
<?php if (!empty($errors)): ?>
  <?php foreach ($errors as $error): ?>
    <li><?php echo h($error); ?></li>
  <?php endforeach; ?>
<?php endif; ?>
<?php echo h($msg); ?>
<a href="login.php">ログインページ</a>
<p><a href="top.php">ホーム画面</a></p>
</body>
</html>