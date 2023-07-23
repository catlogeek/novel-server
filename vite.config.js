import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/css/admin.scss',
                'resources/js/app.js',
                'resources/js/admin.js',
                'resources/js/admin.story.index.js',
                'resources/js/admin.review.index.js',
                'resources/js/admin.note.index.js',
                'resources/js/admin.comment.index.js',
                'resources/js/admin.episode.index.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
    },
});
