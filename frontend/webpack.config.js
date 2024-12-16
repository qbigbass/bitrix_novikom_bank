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
        bootstrap: './src/scss/bootstrap.scss',
        swiper: './src/scss/swiper.scss',
        select2: './src/scss/select2.scss',
        'air-datepicker': './src/scss/air-datepicker.scss',
        all: './src/scss/all.scss',
    },
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
            // {
            //     test: /\.(png|svg|jpg|jpeg|gif)$/i,
            //     use: ['file-loader']
            // },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'fonts/[name][ext]'
                }
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
            filename: './css/[name].css',
        }),
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: './src/img',
                    to: './img'
                },
                {
                    from: './src/js',
                    to: './js',
                    toType: "dir",
                }
            ]
        })
    ].concat(htmlPlugins)
};

module.exports = (env, argv) => {
    config.plugins.push(new CleanWebpackPlugin({
        root: __dirname,
        verbose: false,
    }));
    return config;
};
