const mix = require('laravel-mix');
const webpack = require('webpack');
require('laravel-mix-alias');

mix.alias({
    '~modules': path.resolve(__dirname, '/resources/assets/modules')
});

mix.webpackConfig({
    output: {
        publicPath: '/assets/'
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            'window.$': 'jquery'
        }),
        new webpack.HashedModuleIdsPlugin({
            hashFunction: 'md4',
            hashDigest:'base64',
            hashDigestLength: 8,
        }),
    ],
    optimization: {
        splitChunks: {
            chunks: 'async',
            minSize: 30000,
            maxSize: 0,
            minChunks: 1,
            maxAsyncRequests: 6,
            maxInitialRequests: 4,
        }
    },
    module: {
        rules: [
            {
                test: require.resolve('jquery'),
                use: [
                    {
                        loader: 'expose-loader',
                        options: '$'
                    },
                    {
                        loader: 'expose-loader',
                        options: 'jQuery'
                    }
                ]
            }
        ]
    }
});

const
    assets  = 'resources/assets';

mix.js(assets+'/pages/projects/file-manager/index.js','js/pages/projects/file-manager.js');

mix.js(assets+'/app/components/datatables.js','js/components/datatables.js');

mix.js(assets+'/app/index.js','js/app.js');

mix.version();
