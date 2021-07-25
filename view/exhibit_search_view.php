<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ecサイト</title>
</head>
<body>
<header>
  <h1>アーティスト検索ページ</h1>
</header>
<form method="post" action="singer_register.php">
  <input type="hidden" name="token" value="<?php echo h($token); ?>">
  <p><input type="submit" name="register" value="アーティスト登録"></p>
</form>
<form method="post" action="exhibit_search.php">
  <label for="singer">アーティスト名</label>
  <?php include './view/view_templates/search_form.php'; ?>  
</form>
<form method="post" action="exhibit_confirm.php">
  <div>
    <?php foreach ($singer_select as $select) :?>
      <p><input type="radio" name="search_singer" value="<?php echo h($select['singer_id']); ?>"><a href="singer_info.php?singer_id=<?php echo h($select['singer_id']); ?>"><?php echo h($select['singer_name']); ?></a></p>
    <?php endforeach;?>
    <?php if (empty($singer_select)) :?>
      <p>再検索してください</p>
    <?php endif;?>
  </div>
  <input type="hidden" name="token" value="<?php echo h($token); ?>">
  <p><input type="submit" name="get_search" value="確定"></p>
  <p><input type="submit" name="back_search" value="キャンセル"></p>
</form>
</body>
</html>