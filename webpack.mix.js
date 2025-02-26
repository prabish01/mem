const mix = require("laravel-mix");
const ImageminPlugin = require("imagemin-webpack-plugin").default;
const CopyWebpackPlugin = require("copy-webpack-plugin");
const imageminMozjpeg = require("imagemin-mozjpeg");
const imageminPngquant = require("imagemin-pngquant");
const imageminWebp = require("imagemin-webp");
const purgecss = require('@fullhuman/postcss-purgecss');

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .options({
        terser: {
            terserOptions: {
                compress: true,
                output: {
                    comments: false,
                },
            },
        },
        cssNano: {
            discardComments: {
                removeAll: true,
            },
        },
        postCss: [
            purgecss({
                content: [
                    './resources/views/**/*.blade.php',
                    './resources/js/**/*.js',
                    './resources/js/**/*.vue',
                ],
                defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || [],
                safelist: {
                    standard: [/^owl-/, /^swiper-/, /^pagination-/],
                    deep: [/^owl-/, /^swiper-/, /^pagination-/],
                    greedy: [/^owl-/, /^swiper-/, /^pagination-/]
                }
            })
        ]
    })
    .minify(["public/css/app.css"])
    .minify(["public/js/app.js"])
    .version()
    .webpackConfig({
        plugins: [
            new CopyWebpackPlugin({
                patterns: [
                    {
                        from: "resources/images",
                        to: "public/images",
                    },
                ],
            }),
            new ImageminPlugin({
                test: /\.(jpe?g|png|gif|svg)$/i,
                plugins: [
                    imageminMozjpeg({
                        quality: 80,
                        progressive: true,
                    }),
                    imageminPngquant({
                        quality: [0.6, 0.8],
                    }),
                ],
                plugins: [imageminWebp({ quality: 75 })],
            }),
        ],
        optimization: {
            minimize: true,
            usedExports: true,
            sideEffects: true,
        },
    });
