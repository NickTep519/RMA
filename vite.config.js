import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'node_modules/slick-carousel/slick/slick.css',
                'node_modules/slick-carousel/slick/slick-theme.css',
                'node_modules/jquery/dist/jquery.min.js',
                'node_modules/slick-carousel/slick/slick.min.js',
            ],
            refresh: true,
        }),
    ],
});


/*import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    optimizeDeps: {
        include: ['jquery', 'slick-carousel'],
    },
});*/