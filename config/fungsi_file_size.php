<?php
function fsize($file) {
	$a = array("B","KB","MB","GB","TB","PB");
	$pos = 0;
	$size = filesize($file);
	while ($size >= 1024) {
		$size /= 1024;
		$pos++;
	}
	return round ($size,2)." ".$a[$pos];
}
?>
