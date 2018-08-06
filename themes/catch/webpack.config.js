const webpack = require("webpack");
const path = require("path");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");

const CopyWebpackPlugin = require("copy-webpack-plugin");
const ImageminPlugin = require("imagemin-webpack-plugin").default;

const in_production = process.env.NODE_ENV === "production";
const watching = process.env.NODE_ENV === "watch";

module.exports = {
    entry: {
        script: "./js/init.js",
        style: "./scss/main.scss"
    },
    output: {
        path: "/var/www/html/public/resources/",
        filename: "js/[name].js",
        publicPath: "/resources/"
    },
    devtool: "source-map",
    watch: watching,
    watchOptions: {
        poll: watching
    },
    module: {
        rules: [
            {
                test: /\.scss/,
                use: ExtractTextPlugin.extract({
                    fallback: "style-loader",
                    use: ["css-loader", "sass-loader"]
                })
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: "babel-loader"
            },
            {
                test: /\.(png|jpg|gif|svg|eot|ttf|woff|woff2)$/,
                loader: "file-loader",
                options: {
                    name: "[path][name].[ext]"
                }
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin("css/[name].css"),
        new webpack.LoaderOptionsPlugin({
            minimize: in_production
        })
    ]
};

if (in_production) {
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin({
            output: {
                ascii_only: true
            }
        })
    );
}

if (in_production) {
    // module.exports.plugins.push(
    //     new ImageminPlugin({
    //         disable: false,
    //         test: /\.(jpe?g|png|gif|svg)$/i,
    //         pngquant: {
    //             quality: "95-100"
    //         }
    //     })
    // );
}
