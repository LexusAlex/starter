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
    watch: [
      "./frontend/blocks/**/*.{scss,sass}",
      "./frontend/scss/**/*.{scss,sass}"
    ]
  },
  js: {
    src: "./frontend/js/index.js",
    dist: "./frontend/dist/js/",
    watch: [
      "./frontend/blocks/**/*.js",
      "./frontend/js/**/*.js"
    ]
  },
};

requireDir("./frontend/gulp/");

export { paths }

export const development = gulp.series("clean",gulp.parallel(["html", "scss", "js"]), gulp.parallel("server"));

export const prod = gulp.series("clean", gulp.parallel(["html", "scss", "js"]));

//export const development = gulp.series("clean",
//  gulp.parallel(["html", "scss", "js", "fonts"]),
  //gulp.parallel("server"));

export default development;