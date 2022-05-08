"use strict";

import { paths } from "../../gulpfile.babel";
import gulp from "gulp";
import debug from "gulp-debug";

gulp.task("images", () => {
  return gulp.src(paths.images.src)
    .pipe(gulp.dest(paths.images.dist))
    .pipe(gulp.dest(paths.images.dist2))
    .pipe(debug({
      "title": "Images"
    }));
});
