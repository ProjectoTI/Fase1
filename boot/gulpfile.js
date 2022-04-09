const gulp = require('gulp');
const gulpIf = require('gulp-if');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass'));
const htmlmin = require('gulp-htmlmin');
const purgecss = require('gulp-purgecss')
const cssmin = require('gulp-cssmin');
const imagemin = require('gulp-imagemin');
const concat = require('gulp-concat');
const jsImport = require('gulp-js-import');
const terser = require('gulp-terser');
const sourcemaps = require('gulp-sourcemaps');
const htmlPartial = require('gulp-html-partial');
const clean = require('gulp-clean');
const isProd = process.env.NODE_ENV === 'prod';
const htmlFile = [
    'src/*.html'
]
const njk = require('gulp-nunjucks-render')
const beautify = require('gulp-beautify')
const sitemap = require('gulp-sitemap');

function html() {
    return gulp.src('src/html/pages/**/*.+(html|njk)')
        .pipe(
            njk({
                path: ['src/html'],
            })
        )
        .pipe(beautify.html({ indent_size: 4, preserve_newlines: false }))
        .pipe(gulp.dest('docs'))
}

function css() {
    return gulp.src('src/sass/style.scss')
        .pipe(gulpIf(!isProd, sourcemaps.init()))
        .pipe(sass({
            includePaths: ['node_modules']
        }).on('error', sass.logError))
        .pipe(gulpIf(!isProd, sourcemaps.write()))
        .pipe(gulpIf(isProd, purgecss({
            content: ['src/**/*.html', 'src/**/*.js']
        })))
        .pipe(gulpIf(isProd, cssmin()))
        .pipe(gulp.dest('docs/css/'));
}

function js() {
    return gulp.src('src/js/*.js')
        .pipe(jsImport({
            hideConsole: true
        }))
        .pipe(concat('all.js'))
        .pipe(gulpIf(isProd, terser()))
        .pipe(gulp.dest('docs/js'));
}

function img() {
    return gulp.src('src/img/*')
        .pipe(gulpIf(isProd, imagemin()))
        .pipe(gulp.dest('docs/img/'));
}

function serve() {
    browserSync.init({
        open: true,
        server: {
            baseDir: "docs",
            serveStaticOptions: {
                extensions: ['html']
            }
        }
    });
}

function browserSyncReload(done) {
    browserSync.reload();
    done();
}


function watchFiles() {
    gulp.watch('src/**/*.html', gulp.series(html, browserSyncReload));
    gulp.watch('src/**/*.njk', gulp.series(html, browserSyncReload));
    gulp.watch('src/**/*.scss', gulp.series(css, browserSyncReload));
    gulp.watch('src/**/*.js', gulp.series(js, browserSyncReload));
    gulp.watch('src/img/**/*.*', gulp.series(img));

    return;
}

function del() {
    return gulp.src('docs/*', {read: false})
        .pipe(clean());
}

function copy() {
    return gulp.src('./CNAME')
           .pipe(gulp.dest('./docs/'));
}

async function createSitemap() {
    gulp.src('docs/**/*.html', {
            read: false
        })
        .pipe(sitemap({
            siteUrl: 'https://bootiful.org'
        }))
        .pipe(gulp.dest('./docs'));
}

exports.css = css;
exports.copy = copy;
exports.html = html;
exports.js = js;
exports.del = del;
exports.serve = gulp.parallel(html, css, js, img, watchFiles, serve);
exports.default = gulp.series(del, copy, html, css, js, img, createSitemap);
