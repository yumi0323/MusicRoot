<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>MusicRoot</title>
  <link rel="stylesheet" href="./css/cart.css">
</head>
<body>
<header>
  <h1>カート</h1>
</header>
<ul>
  <?php echo $error; ?>
</ul>
<table class="cart-table">
  <thead>
    <tr>
      <th>商品名</th>
      <th>画像</th>
      <th>価格</th>
      <th>個数</th>
      <th>小計</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cart_list as $cart): ?>
      <tr>
        <td label="商品名："><?php echo h($cart['item_name']); ?></td>
        <td label="画像：" class="text-center"><img src="./images/<?php echo h($cart['item_image']); ?>" width="110" height="100"></td>
        <td label="価格：" class="text-right">¥<?php echo h($cart['cart_price']); ?></td>
        <td label="個数：" class="text-right">
        <form action="cart.php" method="post">
          <input type="number" name="change_quantity" value="<?php echo h($cart['quantity']); ?>">
          <input type="hidden" name="order_id" value="<?php echo h($cart['order_id']); ?>">
          <input type="hidden" name="token" value="<?php echo h($token); ?>">
          <button type="submit" name="change" class="btn btn-red">変更</button>
        </form>
        </td>
        <td label="小計：" class="text-right">¥<?php echo h($cart['cart_price'])*h($cart['quantity']); ?></td>
        <td>
        <form action="cart.php" method="post">
          <input type="hidden" name="order_id" value="<?php echo h($cart['order_id']); ?>">
          <input type="hidden" name="token" value="<?php echo h($token); ?>">
          <button type="submit" name="delete" class="btn btn-red">削除</button>
        </form>
        </td>
      </tr>
    <?php endforeach; ?>
    <tr class="total">
      <th colspan="3">合計</th>
      <td colspan="2">¥<?php echo h($total_price); ?></td>
    </tr>
  </tbody>
</table>
<div class="cart-btn">
  <form action="purchase.php" method="post">
    <?php if (empty($error)) : ?>
      <input type="hidden" name="token" value="<?php echo h($token); ?>">
      <button type="submit" name="purchase" class="btn btn-blue">購入</button>
    <?php  endif;?>
    <button type="submit" name="contenue" class="btn btn-gray">お買い物を続ける</button>
  </form>
</div>
</body>
</html>
