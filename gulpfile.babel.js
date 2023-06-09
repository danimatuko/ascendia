// Include gulp and plugins
const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const autoprefixer = require("gulp-autoprefixer");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const browserSync = require("browser-sync").create();

// Compile Sass
gulp.task("sass", () => {
  return gulp
    .src("src/sass/**/*.scss")
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest("dist/css"))
    .pipe(browserSync.stream());
});

// Concatenate and minify JS
gulp.task("scripts", () => {
  return gulp
    .src(["src/js/**/*.js", "!src/js/customizer-preview.js"])
    .pipe(concat("main.js"))
    .pipe(uglify())
    .pipe(gulp.dest("dist/js"))
    .pipe(browserSync.stream());
});

// copy excluded files to the dest/js
gulp.task("copyExcluded", () => {
  return gulp
    .src("src/js/customizer-preview.js")
    .pipe(uglify())
    .pipe(gulp.dest("dist/js"))
    .pipe(browserSync.stream());
});

// Watch files and reload browser on changes
gulp.task("watch", () => {
  browserSync.init({
    proxy: "http://ascendia.local/", // Replace with your local WordPress URL
  });

  gulp.watch("src/sass/**/*.scss", gulp.series("sass"));
  gulp.watch("src/js/**/*.js", gulp.series("scripts"));
  gulp.watch("src/js/**/*.js", gulp.series("copyExcluded"));
  gulp.watch("**/*.php").on("change", browserSync.reload);
});

// Default task
gulp.task("default", gulp.parallel("sass", "scripts", "copyExcluded", "watch"));
