const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = {
    entry: './assets/js/app.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'dist')
    },
    module: {
        rules: [
            {
                test:/\.js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader'
                }
            },
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                url: false,
                                minimize: true,
                            }
                        },
                        {
                            loader: 'sass-loader',
                        }
                    ]
                })
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin('styles.css'),
        /*new BrowserSyncPlugin({
            host: 'localhost',
            port: 3002,
            proxy: 'http://dev.safestay.com'
        })*/
    ]
}
