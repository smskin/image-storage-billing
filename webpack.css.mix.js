const mix = require('laravel-mix');

mix.webpackConfig({
    module: {
        rules: [
            {
                // only include svg that doesn't have font in the path or file name by using negative lookahead
                test: /(\.(png|jpe?g|gif|webp)$|^((?!font).)*\.svg$)/,
                loaders: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: path => {
                                if (!/node_modules|bower_components/.test(path)) {
                                    return (
                                        Config.fileLoaderDirs.images +
                                        '/[name].[hash].[ext]'
                                    );
                                }

                                return (
                                    Config.fileLoaderDirs.images +
                                    '/vendor/' +
                                    path
                                        .replace(/\\/g, '/')
                                        .replace(
                                            /((.*(node_modules|bower_components))|images|image|img|assets)\//g,
                                            ''
                                        ) +
                                    '?[hash]'
                                );
                            },
                            publicPath: Config.resourceRoot
                        }
                    },

                    {
                        loader: 'img-loader',
                        options: Config.imgLoaderOptions
                    }
                ]
            }
        ]
    }
});

const
    assets  = 'resources/assets';

mix.sass(assets+'/pages/projects/file-manager/index.scss','css/pages/projects/file-manager.css');

mix.sass(assets+'/app/index.scss','css/app.css');

mix.version();
