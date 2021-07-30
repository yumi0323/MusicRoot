<?php
if (empty($_POST['name'])) {
  $errors[] = '名前を入力してください';
}

if ($_FILES['image']['error'] === 2) {
  $errors[] = 'ファイルサイズを小さくしてください';
}

if (empty($_POST['discription'])) {
  $errors[] = '説明を入力してください';
}
?>