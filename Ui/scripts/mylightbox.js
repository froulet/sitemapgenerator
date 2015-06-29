
jQuery(document).ready(function($) {
	
	$('#mainpic').click(function(e) {
		
		
		//Get clicked link href
		var image_href = $(this).attr("src");
		
		/* 	
		Si la structure de la lightbox exsite déjà dans le document,
		change the img src to to match the href of whatever link was clicked
		
		Si la structure de la lightbox n'exuste pas,
		on la crée et on l'insert par la suite (cela n'aura lieu que la première fois)
		*/
		
		if ($('#lightbox').length > 0) { // #lightbox existe
			
			//On place une image avec la bonne source
			$('#content').html('<img src="' + image_href + '" />');
		   	
			//Fait apparaître la fenêtre de la lightbox - you could use .show('fast') for a transition
			$('#lightbox').show('slow');
		}
		
		else { //#lightbox n'existe pas, on la crée et on l'insert (la première fois seulement)
			
			//On crée une structure HTML pour la lightbox
			var lightbox = 
			'<div id="lightbox">' +
				'<p>Click to close</p>' +
				'<div id="content">' + //On insère l'image avec la bonne source
					'<img src="' + image_href +'" />' +
				'</div>' +	
			'</div>';
				
			//On instère la lightbox dans notre body
			$('body').append(lightbox);
		}
		
	});

	$('body').on('click', '#lightbox', function() {
		$('#lightbox').hide('slow');
    });

});
