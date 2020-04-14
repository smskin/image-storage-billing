const mix = require('laravel-mix');
const path = require('path');
require('laravel-mix-merge-manifest');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath(path.normalize('./public/assets'));
mix.setResourceRoot('/assets');

mix.mergeManifest();

if (['css', 'js'].includes(process.env.npm_config_section)) {
    require(`${__dirname}/webpack.${process.env.npm_config_section}.mix.js`)
} else {
    console.log(
        '\x1b[41m%s\x1b[0m',
        'Provide correct --section argument to build command: customers, backoffice'
    );
    throw new Error('Provide correct --section argument to build command!')
}
