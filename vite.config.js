import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/reset.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/pagetop.js',
                'resources/js/storage.js',
                'resources/js/form.js',
                'resources/js/switch-crown.js'
            ],
            refresh: true,
        }),
    ],
});
