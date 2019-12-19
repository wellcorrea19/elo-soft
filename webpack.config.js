require('./node_modules/laravel-mix/src/index');
require(Mix.paths.mix());

// My plugin is here
const CompressionPlugin = require('compression-webpack-plugin');

Mix.dispatch('init', Mix);

let WebpackConfig = require('./node_modules/laravel-mix/src/builder/WebpackConfig');

module.exports = new WebpackConfig({
    plugins: [
        new CompressionPlugin({
            asset: "[path].gz[query]",
            algorithm: "gzip",
            test: /\.js$|\.css$|\.html$|\.svg$/,
            threshold: 10240,
            minRatio: 0.8
        })
    ],
}).build();
