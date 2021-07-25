<?php
foreach ($lists as $list) {
	if ($list === $post_value) {
		// POST データが存在する場合
		$lists .= "<option value='" . $list . "' selected>" . $list . "</option>";
	} else {
	// POST データが存在しない場合
	$lists .= "<option value='" . $list . "'>" . $list . "</option>";
	}
}
?>