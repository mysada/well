import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
        input: [
            'resources/sass/app.scss',
            'resources/js/app.js',
            'resources/js/checkout.js',
            'resources/js/qty-input.js',
            'resources/js/slider-init.js',
            'resources/js/billing.js',
            'resources/sass/home.scss',
            'resources/sass/cart.scss',
            'resources/sass/product_details.scss',
            'resources/sass/thank_you.scss',
            'resources/sass/product_list.scss',
            'resources/sass/about.scss',
            'resources/sass/checkout.scss',
            'resources/sass/register.scss',
            'resources/sass/login.scss',
            'resources/sass/verify.scss',
            'resources/sass/wishlist.scss',
            'resources/js/cart.js',
            'resources/js/qty-input.js',
            'resources/sass/privacy_policy.scss',
            'resources/sass/reviews.scss',
            'resources/sass/faq.scss',
            'resources/sass/cancellation_refunds.scss',
            'resources/adminsass/admin.scss',
            'resources/adminsass/admin_dashboard.scss',

        ],
        refresh: true,
    }),
],
});
