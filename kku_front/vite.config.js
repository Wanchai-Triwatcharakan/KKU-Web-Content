import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/activity.css', 
                'resources/css/home.css', 
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/navbarM.js',
                'resources/js/accom/accom.js',
                'resources/js/activity/swiper.js',
                'resources/js/home/swiper.js',
                'resources/js/post/shareBtn.js',
                'resources/js/schedule/schedule.js',
                'resources/js/seminar/swiper.js',
                ],
            refresh: true,
        }),
    ],
});
