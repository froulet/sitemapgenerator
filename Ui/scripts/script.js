
//On Windows Load
$(window).load(function(){





$index =0;

$('.arrows').on("click", function() {


 $alt=$(this).attr('alt');
                 
                //Zoom or Dezoom
                        if($alt=='left')
            {

               	$index --;
               	if($index < 0 )
				{$index=$(".miniatures").length - 1;}       
				//console.log($index);        
			}
 
                        else
                        {
                $index ++;
                if($index == $(".miniatures").length )
				{$index=0;}
				
                 }

$("#mainpic").attr("src",$(".miniatures").get($index).src);

//console.log($( ".miniatures" ).get(0).src);
})



//Control with keyboard
$(document).keydown(function(e){
    var keyCode = e.keyCode || e.which,
      arrow = {left: 37, up: 38, right: 39, down: 40 };

    switch(e.which) {
    case arrow.left:
    $index --;
    if($index < 0 )
    {$index=$(".miniatures").length - 1;}       
 
    break;

    case arrow.right:
    $index ++;
    if($index == $(".miniatures").length )
    {$index=0;}
    break;
    }

    $("#mainpic").attr("src",$(".miniatures").get($index).src);
    // prevent default action (eg. page moving up/down)
    // but consider accessibility (eg. user may want to use keys to choose a radio button)
    e.preventDefault();
});


// On pic click
$('.miniatures').on("click", function() {

	$("#mainpic").attr("src",$(this)[0].src);
	$index = $( ".miniatures" ).index( this );
	//console.log($index);
});


$('#loupe, #loupe + span').on("click", function() {
$('#loupe').next().toggle('slide');
$('input[name=the_search]').toggle('slide');

})


});

