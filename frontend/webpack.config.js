const path = require('path');
const fs = require('fs');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

function generateHtmlPlugins(templateDir) {
    const templateFiles = fs.readdirSync(path.resolve(__dirname, templateDir));
    return templateFiles.map(item => {
        const parts = item.split('.');
        const name = parts[0];
        const extension = parts[1];
        return new HtmlWebpackPlugin({
            filename: `${name}.html`,
            template: path.resolve(__dirname, `${templateDir}/${name}.${extension}`),
            inject: false,
            minify: false
        });
    });
}

const htmlPlugins = generateHtmlPlugins('./src/pug/views');

const config = {
    entry: {
        // jquery: './src/js/vendors/jquery.min.js',
        // popover: './src/js/vendors/popover.js',
        // 'bootstrap.bundle': './src/js/vendors/bootstrap.min.js',
        // 'swiper.bundle': './src/js/vendors/swiper.min.js',
        // 'select2.bundle': './src/js/vendors/select2.min.js',
        bundle: './src/js/index.js',
        bootstrap: './src/scss/bootstrap.scss',
        swiper: './src/scss/swiper.scss',
        select2: './src/scss/select2.scss',
        'air-datepicker': './src/scss/air-datepicker.scss',
        all: './src/scss/all.scss',
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: './js/[name].js'
    },
    // devtool: 'source-map',
    // mode: 'production',
    mode: 'development',
    module: {
        rules: [
            {
                test: /\.pug$/,
                use: [
                    'thread-loader',
                    'pug-loader?pretty=true'
                ]
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader']
            },
            {
                test: /\.scss$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
            },
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/i,
                use: ['file-loader']
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'fonts/[name][ext]'
                }
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: [
                    'thread-loader',
                    {
                        loader: 'babel-loader',
                        options: { cacheDirectory: true }
                    }
                ]
            }
        ]
    },
    devServer: {
        watchFiles: {
            paths: ['./src/pug/**/*.pug'],
            options: {
                usePolling: true
            }
        },
        hot: true,
    },
    // optimization: {
    //     minimize: false,
    //     minimizer: []
    // },
    plugins: [
        new MiniCssExtractPlugin({
            filename: './css/[name].css',
        }),
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: './src/img',
                    to: './img'
                },
                {
                    from: './src/js/vendors',
                    to: './js'
                }
            ]
        })
    ].concat(htmlPlugins)
};

module.exports = (env, argv) => {
    // if (argv.mode === 'production') {
    //     config.plugins.push(new CleanWebpackPlugin({
    //         root: __dirname,
    //         verbose: false,
    //     }));
    // }
    config.plugins.push(new CleanWebpackPlugin({
        root: __dirname,
        verbose: false,
    }));
    return config;
};
