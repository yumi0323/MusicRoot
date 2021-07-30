<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ecサイト</title>
	<link rel="stylesheet" href="./css/info.css">
</head>
<body>
<header>
	<h1>出品確認ページ</h1>
</header>
<?php if (!empty($errors)): ?>
	<div class="error_msg">
		<ul>
			<?php foreach ($errors as $error): ?>
				<li><?php echo h($error); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
<!--error-->
<?php if (isset($_POST['get_search']) || isset($_POST['back_search'])): ?>
	<div class="error_msg">
	<ul>
		<?php foreach ($_SESSION['errors'] as $error): ?>
			<li><?php echo h($error); ?></li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
<div class="wrapper">
	<div class="contents-box">
		<?php if ($item_image): ?>
			<p><img src="<?php echo h($dir.$item_image); ?>"></p>
		<?php else: ?>
			<p>画像はありません未登録です</p>
		<?php endif; ?>
	</div><!--content-boxの終わり-->
	<div class="main">
		<h2><span class="border">名前</span></h2>
			<p><?php echo h($item_name); ?></p>
		<h2><span class="border">金額</span></h2>
			<p><?php echo h($sale_price); ?></p>
		<h2><span class="border">個数</span></h2>
			<p><?php echo h($quantity); ?></p>
		<h2><span class="border">ジャンル</span></h2>
			<p><?php echo h($category_name); ?></p>
		<h2><span class="border">説明</span></h2>
			<p><?php echo h($discription); ?></p>
		<form method="post" action="exhibit_search.php">
			<input type="hidden" name="token" value="<?php echo h($token); ?>">
			<input type="submit" name="btn_back" value="アーティスト検索">
		</form>
<form method="post" action="exhibit.php">
		<p><?php echo h($warning); ?></p>
		<h2><span class="border">アーティスト名</span></h2>
			<p><?php echo $singer; ?></p>
			<p><?php echo $singer_search; ?></p>
		<input type="hidden" name="token" value="<?php echo h($token); ?>">
	</div><!--mainの終わり-->
</div><!--wrapperの終わり-->
	<?php if (empty($errors) && empty($_SESSION['errors'])) : ?>
		<input type="submit" name="btn_confirm" value="出品する">
	<?php endif; ?>
  <input type="submit" name="btn_back" value="戻る">
	<input type="hidden" name="name" value="<?php echo h($item_name); ?>">
	<input type="hidden" name="price" value="<?php echo h($sale_price); ?>">
	<input type="hidden" name="quantity" value="<?php echo h($quantity); ?>">
	<input type="hidden" name="category" value="<?php echo h($category_name); ?>">
	<input type="hidden" name="image" value="<?php echo h($item_image); ?>">
	<input type="hidden" name="discription" value="<?php echo h($discription); ?>">
</form>
</body>
</html>

