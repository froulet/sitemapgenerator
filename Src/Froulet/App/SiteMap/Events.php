<?php

namespace Froulet\App\Articles;

use Froulet\Utils\Curl;

class Events
{


    public function __construct()
    {
    }


    public function localise()
    {
        $html = '
            <p id="demo"></p>

            <script>
            var x = document.getElementById("demo");

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
            window.location.replace("index.php?p=localevents&lat="+
                position.coords.latitude+"&long="+position.coords.longitude+"");
            }

            getLocation();
            showPosition();

            </script>';

        return $html;
    }


    public function getLocalEvents($lat, $long)
    {
        $linkflux = "http://ws.audioscrobbler.com/2.0/?method=geo.getevents&api_key=b2e87208d07a2f5935dea3d3933e924c&lat=$lat&long=$long";
        
        $data = Curl::usecurl($linkflux);

        /* Création du parseur */
        $sx = simplexml_load_string($data);

        $c='<div class="row">
        <div class="large-12 columns">
        ';

        foreach ($sx->events->event as $item) {
            $title = $item->title;
            $url = $item->url;
            $venue = $item->venue->name;
            $date = $item->startDate;
            $street = $item->venue->location->street;
            $link = $item->link;
            $description = $item->description;
            $image = $item->venue->image['3'];


            if (isset($item->author)) {
                $author = $item->author;
            } else {
                $author = "";
            }

            $c .=
            "
          <br>
          <hr>
          <a href='$url'><h2 class='eventtitle'>$title</h2></a>
          $url<br>
          $date<br>
          <h3>$venue</h3>
          $street<br>";

            if ($image != '') {
                $c .= "<img src='$image' alt='$description'/> <br>";
            }
        }
        $c .= '
        </div>
        </div>';
        return $c;
    }



    public function getEventCity($city)
    {
        $linkflux = "http://ws.audioscrobbler.com/2.0/
        ?method=geo.getevents&location=$city&api_key=b2e87208d07a2f5935dea3d3933e924c";
        $proxy = "http://proxy.unicaen.fr:3128";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_PROXY, $proxy);
        curl_setopt($curl, CURLOPT_URL, $linkflux);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
          //echo $data;

            $s = highlight_file(basename($_SERVER["PHP_SELF"]), true);
        $style = array("pair", "impair");
        $c = "";
        $i = 0;

        /* Création du parseur */
        $sx = simplexml_load_string($data);

        var_dump($sx);


        foreach ($sx->events->event as $item) {
            $title = $item->title;
            $venue = $item->venue->name;
            $date = $item->startDate;
            $street = $item->venue->location->street;
            $link = $item->link;
            $description = $item->description;
            $image = $item->venue->image['1'];


            if (isset($item->author)) {
                $author = $item->author;
            } else {
                $author = "";
            }

            $c .=
            "
          <br>
          <hr>
          <a href='$link'><h2>$title</h2></a>
          $date<br>
          <h3>$venue</h3>
          $street<br>
          <img src='$image'/>
          <br>";
        }

        return $c;
    }
}
