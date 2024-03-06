<canvas id='canvas'>
	HTML5 canvas appears to be unsupported in the current browser.<br />
	Please try updating or use a different browser.
</canvas>
<div id='status'>
	<div id='status-progress' style='display: none;' oncontextmenu='event.preventDefault();'>
		<div id='status-progress-inner'></div>
	</div>
	<div id='status-indeterminate' style='display: none;' oncontextmenu='event.preventDefault();'>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div id='status-notice' class='godot' style='display: none;'></div>
</div>

<script defer type='text/javascript' src='g3/index.js'></script>
<script defer type='text/javascript' src='g3/run-engine-when-available.js'></script>