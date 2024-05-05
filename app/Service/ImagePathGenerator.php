<?php

namespace App\Service ;

use League\Glide\Urls\UrlBuilder;
use League\Glide\Urls\UrlBuilderFactory;

class ImagePathGenerator {

    private UrlBuilder $urlBuilder ;  

    public function __construct(string $signature)
    {
        $this->urlBuilder = UrlBuilderFactory::create('/images/', $signature) ; 
    }

    public function generate(string $path, array $param){

        return $this->urlBuilder->getUrl($path, $param) ; 
        
    }
}