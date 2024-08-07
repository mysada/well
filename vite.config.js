import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/cart.js',
                'resources/js/gty-input.js',
                'resources/js/slider-init.js',
                'resources/sass/home.scss',
                'resources/sass/cart.scss',
                'resources/sass/product_details.scss',
                'resources/sass/thank_you.scss',
                'resources/sass/product_list.scss',
                'resources/sass/about.scss',
                'resources/sass/headfooter.scss',
                'resources/sass/billing.scss',
                'resources/sass/wishlist.scss',
            ],
            refresh: true,
        }),
    ],
});
