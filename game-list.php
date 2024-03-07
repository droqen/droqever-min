<p id='gamelist' style='position:fixed; left: 10px; top: 10px;'>
<?php
	function str_ends_with($val, $str) {
		if(mb_substr($val, -mb_strlen($str), mb_strlen($str)) == $str) {
			return true;
		} else {
			return false;
		}
	}
	foreach (scandir(__DIR__.'/games') as $filename) {
		if (str_ends_with($filename, ".zip")) {
			$game = substr($filename, 0, strrpos($filename, "."));
			echo "* <a href='?game=$game'>$game</a><br/>";
		}
	}
?>
</p>