import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/css/admin.scss', 'resources/js/app.js', 'resources/js/admin.js', 'resources/js/admin.story.index.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
    },
});
