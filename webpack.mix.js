const mix = require('laravel-mix');
const webpack = require('webpack');
const path = require('path');

mix.options({
        terser: {
            terserOptions: {
                compress: {
                    drop_console: true
                }
            }
        }
    })
    .setPublicPath("public")
    .js("resources/js/app.js", "public")
    .vue()
    .version()
    .webpackConfig({
        resolve: {
            symlinks: false,
            extensions: [ '.tsx', '.ts', '.js', '.vue' ],
            alias: {
                "@": path.resolve(__dirname, "resources/js/"),
            }
        },
        plugins: [
            new webpack.IgnorePlugin({
                resourceRegExp: /^\.\/locale$/,
                contextRegExp: /moment$/,
            }),]
    });
