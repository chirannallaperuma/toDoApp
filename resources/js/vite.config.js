import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'vite-plugin-laravel';

export default defineConfig({
    plugins: [vue(), laravel()],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        }
    },
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        hmr: {
            protocol: 'ws',
            host: 'localhost',
        },
    },
});
