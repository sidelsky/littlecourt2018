"use strict";

const path = require("path");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const autoprefixer = require("autoprefixer");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const lost = require("lost");
const SvgStore = require("webpack-svgstore-plugin");

const vhost = "http://littlecourt2018.localhost/";

module.exports = {
    entry: ["./src/js/app.js", "./src/scss/style.scss"],

    output: {
        filename: "./dist/app.min.js"
    },

    module: {
        rules: [
            //jshint
            {
                test: /\.js$/, // include .js files
                enforce: "pre", // preload the jshint loader
                exclude: /node_modules/, // exclude any and all files in the node_modules folder
                use: [
                    {
                        loader: "jshint-loader"
                    }
                ]
            },
            {
                /* STYLESHEETS */
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                    use: [
                        {
                            loader: "css-loader",
                            options: {
                                sourceMap: true
                            }
                        },
                        {
                            loader: "postcss-loader",
                            options: {
                                sourceMap: true,
                                plugins: () => [autoprefixer, lost]
                            }
                        },
                        {
                            loader: "sass-loader",
                            options: {
                                sourceMap: true
                            }
                        }
                    ],
                    fallback: "style-loader"
                })
            },
            // NOT sure this is working
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ["es2015"]
                    }
                }
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin({
            filename: "./dist/style.css",
            allChunks: true
        }),
        new BrowserSyncPlugin({
            // browse to http://localhost:3000/ during development,
            // ./public directory is being served
            host: "localhost",
            port: 3000,
            files: ["./**/*.php", "./src/scss/**/*.scss", "./src/js/**/*.js"], // Reaload *.php
            proxy: {
                target: vhost
            }
        }),
        // create svgStore instance object
        new SvgStore({
            // svgo options + hash: true to watch
            hash: true,
            svgoOptions: {
                plugins: [{ removeTitle: true }]
            },
            prefix: "icon" + "-"
        })
    ],
    watch: true
};
