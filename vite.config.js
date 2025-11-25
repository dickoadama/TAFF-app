import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/embellishment.css',
                'resources/css/responsive.css',
                'resources/css/placeholders.css',
                'resources/css/home.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
