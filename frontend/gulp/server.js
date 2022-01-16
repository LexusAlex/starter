"use strict";

import { paths } from "../../gulpfile.babel";
const gulp = require("gulp");
const browsersync = require("browser-sync")

gulp.task("server", () => {
    browsersync.init({
        server: "./frontend/dist/",
        port: 4000,
        notify: true
    });

    gulp.watch(paths.html.watch, gulp.parallel("html"));
    gulp.watch(paths.scss.watch, gulp.parallel("scss"));
    gulp.watch(paths.js.watch, gulp.parallel("js"));
});
