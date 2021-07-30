<?php
$temp_file = $_FILES['image']['tmp_name'];
$dir = './images/';

function getImg($temp_file, $dir) {
	if (file_exists($temp_file)) {
		$image = uniqid(mt_rand(), false);
		switch (@exif_imagetype($temp_file)) {
			case IMAGETYPE_GIF:
				$image .= '.gif';
				break;
			case IMAGETYPE_JPEG:
				$image .= '.jpg';
				break;
			case IMAGETYPE_PNG:
				$image .= '.png';
				break;
			default:
				echo '拡張子を変更してください';
		}
		move_uploaded_file($temp_file, $dir . $image);
		return $image;
	}
}

function deleteImg($dir, $d_file) {
	if (file_exists($dir.$d_file)) {
		return unlink($dir.$d_file);
	}
}
?>
