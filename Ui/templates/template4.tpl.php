    <link type="text/css" media="print" rel="styleSheet" href="Ui/css/image-picker.css" property='stylesheet'/>
    <script type="text/javascript" src="Ui/scripts/image-picker.js"></script>

    <script type="text/javascript">
       
      $(document).ready(function()
      {

        $('#hit').click(function() {
           

          $tags= $('#tags').val();
          //alert('K');

        $key='0c289191803a91d5dfe8987425da6dc0';
        $secret='62706e45d45df9c5';

        $.ajax({
          //url: "http://api.flickr.com/services/feeds/photos_public.gne",
          url: "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=dcf45ca6d177b93f546f4dd936e4cf2f&tags="+$tags+"&format=json&jsoncallback=maFonction",
          data: "format=json",
          jsonp: "jsoncallback",
          dataType: "jsonp",
          success: function(data)
          {
            yolo(data);

          },
           complete: function(data, statut){

                },


                });
              
        });

    function yolo(data){
/*            console.log('AAAA');
            console.log(data.photos.photo[0].server);
            console.log(data.photos.photo[0].id);
            console.log(data.photos.photo[0].secret);
            console.log(data.photos.photo[0].farm);*/
            //console.log(data.photos.photo[0]);
            // $("<img/>").attr("src", $url).appendTo("#images")

          $count = 0;

          $.each(data.photos.photo, function(i,item){
          $count ++;

          $farm = item.farm;
          $server = item.server;
          $id = item.id;
          $secret = item.secret;
          $userid= item.owner;

          $url = "https://farm"+$farm+".staticflickr.com/"+$server+"/"+$id+"_"+$secret+"_z.jpg";
          $url2 = "https://farm"+$farm+".staticflickr.com/"+$server+"/"+$id+"_"+$secret+"_m.jpg";
          $link ="https://www.flickr.com/photos/"+$userid+"/"+$id;
          createInput($url, $url2, $count);
        })
    }


    function createInput($url, $url2, $count)
    {

    //alert($url);

    //$("input").attr({src:$url, value:$count, type: 'checkbox', id:$count, name:$count}).css("background", "url("+$url+") no-repeat").appendTo("#image-picker");

    $('#image-picker').append('<input type="checkbox" value='+$url+'  name="photos[]"/>');

    $('input[value="'+$url+'"').css("background", "url("+$url2+") no-repeat").appendTo("#image-picker");
    }

    });

    </script>



    Recherche de photos Flickr par Tag : <br>
    (Cliquer pour sélectionner)
    <input id='tags' type="text" name="fname">
    
    <input id="hit" type="button" value="Rechercher">
    
    <div id='images' class='listblock panel'>

           <div id='image-picker'>
           </div>
    </div>
