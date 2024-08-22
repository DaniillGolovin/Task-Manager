import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import {codecovVitePlugin} from "@codecov/vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        codecovVitePlugin({
            enableBundleAnalysis: process.env.CODECOV_TOKEN !== undefined,
            bundleName: "Task-Manager",
            uploadToken: process.env.CODECOV_TOKEN,
        }),
    ],
});
