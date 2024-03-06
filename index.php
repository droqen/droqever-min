<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='' xml:lang=''>

<head>
	<meta charset='utf-8' />
	<meta name='viewport' content='width=device-width, user-scalable=no' />
	<title>#droqEVER</title>
	<style type='text/css'>
		body {
			touch-action: none;
			margin: 0;
			border: 0 none;
			padding: 0;
			text-align: center;
			background-color: black;
		}

		#canvas {
			display: block;
			margin: 0;
			color: white;
		}

		#canvas:focus {
			outline: none;
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
	?>
	<script type='text/javascript'>
		GODOT_ENGINE_CONFIG = {
			"basePath": "/g3/index.wasm",
			"args": [], "canvasResizePolicy": 2, "experimentalVK": false, "focusCanvas": true, "gdnativeLibs": [],
			"executable": "/games/<?php echo $gamename ?>",
			"mainPack": "/games/<?php echo $gamename ?>.pck",
			"fileSizes": { "/games/<?php echo $gamename ?>.pck": 45680, "index.wasm": 17865444 },
		};
		console.log(GODOT_ENGINE_CONFIG);
	</script>
	<?php
		if ($gamename) {
			if (file_exists(__DIR__."/games/$gamename.pck")) {
				include 'index-play-body.php';
			} else {
echo "
	<div style='padding:40px; color:white;'>Game not found '<b>$gamename</b>'</div>
";
			}
		} else {
echo "
	<div style='padding:40px; color:white;'>Try adding <b>?game=test</b> to the end of the url!</div>
";
		}
	?>
</body>

</html>