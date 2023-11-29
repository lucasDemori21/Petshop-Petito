import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/login-register.css', 'resources/css/navbar.css', 'resources/css/shop.css'],
            refresh: true,
        }),
    ],
});
