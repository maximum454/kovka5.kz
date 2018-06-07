'use strict';
var gulp = require('gulp'),
    pngquant = require('imagemin-pngquant'),
    browserSync = require("browser-sync"),
    reload = browserSync.reload;


var gulpLoadPlugins = require('gulp-load-plugins'),
    plugins = gulpLoadPlugins();

function js(name){
    gulp.src(name.src.js)
        .pipe(plugins.plumber())
        .pipe(plugins.rigger())
        .pipe(plugins.uglify())
        .pipe(gulp.dest(name.build.js))
        .pipe(plugins.filesize())
        .on('error', plugins.util.log);
}
function css(name) {
    gulp.src(name.src.style)
        .pipe(plugins.plumber())
        .pipe(plugins.sass())
        .pipe(plugins.autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false}))
        .pipe(plugins.minifyCss())
        .pipe(gulp.dest(name.build.css))
        .pipe(plugins.filesize())
        .on('error', plugins.util.log);

}
function image(name) {
    gulp.src(name.src.img)
        .pipe(plugins.imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()],
            interlaced: true
        }))
        .pipe(gulp.dest(name.build.img));
}
function fonts(name) {
    gulp.src(name.src.fonts)
        .pipe(gulp.dest(name.build.fonts))
}
function watch(name) {
    gulp.watch([name.watch.style], function(event, cb) {
        gulp.start('style_'+name+':build');
    });
    gulp.watch([name.watch.js], function(event, cb) {
        gulp.start('js_'+name+':build');
    });
    gulp.watch([name.watch.img], function(event, cb) {
        gulp.start('image_'+name+':build');
    });
    gulp.watch([name.watch.fonts], function(event, cb) {
        gulp.start('fonts_'+name+':build');
    });
}

/*Веб сервер*/
var config = {
    server: {
        baseDir: "./build"
    },
    tunnel: true,
    host: 'localhost',
    port: 9000,
    logPrefix: "Frontend_Mad-Max"
};
gulp.task('webserver', function () {
    browserSync(config);
});

/*Пути к файлам kovka5*/
var kovka5 = {
    build: {
        html: 'build/',
        js: 'build/js/',
        css: 'build/css/',
        img: 'build/img/',
        fonts: 'build/fonts/'
    },
    src: {
        html: 'src/*.html',
        js: 'src/js/kovka5.js',
        style: 'src/scss/kovka5.scss',
        img: 'src/img/**/*.*',
        fonts: 'src/fonts/**/*.*'
    },
    watch: {
        html: 'src/**/*.html',
        js: 'src/js/**/*.js',
        style: 'src/scss/**/*.scss',
        img: 'src/img/**/*.*',
        fonts: 'src/fonts/**/*.*'
    }
};

/*Собираем html*/
gulp.task('html:build', function () {
    gulp.src(kovka5.src.html)
        .pipe(plugins.rigger())
        .pipe(gulp.dest(kovka5.build.html))
        .pipe(reload({stream: true}));
});

/*Собираем javascript*/
gulp.task('js:build', function () {
    js(kovka5);
});
/*Собираем стили*/
gulp.task('style:build', function () {
    css(kovka5);
});
/*Собираем картинки*/
gulp.task('image:build', function () {
    image(kovka5);
});
/*Шрифты*/
gulp.task('fonts:build', function() {
    fonts(kovka5);
});

/*Одноразовая сборка*/
gulp.task('build', [
    'html:build',
    'js:build',
    'style:build',
    'image:build',
    'fonts:build'
]);
/*Следим за изменениями*/
gulp.task('watch', function(){
    plugins.watch([kovka5.watch.html], function(event, cb) {
        gulp.start('html:build');
    });
    plugins.watch([kovka5.watch.style], function(event, cb) {
        gulp.start('style:build');
    });
    plugins.watch([kovka5.watch.js], function(event, cb) {
        gulp.start('js:build');
    });
    plugins.watch([kovka5.watch.img], function(event, cb) {
        gulp.start('image:build');
    });
    plugins.watch([kovka5.watch.fonts], function(event, cb) {
        gulp.start('fonts:build');
    });
});
/*############### kovka5 #################*/


/*Финишь запуск всего*/
gulp.task('default', [
    'build','webserver','watch'
]);


