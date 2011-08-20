<style>
	/* CSS Dédié à FILE API */

	#fileSelect {
		padding: 3px;
		background: white;
	}

	#fileElem {
		position: absolute;
		top: 0;
		left: 0;
	}

	#edit {
		color: red;
		font-weight: bold;
		cursor: pointer;
		text-decoration: underline;
	}

	#valid {
		color: green;
		font-weight: bold;
		cursor: pointer;
		text-decoration: underline;
	}

	/* CANVAS */
	#zone-edit {
		position: relative;
	}
	
	#fileList {
		margin: 0;
		padding: 0;
		list-style: none;
	}
	
	#fileList li {
		overflow: auto;
		padding: 10px;
		background: white;
	}
	
	#fileList li img {
		width: 150px; 
		float: left;
		margin-right: 5px;
	}
	
	.red {
		color: red;
	}
	
	.green {
		color: green;
	}
</style>

<div id="container">

	<header id="header" class="cadre">
		<h3>Modifier une image</h3>
		<h4>Avant l'upload sur le serveur</h4>
	</header>	
	
	<article id="article" class="cadre">
		<canvas id="zone-edit"></canvas> 
	</article>
	
	<aside id="aside" class="cadre">
		<h3>Espace de sélection</h3>            
        <input size="13" type="file" id="fileElem"  multiple accept="image/*" style="visibility: hidden;">
        <a href="#" id="fileSelect">Fichier</a>
        <ul id="fileList" style="display: none;"></ul>
	</aside>
	
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="/web/js/libs/base64.js"></script> 
<script src="/web/js/libs/canvas2image.js"></script> 

<script>

$(function(){
	    
    window.URL = window.URL || window.webkitURL;    
    
    $('#fileSelect').click(function(e) {
        e.preventDefault();        
        $('#fileElem').trigger('click');
    });
    
    $('#fileElem').change(function() {
        var _this = $(this);
        var nli = $('#fileList li').length;
        
        // Nous sommes obligé de passer via l'API DOM de base sinon on ne récupère pas l'objet la propriété files
        var file = document.getElementById("fileElem").files[0];
		
		// On crée l'image pour l'afficher en prévi		
		var img = new Image();
		img.src = window.URL.createObjectURL(file);
		img.id = 'img-' + nli;
		
		img.onload = function() {       			
			// On renseigne info
			var info = $("<div />");
			  
			var infoName = '<p><strong>Nom : </strong><br />' +  file.name + '</p>';
			var infoSize = '<p><strong>Poids : </strong><br />' + file.size + '</p>';
			var infoXy = '<p><strong>Taille : </strong><br />';
			
			// Si la taille est plus grande que 600px de large, on le signale et on rend l'image modifiable
			if(img.naturalWidth > 800) {
				var infoXy = infoXy + '<span class="red"> Originale : ' + img.naturalWidth + 'x' + img.naturalHeight + '</span><br />';
				var infoXy = infoXy + '<span class="green"> Optimisée : 800x600</span></p>';
				var infoXy = infoXy + '<p id="edit" class="' + nli + '">CORRIGER</p>';	
			}	else {
				var infoXy = infoXy + '<span class="green">' + img.naturalWidth + 'x' + img.naturalHeight + '</span></p>';
			}	
		
			// Pour l'affichage de base des infos
			var li = $('<li/>');
			li.append(img);
			
			// Création des noeuds
			info.append(infoName, infoSize, infoXy); 
			li.append(info);
			
			// Création de liste
			$('#fileList').show().append(li);	
		}
        
    });
	
	// Si on edit une image
	$('#edit').live('click', function(e){	
		
		$target = $(e.target);		
		$ze = $('#zone-edit');
		var img_source = $('#img-' + $target.attr('class'));
		
		// Pour test avec clone jquery ... pas concluant
		//var img_clone = img_source.clone();
		
		var img = new Image();
		img.src = img_source.attr('src');
		img.onload = function(){
			// On réajuste la taille maxi de visu si largeur de l'image 
			// source est plus grande que 500px			
			if(img.width > 500) {				
				// création de l'image dans le canvas
				resizeImage(document.getElementById('zone-edit'), img, 700, 933);
		
				console.log(document.getElementById('zone-edit').toDataURL("image/jpg"));
			}
		}
		
		// On réajuste le bouton pour proposer d'appliquer le changement
		$target.attr('id', 'valid').html('VALIDER');
		  
	});
	
	// Valider le smodif d'une image
	$('#valid').live('click', function(e){	
		
		$target = $(e.target);	

		alert('On envoie sur le serveur, demo à venir ...');
		
		//
		//if (!file || !file.type.match(/image.*/)) return;
		/*
		document.body.className = "uploading";
 
		var fd = new FormData(); // I wrote about it: https://hacks.mozilla.org/2011/01/how-to-develop-a-html5-image-uploader/
		fd.append("image", file); // Append the file
		fd.append("key", "6528448c258cff474ca9701c5bab6927"); // Get your own key http://api.imgur.com/
		var xhr = new XMLHttpRequest(); // Create the XHR (Cross-Domain XHR FTW!!!) Thank you sooooo much imgur.com
		xhr.open("POST", "http://api.imgur.com/2/upload.json"); // Boooom!
		xhr.onload = function() {
			// Big win!
			document.querySelector("#link").href = JSON.parse(xhr.responseText).upload.links.imgur_page;
			document.body.className = "uploaded";
		}
		xhr.send(fd);
		*/
	});
	
	// Utiles et création du canvas
	resizeImage = function(canvas, img, w, h) {
		var MAX_WIDTH = w;
		var MAX_HEIGHT = h;
		var width = img.width;
		var height = img.height;

		if (width > height) {
			if (width > MAX_WIDTH) {
				height *= MAX_WIDTH / width;
				width = MAX_WIDTH;
			}
		} else {
			if (height > MAX_HEIGHT) {
				width *= MAX_HEIGHT / height;
				height = MAX_HEIGHT;
			}
		}
		
		canvas.width = width;
		canvas.height = height;
		
		console.log(width);
		
		var ctx = canvas.getContext("2d");
		ctx.drawImage(img, 0, 0, width, height);
	}
	

	
});

</script>