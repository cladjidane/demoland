<div id="container">
	
	<article class="cadre-intro">
		<header>
			<h3>File API</h3>
			<h4>Qu'est-ce que c'est ? </h4>
		</header>
		<p>File API comme son nom l'indique est une API javascript porté par HTML5 qui permet la manipulation de fichier côté client avant même d'être envoyé sur le server.</p>
		<p>Oui vous avez bien entendu. Il est possible via un navigateur de manipuler vos fichiers ... mais pas d'inquiètude, il n'est possible de manipuler les fichiers qu'une fois ceux-ci "stocker" dans le navigateur via une champ de type input file.</p>
		<p>Nous allons voir dans les différentes démos de ce site les possiblité d'offre cette API.</p>
		<p>Tout d'abord nous allons simplement afficher une miniature des fichiers images que l'on souhaite uploader sur le serveur. Nous ajouterons les infos : nom du fichier, poids du fichier ainsi qu'une alerte si le poids dépasse le poids autorisé pour l'upload ainsi qu'une alerte si le nom du fichier contient des caractères particulier.</p>
		<p>Dans un second temps nous allons corriger directement depuis le navigateur le poids d'une image et/ou son nom avant de l'uploder sur le serveur.</p>
		<p>Nous allons ensuite exploiter les données exif d'une photo, afficher toutes les infos disponibles des métadonnées et afficher sur une google map une info bulle ou à été pris le cliché avec la miniature de la photo et son nom.</p>
		<p>Nous ferons également de la manipulation d'image, afin de "cropper" une partie d'une image et de n'envoyer que cette partie sur le serveur.</p>
		<p>Puis pour finir, nous allons créer un "poster" de plusieurs photos, les aggrandir, les reduites, ajouter un effet polaroïde, les tourner ... bref, plein de chose.</p>
		<p>Vous pourrez le constater, File API est tout simplement une avancée majeur dans la manipulation d'image via votre navigateur. N'hesitez pas à vous rendre sur le blog pour commenter ou discuter des possiblités de File API</p> 
	
		<h4>Ressources </h4>
		
		<p>Les specs W3C : http://www.w3.org/TR/2010/WD-FileAPI-20101026/</p>
		<p>La doc de Mozilla : https://developer.mozilla.org/fr/docs</p>
		<p>Explications des différentes composantes de CANVAS : http://diveintohtml5.org/canvas.html</p>
		<p>Démo avec File API sur le site de Mozilla : http://hacks.mozilla.org/category/fileapi/</p>
	
	</article>
	
</div>