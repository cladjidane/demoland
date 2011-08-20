<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Finistère Affaire</title>
	<style type="text/css" media="screen">


		img.bg {
			/* Set rules to fill background */
			min-height: 100%;
			min-width: 1024px;

			/* Set up proportionate scaling */
			width: 100%;
			height: auto;

			/* Set up positioning */
			position: fixed;
			top: 0;
			left: 0;
		}

		@media screen and (max-width: 1024px){
			img.bg {
				left: 50%;
				margin-left: -512px; }
		}

		div#content {
			position: relative;
            width: 960px;
            margin: 0 auto;
		}

		body {
			/* These rules have no effect on the functionality */
			/* They are for styling only */
			margin: 0;
			padding: 20px 0 0 0;
		}
		
		.active {
			display: block;
		}
		
		.inactive {
			display: none;
		}
		
		/* ------ */
		#logo {
			position: absolute;
			top: 0px;
			left: 0px;
			width: 218px;
			height: 205px;
			z-index: 100:
		}
		#header {
			position: absolute;
			top: 0px;
			left: 50%;
			margin-left: -278px;
			width: 456px;
			height: 70px;
			z-index: 100:
		}
		#menu {
			position: absolute;
			top: 200px;
			left: 0;
			width: 267px;
			height: 523px;
			z-index: 100:
		}
		#baseline, #baseline2 {
			position: absolute;
			top: 200px;
			right: 0;
			width: 845px;
			height: 434px;
			z-index: 100:
		}
		
		#bg2, #baseline2 {
			display: none;
		}
		
		#footer {
			position: absolute;
			bottom: 0;
			left: 50%;
			margin-left: -278px;
			width: 456px;
			height: 58px;
			z-index: 100:
		}
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>
		jQuery(document).ready(function(){
			jQuery('.baseline').click(function (){
				jQuery('#baseline').toggle();
				jQuery('#bg1').toggle();
				jQuery('#baseline2').toggle();
				jQuery('#bg2').toggle();
			});
		});
	</script>
</head>

<body>
<img id="bg1" src="/web/images/demo/sandbox/divers/image-background-relative/bg-1.jpg" class="bg" />
<img id="bg2" src="/web/images/demo/sandbox/divers/image-background-relative/bg-2.jpg" class="bg" />

<img id="logo" src="/web/images/demo/sandbox/divers/image-background-relative/logo.png" />
<img id="header" src="/web/images/demo/sandbox/divers/image-background-relative/header.png" />
<img id="menu" src="/web/images/demo/sandbox/divers/image-background-relative/menu.png" />
<img id="baseline" src="/web/images/demo/sandbox/divers/image-background-relative/baseline.png" class="baseline" />
<img id="baseline2" src="/web/images/demo/sandbox/divers/image-background-relative/baseline2.png" class="baseline" />
<img id="footer" src="/web/images/demo/sandbox/divers/image-background-relative/footer.png" />
</body>

</html>