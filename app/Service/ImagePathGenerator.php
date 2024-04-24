<?php

namespace App\Service ;

use League\Glide\Urls\UrlBuilderFactory;

class ImagePathGenerator {

    public function generate(string $path, int $width, int $height){

        $urlBulder = UrlBuilderFactory::create('/images/') ; 

        return $urlBulder->getUrl($path, ['w'=>$width, 'h'=>$height]) ; 
    }
}