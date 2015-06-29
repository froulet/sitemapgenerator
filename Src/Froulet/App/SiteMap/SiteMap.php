<?php

namespace Froulet\App\SiteMap;

use Froulet\Libraries\Document\Document as Doc;

class SiteMap
{

    public static function initialize()
        {

            $output = '&lt;?xml version="1.0" encoding="UTF-8"?&gt;' . "<br>";
            $output .= '&lt;urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"&gt;' . "<br>";


            $objects = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(ROOT),
                \RecursiveIteratorIterator::LEAVES_ONLY,
                \RecursiveIteratorIterator::CATCH_GET_CHILD);
            foreach ($objects as $name => $object) {

                $realpath = $_SERVER[HTTP_HOST] . realpath($name);

                $new = "http://www." . str_replace(SERVDIR, '', $realpath);


                $output .=  "<br>
                &lt;url&gt; <br>
                &lt;loc&gt;$new&lt;/loc&gt; <br>
                &lt;/url&gt; <br>
                ";


        }


        $output .= '&lt;/urlset&gt;' . "<br>";

        return $output;

    }

    public  static  function CreateXMLFile($output)
    {
        //Remove br tags
        $str = str_replace(array("<br>","<br/>"), "", $output);
        //Decode special Chars
        $final = htmlspecialchars_decode($str);
        //Write in the file
        $myfile = fopen("sitemap.xml", "w") or die("Unable to open file!");
        fwrite($myfile, $final);
        fclose($myfile);
    }


}
