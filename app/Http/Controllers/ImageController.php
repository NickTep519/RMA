<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Urls\UrlBuilderFactory;

class ImageController extends Controller
{

    public function show(Filesystem $filesystem, string $path)
    { 
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'cache_path_prefix' => '.cache',
            'base_url' => 'images',
        ]) ;

        return $server->getImageResponse($path, request()->except(['expires', 'signature'])) ; 

    }

    public function destroy(Image $image) {
        
        Storage::delete($image->base_name) ; 
        $image->delete() ; 
        
        return back()->with('success', "L'image a bien été SUPPRIME") ; 
    }
}