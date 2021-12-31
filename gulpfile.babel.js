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
};

requireDir("./frontend/gulp/");

export { paths }

export const development = gulp.series(gulp.parallel(["html"]), gulp.parallel("server"));

//export const development = gulp.series("clean",
//  gulp.parallel(["html", "scss", "js", "fonts"]),
  //gulp.parallel("server"));

export default development;
