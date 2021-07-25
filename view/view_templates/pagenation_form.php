<div class="pagenation">
  <ul>
    <!--リンクをつけるかの判定(if)-->
    <?php  if ($now > 1) : ?>
      <li><a href='./<?php echo h($url) ?>'?page_id=<?php echo h($now - 1); ?>'>前へ</a></li>
    <?php else : ?>
      <li>前へ</li>
    <?php endif;?>
    <!--ページネーションを表示(for)-->
    <?php for ( $n = 1; $n <= $max_pages; $n ++) : ?>
      <!--現在選択しているページ番号以外のページにページング用リンクを貼る処理(if)-->
      <?php  if ( $n == $now ) : ?>
        <li><?php echo h($now); ?></li>
      <?php else : ?>
        <li><a href='./<?php echo h($url) ?>?page_id=<?php echo h($n); ?>'><?php echo h($n); ?></a></li>
      <?php endif;?>
    <?php endfor;?>
    <!--リンクをつけるかの判定(if)-->
    <?php  if ($now < $max_pages) : ?>
      <li><a href='./<?php echo h($url) ?>?page_id=<?php echo h($now + 1); ?>'>次へ</a></li>
    <?php else : ?>
      <li>次へ</li>
    <?php endif;?>
  </ul>
</div>