import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",

                // // admin lte
                // //css
                // "resources/assets/plugins/fontawesome-free/css/all.min.css",
                // "resources/assets/dist/css/adminlte.min.css",
                // //js
                // "resources/assets/plugins/jsquery/jquery.min.js",
                // "resources/assets/plugins/bootstrap/js/bootstrap.bundle.min.js",
                // "resources/assets/dist/js/adminlte.min.js",
            ],
            refresh: true,
        }),
    ],
});
