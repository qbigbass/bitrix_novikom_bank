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
    entry: ['./src/js/index.js', './src/scss/style.scss'],
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: './js/bundle.js'
    },
    devtool: 'source-map',
    mode: 'production',
    module: {
        rules: [
            {
                test: /\.pug$/,
                use: ['pug-loader?pretty=true']
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
                use: ['babel-loader']
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
    plugins: [
        new MiniCssExtractPlugin({
            filename: './css/all.css'
        }),
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: './src/img',
                    to: './img'
                }
            ]
        })
    ].concat(htmlPlugins)
};

module.exports = (env, argv) => {
    if (argv.mode === 'production') {
        config.plugins.push(new CleanWebpackPlugin({
            root: __dirname,
            verbose: false,
        }));
    }
    return config;
};
