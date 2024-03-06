<?php

$game_name = $_GET['game'];
$game_path = __DIR__ . "/games/$game_name.pck";
if (file_exists($game_path)) {
	include 'play/01-web-debug-first.php';
} elseif ($game_name) {
	echo "No game '$game_name'";
} else {
	echo "Welcome to website. To begin. add ?game=wtb to the url";
}