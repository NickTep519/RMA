<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use League\Glide\ServerFactory;
use Illuminate\Routing\Controller;
use League\Glide\Signatures\Signature;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\Signatures\SignatureFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends Controller
{


public function show(Request $request, Signature $signature, string $path, Filesystem $filesystem) : StreamedResponse 
{
    $server = ServerFactory::create([
        'response' => new LaravelResponseFactory($request),
        'source' => $filesystem->getDriver(),
        'cache' => $filesystem->getDriver(),
        'cache_path_prefix' => '.cache',
        'base_url' => 'images',
    ]);

    $signature->validateRequest($request->path(), $request->all()) ; 

    return $server->getImageResponse($path, $request->all());
}


    public function destroy(Image $image) {
        
        Storage::delete($image->name) ; 
        $image->delete() ; 
        
        return back()->with('success', "L'image a bien été SUPPRIME") ; 
    }
}