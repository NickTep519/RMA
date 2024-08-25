<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{$property->title}} </title>
    @livewireStyles

    @vite(['resources/css/app.css'])
    <style>

        #image-to-resize {
            display: flex ; 
            justify-content: center ; 
            align-items: center ; 
            width: 400px; 
            height: auto; 
        }

        a {
            text-decoration: none ; 
        }
        .gallery-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 8px;
        }
        .gallery-image {
            flex: 1 1 calc(33.333% - 8px);
            height: auto;
            max-width: 100%;
        }
        .gallery-image img {
            display: block;
            max-width: 100%;
            height: auto;
        }
        .hidden {
            display: none;
        }

        @media (max-width: 768px) {
            .gallery-container {
                flex-direction: column;
            }
            .gallery-image {
                flex: none;
                margin-bottom: 8px;
            }
            .gallery-image:first-child {
                flex: 1 1 auto;
            }
        }
    </style>
    <script>
        function toggleImages() {
            const images = document.querySelectorAll('.gallery-image');
            images.forEach((image, index) => {
                if (index !== 0) {
                    image.classList.toggle('hidden');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const firstImage = document.querySelector('.gallery-image:first-child img');
            firstImage.addEventListener('click', toggleImages);
        });
    </script>
</head>
<body>
    <div class="bg-white">
        <div class="pt-6">
            <nav aria-label="Breadcrumb">
                <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-2 text-sm font-medium text-gray-900">{{$property->city?->name_city}}</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-2 text-sm font-medium text-gray-900"> {{$property->neighborhood}} </a>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                </svg>
                        </div>
                    </li>
      
                    <li class="text-sm">
                        <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600"> {{$property->title}} </a>
                    </li>
                </ol>
            </nav>

            <!-- Image gallery -->
            <div class="mx-auto mt-6 max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="gallery-container">
                    @if (!$images->isEmpty())
                        @foreach ($images as $image)
                            <div class="gallery-image @if($loop->index !== 0) hidden @endif " @if ($loop->index === 0) id="image-to-resize" @endif >
                                <img src="{{app(App\Service\ImagePathGenerator::class)->generate($image->name, ['h'=>500, 'w'=>500])}}" alt="Two each of gray, white, and black shirts laying flat." class="object-cover object-center">
                            </div>                        
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Product info -->
            <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl"> {{$property->title}} </h1>
                </div>
      
                <!-- Options -->
                <div class="mt-4 lg:row-span-3 lg:mt-0">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl tracking-tight text-gray-900">  {{ number_format($property->price, thousands_separator: ' ') }} F CFA </p>
      
                    <!-- Reviews -->
                    <div class="mt-6">
                        <h3 class="sr-only">Reviews</h3>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $property->user->moyenne_rating)
                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                            <p class="sr-only">4 out of 5 stars</p>
                        </div>
                    </div>

                    <div class="mt-10">

                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Conditions </h3>
                            <!--<a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>-->
                        </div>
                        <div class="mt-4">
                            <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                <li class="text-gray-400"><span class="text-gray-600"> CEE : {{$property->cee}} m² </span></li>
                                <li class="text-gray-400"><span class="text-gray-600"> Avance : {{$property->rent_advance}} mois </span></li>
                                <li class="text-gray-400"><span class="text-gray-600"> Prepayé : {{$property->rent_prepaid}} mois </span></li>
                                <li class="text-gray-400"><span class="text-gray-600"> Commission : {{$property->commission}} mois </span></li>
                                <li class="text-gray-400"><span class="text-gray-600"> Frais de visite : {{ number_format($property->visit_fees, thousands_separator: ' ') }} F CFA </span></li>
                            </ul>
                        </div>
                        
                    </div>

                    @livewire('contact')
      
                </div>

                <!-- Description and details -->
                <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                    <div>
                        <h3 class="sr-only">Description</h3>
                        <div class="space-y-6">
                            <p class="text-base text-gray-900"> {{$property->description}}  </p>
                        </div>
                    </div>
      
                    <div class="mt-10">
                        <h3 class="text-sm font-medium text-gray-900">Caracteristiques</h3>
                        <div class="mt-4">
                            <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                <li class="text-gray-400"><span class="text-gray-600"> Surface : {{$property->surface}} m² </span></li>
                                <li class="text-gray-400"><span class="text-gray-600"> Nombre de piece : {{$property->rooms}} </span></li>
                                <li class="text-gray-400"><span class="text-gray-600"> Nombre de chambre : {{$property->bedrooms}} </span></li>
                                <li class="text-gray-400"><span class="text-gray-600"> N° d'etage : {{$property->floor}} </span></li>
                            </ul>
                        </div>
                    </div>
      
                <!--<div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900">Details</h2>
                        <div class="mt-4 space-y-6">
                            <p class="text-sm text-gray-600">The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming &quot;Charcoal Gray&quot; limited release.</p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</body>
</html>