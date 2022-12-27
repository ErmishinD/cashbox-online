import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import vitePluginRequire from "vite-plugin-require";
import { resolve, dirname } from 'node:path'
import { fileURLToPath } from 'url'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/scss/main.scss',
                'resources/assets/js/main.js',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue(),
        vitePluginRequire({})
    ],
    commonjsOptions: {
      esmExternals: true,
   },
});