<p id='gamedesc' style='position:fixed; left:10px; bottom:10px;'>
	loading game...
</p>
<canvas id='canvas'>
	HTML5 canvas appears to be unsupported in the current browser.<br />
	Please try updating or use a different browser.
</canvas>
<div id='gamegoeshere' style='border: 4px dashed #333; padding:0; margin:0; border-radius:10px; z-index: -1; display:none;'>
	<!-- <p style="text-align:center; width:100%; font-size: large; font-weight: 600; color: #666;">game<br/>goes<br/>here</p> -->
</div>
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

<script type='text/javascript'>
	function setGameDesc(desc) {
		document.getElementById('gamedesc').innerText = desc;
	}
</script>
<script type='text/javascript' src='g3/autoresizecanvas.js'></script>
<script type='text/javascript' src='g3/removedebugfromtitle.js'></script>
<script defer type='text/javascript' src='g3/index.js'></script>
<script defer type='text/javascript' src='g3/run-engine-when-available.js'></script>