"use strict";

const gulp = require('gulp');

const requireDir = require("require-dir");

const paths = {
  html: {
    src: [
      "./frontend/html/**/*.html",
    ],
    dist: "./frontend/dist/",
    watch: [
      "./frontend/blocks/**/*.html",
      "./frontend/html/**/*.html",
    ]
  },
  scss: {
    src: "./frontend/scss/main.{scss,sass}",
    dist: "./frontend/dist/css/",
    dist2: "./public/assets/css/",
    watch: [
      "./frontend/blocks/**/*.{scss,sass}",
      "./frontend/scss/**/*.{scss,sass}"
    ]
  },
  js: {
    src: "./frontend/js/index.js",
    dist: "./frontend/dist/js/",
    dist2: "./public/assets/js/",
    watch: [
      "./frontend/blocks/**/*.js",
      "./frontend/js/**/*.js"
    ]
  },
  images: {
    src: [
      "./frontend/images/**/*.{jpg,jpeg,png,gif,tiff,svg,webp}",
      "!./frontend/images/favicon/*.{jpg,jpeg,png,gif,tiff,webp}"
    ],
    dist: "./frontend/dist/images/",
    dist2: "./public/assets/images/",
    watch: "./frontend/images/**/*.{jpg,jpeg,png,gif,svg,tiff,webp}"
  },
  fonts: {
    src: "./frontend/fonts/**/*.{woff,woff2}",
    dist: "./frontend/dist/css/fonts/",
    watch: "./frontend/fonts/**/*.{woff,woff2}"
  },
};

requireDir("./frontend/gulp/");

export { paths }

export const development = gulp.series("clean",gulp.parallel(["html", "scss", "js", "images", "fonts"]), gulp.parallel("server"));

export const prod = gulp.series("clean", gulp.parallel(["html", "scss", "js", "images", "fonts"]));

//export const development = gulp.series("clean",
//  gulp.parallel(["html", "scss", "js", "fonts"]),
  //gulp.parallel("server"));

export default development;
