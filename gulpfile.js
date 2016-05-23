var gulp = require('gulp');
var coffee = require('gulp-coffee');
var stylus = require('gulp-stylus');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var nano = require('gulp-cssnano');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var del = require('del');
var gutil = require('gulp-util');
var plumber = require('gulp-plumber');
var coffeelint = require('gulp-coffeelint');
var gulpif = require('gulp-if');
var argv = require('yargs').argv;
var livereload = require('gulp-livereload');

var debug = !!(argv.debug); // true if --debug flag is used

// Project config

var project = {
	name: 'ted_x',

	scripts: 'src/scripts/**/*.coffee',

	styles: 'src/sass/**/*.scss',

	templates: [
	'src/**/*',
	'!src/**/*.css',
	'!src/sass/**/*.scss',
	'!src/**/*.txt'
	],

	images: 'src/images/**/*',

	build: './build/',

	dist: './build/**/*'
};

// Emancipate yourself from build-folder slavery
// None but ourselves can free our project
//    - Bob Marley
gulp.task('clean', function(cb) {
	del(project.build, cb);
	});

// Process styling and minify
gulp.task('styles', function() {
	return gulp.src(project.styles)
	.pipe(plumber())
	.pipe(sass({
		errLogToConsole: true,
		 outputStyle: 'expanded'    // nested, expanded, compact, compressed
		 }))
	.pipe(autoprefixer({
		browsers: ['last 3 versions'],
		cascade: false
		}))
	.pipe(gulp.dest(project.build));
	});

// Transpile coffee, minify and provide sourcemaps
gulp.task('scripts', function() {
	return gulp.src(project.scripts)
	.pipe(plumber())
	.pipe(gulpif(debug, sourcemaps.init()))
	.pipe(coffeelint({
		no_tabs: { level: "ignore" },
		indentation: { value: 1 },
		max_line_length: { level: "ignore" }
		}))
	.pipe(coffeelint.reporter())
	.pipe(coffee())
	.pipe(uglify({
		mangle: false,
		beautify: false
		}))
	.pipe(gulpif(debug, sourcemaps.write()))
	.pipe(gulp.dest(project.build + 'scripts'));
	});

// Copy templates
gulp.task('templates', function(){
	return gulp.src(project.templates)
	.pipe(gulp.dest(project.build));
	});

// Copy images
gulp.task('images', function(){
	return gulp.src(project.images)
	.pipe(gulp.dest(project.build + 'images'));
	});

// Do a complete build
gulp.task('build', function() {
	gulp.start('styles', 'scripts', 'templates', 'images');
	});

// Rerun the task when a file changes
gulp.task('watch', function() {
	gulp.watch(project.templates, ['templates']);
	gulp.watch(project.styles, ['styles']);
	gulp.watch(project.scripts, ['scripts']);
	});

// Rerun the task when a file changes
gulp.task('dev', function() {
	livereload.listen();
	gulp.watch([project.styles], ['deploy']);
	gulp.watch([project.templates], ['deploy']);
	gulp.watch([project.scripts], ['deploy']);
	});

// Copy to local WP
gulp.task('deploy', ['styles', 'scripts', 'templates', 'images'], function() {
	var local_wp = require('./local-wp.json');

	return gulp.src(project.dist)
	.pipe(gulp.dest(local_wp.path + project.name))
	.pipe(livereload());
	});

// The default task (called when you run `gulp` from cli)
gulp.task('default', function(){
	gutil.log('No default task, use', gutil.colors.green('gulp <task>'), 'instead');
	gutil.log('Tasks available:');
	gutil.log(gutil.colors.green('gulp clean'), 'to clean the project of previous builds');
	gutil.log(gutil.colors.green('gulp build'), 'to make a complete build for development');
	gutil.log(gutil.colors.green('gulp dev'), 'to trigger development mode (watch)');
	});