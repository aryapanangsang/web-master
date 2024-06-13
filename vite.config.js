// vite.config.js

import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'

import postcss from './postcss.config.js'

export default defineConfig({
   
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh : refreshPaths,
        }),
    ],
})