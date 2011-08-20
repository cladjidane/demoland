<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	
	<title>DEMOLAND, HTML5, CSS3 et les nouvelles technos du web</title>
	<link rel="stylesheet" href="/web/css/demo.css" />
	
	<!-- Styles -->
	<?php foreach( $styles as $style ) : ?>
	<link rel="stylesheet" href="/web/css/<?=$style;?>" />
	<?php endforeach;?>
	
</head>
<body class="body">

	<div id="toolbar">
		<a href="/"><img src="/web/images/logo-icon.png" /></a>
		<ul>
			<?php if(!empty($toolBar)) : ?>
				<?php foreach( $toolBar as $link) : ?>
					<li><a href="<?php echo $link->src; ?>"><?php echo $link->title; ?></a></li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>