<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='' xml:lang=''>

<?php
	$wasm_file = "index.wasm";
?>

<head>
	<meta charset='utf-8' />
	<meta name='viewport' content='width=device-width, user-scalable=no' />
	<title>#droqEVER</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700" rel="stylesheet">
	<style type='text/css'>
		html { min-height: 100%; overflow: hidden; }

		body {
			/* touch-action: none; */
			margin: 0;
			border: 0 none;
			padding: 0;
			text-align: center;
			background-color: black;
		}

		p {
			font-family: "Josefin Sans", sans-serif;
			font-weight: 300;
			font-style: normal;
			color: white;
			font-size: smaller;
			text-align: left;
		}

		a {
			color: #fff;
			font-weight: 600;
		}
		a:visited {
			color: #aaa;
		}
		a:hover {
			color: #f0f;
		}

		<?php
			$xoff = rand(20,40);
			$yoff = rand(10,30);
			$rotx = rand(50,100)*0.01;
			$roty = rand(50,100)*0.01;
			$rotz = rand(50,100)*0.01;
			if (rand(0,1)==1) { $rotx *= -1; }
			if (rand(0,1)==1) { $roty *= -1; }
			if (rand(0,1)==1) { $rotz *= -1; }
			if (rand(0,1)==1) { $rotz *= -1; }
			if (rand(0,3) <3) { $yoff *= -1; }
			$xoffvw = $xoff . "vw";
			$yoffvh = $yoff . "vh";
			$degoff = rand(40,50) . "deg";
			$deghov = rand(20,30) . "deg";
		?>

		#canvas {
			display: block;
			margin: 0;
			color: white;
			cursor: pointer;
			/* filter: blur(2px) opacity(0.65);
			transition: filter 1s ease-out; */
			transition: transform 0.25s ease;
			transform: <?php echo "translate3d($xoffvw, $yoffvh, 0) rotate3d($rotx,$roty,$rotz,$degoff)"?>;
			/* transform: translate3d(25vw, -15vh, 0) rotate3d(1, 1, 1, 45deg); */
		}
		
		#canvas:hover:not(:focus) {
			/* filter: blur(2px) opacity(0.65) brightness(1.1);
			transition: filter 0.1s ease; */
			transform: <?php echo "translate3d($xoffvw, $yoffvh, 0) rotate3d($rotx,$roty,$rotz,$deghov)"?>;
			/* transform: translate3d(25vw, -15vh, 0) rotate3d(1, 1, 1, 25deg); */
		}

		#canvas:focus {
			outline: none;
			cursor: default;
			/* filter: none;
			transition: filter 0.35s ease-out; */
			transform: none;
		}

		.godot {
			font-family: 'Noto Sans', 'Droid Sans', Arial, sans-serif;
			color: #e0e0e0;
			background-color: #3b3943;
			background-image: linear-gradient(to bottom, #403e48, #35333c);
			border: 1px solid #45434e;
			box-shadow: 0 0 1px 1px #2f2d35;
		}


		/* Status display
		 * ============== */

		#status {
			position: absolute;
			left: 0;
			top: 0;
			right: 0;
			bottom: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			/* don't consume click events - make children visible explicitly */
			visibility: hidden;
		}

		#status-progress {
			width: 366px;
			height: 7px;
			background-color: #38363A;
			border: 1px solid #444246;
			padding: 1px;
			box-shadow: 0 0 2px 1px #1B1C22;
			border-radius: 2px;
			visibility: visible;
		}

		@media only screen and (orientation:portrait) {
			#status-progress {
				width: 61.8%;
			}
		}

		#status-progress-inner {
			height: 100%;
			width: 0;
			box-sizing: border-box;
			transition: width 0.5s linear;
			background-color: #202020;
			border: 1px solid #222223;
			box-shadow: 0 0 1px 1px #27282E;
			border-radius: 3px;
		}

		#status-indeterminate {
			height: 42px;
			visibility: visible;
			position: relative;
		}

		#status-indeterminate>div {
			width: 4.5px;
			height: 0;
			border-style: solid;
			border-width: 9px 3px 0 3px;
			border-color: #2b2b2b transparent transparent transparent;
			transform-origin: center 21px;
			position: absolute;
		}

		#status-indeterminate>div:nth-child(1) {
			transform: rotate(22.5deg);
		}

		#status-indeterminate>div:nth-child(2) {
			transform: rotate(67.5deg);
		}

		#status-indeterminate>div:nth-child(3) {
			transform: rotate(112.5deg);
		}

		#status-indeterminate>div:nth-child(4) {
			transform: rotate(157.5deg);
		}

		#status-indeterminate>div:nth-child(5) {
			transform: rotate(202.5deg);
		}

		#status-indeterminate>div:nth-child(6) {
			transform: rotate(247.5deg);
		}

		#status-indeterminate>div:nth-child(7) {
			transform: rotate(292.5deg);
		}

		#status-indeterminate>div:nth-child(8) {
			transform: rotate(337.5deg);
		}

		#status-notice {
			margin: 0 100px;
			line-height: 1.3;
			visibility: visible;
			padding: 4px 6px;
			visibility: visible;
		}
	</style>
	<link id='-gd-engine-icon' rel='icon' type='image/png' href='g3/index.icon.png' />
	<link rel='apple-touch-icon' href='g3/index.apple-touch-icon.png' />

</head>

<body>
	<?php
		$gamename = $_GET['game'];
		include "game-list.php";
	?>
	<script type='text/javascript'>
		GODOT_ENGINE_CONFIG = {
			"basePath": "/g3/<?php echo $wasm_file ?>",
			"args": [], "canvasResizePolicy": 0, "experimentalVK": false, "focusCanvas": true, "gdnativeLibs": [],
			"executable": "/games/<?php echo $gamename ?>",
			"mainPack": "/games/<?php echo $gamename ?>.zip",
			"fileSizes": { "/games/<?php echo $gamename ?>.zip": 45680, "<?php echo $wasm_file ?>": 17865444 },
		};
		console.log(GODOT_ENGINE_CONFIG);
	</script>
	<?php
		if ($gamename) {
			if (file_exists(__DIR__."/games/$gamename.zip")) {
				include 'index-play-body.php';
			} else {
// echo "
// 	<p>Game not found '<b>$gamename</b>'</p>
// ";
			}
		} else {
// echo "
// 	<p>Try adding <b>?game=test</b> to the end of the url!</p>
// ";
		}
	?>
</body>

</html>