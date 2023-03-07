import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import { resolve } from 'path';
import { homedir } from 'os';
import 'dotenv/config';
import url from 'url';

let host = url.parse(process.env.APP_URL).host;
let homeDir = homedir();

let serverConfig = {};

if (homeDir && process.platform == 'darwin') {
    serverConfig = {
        https: {
            key: fs.readFileSync(resolve(homeDir, `.config/valet/Certificates/${host}.key`)),
            cert: fs.readFileSync(resolve(homeDir, `.config/valet/Certificates/${host}.crt`)),
        },
        hmr: {
            host: host,
        },
        host: host,
    };
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: serverConfig,
});
