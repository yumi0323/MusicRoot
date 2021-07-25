
      <img src="./images/<?php echo h($item['item_image']); ?>" alt="flexbox">
      <a class="card-description" href="item.php?item_id=<?php echo h($item['item_id']); ?>">

      <h2><?php echo h($item['item_name']); ?></h2>
      </a>
      <p>￥<?php echo h($item['sale_price']); ?></p>
      <form action="cart.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo h($user_id) ?>">
        <input type="hidden" name="item_id" value="<?php echo h($item['item_id']); ?>">
        <input type="hidden" name="price" value="<?php echo h($item['sale_price']); ?>">
        <input type="hidden" name="sub_token" value="<?php echo h($sub_token); ?>">
        <?php if ($_SESSION['user_name']): ?>
          <?php if ($item['quantity'] == 0): ?>
            <div class="wait">
              <p style="color:silver;">入荷をお待ちください</p>
              <p style="color:red;">sold out</p>
            </div>
          <?php  else: ?>
            <p><input type="number" value="1" name="quantity"></p>
            <p style="color:silver;">在庫数：<?php echo h($item['quantity']); ?></p>
            <p><button type="submit" name="get_item" onclick="location.href='cart.php'" class="btn-sm btn-blue">カートに入れる</button></p>
          <?php endif; ?>
        <?php endif; ?>
      </form>
        
        