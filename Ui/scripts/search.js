
//On Windows Load
$(window).load(function(){


$('#loupe, #loupe + span').on("click", function() {
$('#loupe').next().toggle('slide');
$('input[name=the_search]').toggle('slide');

})


});

