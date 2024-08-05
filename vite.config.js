import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/sass/home.scss',
                'resources/sass/cart.scss',
                'resources/sass/product_details.scss',
                'resources/sass/thank_you.scss',
                'resources/sass/product_list.scss',
            ],
            refresh: true,
        }),
    ],
});
