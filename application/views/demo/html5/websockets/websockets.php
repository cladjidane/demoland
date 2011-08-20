<div id="container">

	<header id="header" class="cadre">
		<h3>Web temps réel</h3>
	</header>	
	
	<article id="article" class="cadre">
		<div id="status">

		</div>
		<div id="stock">

		</div>
		<canvas id="myCanvas" width="400" height="400" style="border:1px dotted;float:left">your browser does 
		not support the canvas tag </canvas>
		<button onclick="startSocket();">Click Me!</button>
	</article>
	
	<aside id="aside" class="cadre">
		<h3>...</h3>      
	</aside>
	
</div>



<script type="text/javascript" charset="utf-8">
	function startSocket()
	{
		if("WebSocket" in window)
		{
			var ws = new WebSocket("ws://localhost:1740");

			ws.onopen = function(event) {
				document.getElementById('status').innerHTML = "open: " + this.readyState;
				drawCanvas();
			}

			ws.onmessage = function(event) {
				document.getElementById('stock').innerHTML = event.data;
				drawIncrement(event.data);
			}
			
			ws.onclose = function(event) {
				document.getElementById('status').innerHTML = "closed";
			}			
		}
		
	}
	

</script>
<script type="text/javascript">
function drawCanvas()
{
	counter = 15;
	
	canvas = document.getElementById('myCanvas');
	ctx = canvas.getContext('2d');
	ctx.strokeStyle = "#efefef";
	ctx.textBaseline = 'middle';
	for(var i = 0; i< 400; i+=10)
	{
		ctx.fillText  (((400-i)/10).toString(), 0, i)
		ctx.beginPath();
		ctx.moveTo(counter,i);
		ctx.lineTo(400,i);
		ctx.closePath();
		ctx.stroke();
	}
}

function drawLines()
{

}

function drawIncrement(quote)
{
	ctx.beginPath();
	ctx.arc(counter, canvas.height-(quote*10), 2, 0, Math.PI*2, true); 
	ctx.closePath();
	ctx.fill();
		
	counter = counter + 5;
		
}
</script>
