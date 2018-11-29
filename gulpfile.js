'use strict';

var postcss = require('gulp-postcss');
var gulp = require('gulp');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');
var concat = require('gulp-concat');


// default css task
gulp.task('css', function () {
    var plugins = [
        autoprefixer({browsers: ['last 1 version']}),
        cssnano()
    ];

    return gulp.src('./assets/css/*.css')
        .pipe(concat('style.css'))
        .pipe(postcss(plugins))
        .pipe(gulp.dest('./'));
});
