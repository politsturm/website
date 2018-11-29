'use strict';

const postcss = require('gulp-postcss');
const gulp = require('gulp');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const concat = require('gulp-concat');

// default css task
exports.css = () => {
    const plugins = [
        autoprefixer({browsers: ['last 1 version']}),
        cssnano()
    ];

    return gulp.src('./assets/css/*.css')
    	.pipe(concat('style.css'))
        .pipe(postcss(plugins))
        .pipe(gulp.dest('./'));
};
