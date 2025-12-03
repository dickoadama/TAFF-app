import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/embellishment.css',
                'resources/css/print-invoice.css',
                'resources/css/print-quote.css',
                'resources/css/responsive.css',
                'resources/css/placeholders.css',
                'resources/css/home.css',
                'resources/css/video-section.css',
                'resources/css/typography.css',
                'resources/css/forms.css',
                'resources/css/tables.css',
                'resources/css/footer.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});