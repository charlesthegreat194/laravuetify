import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import vuetify from '@vuetify/plugin-vite';

export default defineConfig({
    
    plugins: [

        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vuetify({
            autoImport: true,
            styles: { configFile: 'src/styles/variables.scss'},
        }),
    ],
});
