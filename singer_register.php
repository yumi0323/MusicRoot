<?php
session_start();
require_once('./model/image_function.php');
require_once('./model/singer_function.php');
require_once('./model/common_function.php');

include './model/model_templates/no_login.php';

$msg = null;
$errors = null;

$lists = ACTIVITY_LIST;
$post_value = $_POST['activity'];
include './model/model_templates/list.php';

$token = $_POST['token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['submit'])) {
		$singer_name = get_post('name');
		$activity = get_post('activity');
		$discription = get_post('discription');
		
		$errors = array();
		include './model/model_templates/error.php';

		if (empty($errors)) {
			$dbh = getDbh();
			$repiting = check_singer_name($dbh, $singer_name);
			if ($repiting['singer_name'] === $singer_name) {
				$msg = '同じ名前が存在します。';
			} else {
				//画像のアップロード
				if (!empty($temp_file)) {
					if (is_uploaded_file($temp_file)) {
						//乱数で保存
						$singer_image = getImg($temp_file, $dir);
					}
				} else {
					$singer_image = '190244106260b4e74b10828.png';
				}
				$insert_singer = insert_singer($dbh, $singer_name, $activity, $discription, $singer_image);
			}
		}
	}
}

include_once './view/singer_register_view.php';
?>