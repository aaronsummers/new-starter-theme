**STARTER THEME CONTENTS**

---

### Organising
For easy sorting and organising of files, follow a simple strategy.

`_type-descriptive-file-name.extension`

*ex. _cpt-services.php* or *_func-widgets.php*

###SCSS
SCSS files can be easily recognised by repeating the name of the file that the styles are applied to.

*ex. _cpt-services.scss*

### Template Parts
Template parts will follow the same order as main file types, the only difference is the `_type`. The type in this instance becomes the file type it is associated with.

*ex. _archive-navigation.php*, *_single-pagination.php*, *_section-hero.php*...

### Lazy loading images is required for all projects
http://dinbror.dk/blog/blazy/

```
<div class="b-lazy" data-src="background-image.jpg">
<img class="b-lazy"
        data-src="image.jpg"
        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
        alt="">
```
___

# Metabox Updater Key
Available from https://metabox.io/

---
# Contents

1. Gulp
2. Assets
3. sftp-config.json

## Gulp

This theme is using GULP to process all scripts and styles. These are all included in the 'node_modules' folder. See gulpfile.js for all plugins.

``` Javascript
var gulp = require('gulp'),
    sass = require('gulp-sass'), // Compiles SCSS
    autoprefixer = require('gulp-autoprefixer'), // Prefix CSS
    rename = require('gulp-rename'), // Rename to .min files
    cssnano = require('gulp-cssnano'), // Create .min files
    jshint = require('gulp-jshint'), // Check JS validity
    uglify = require('gulp-uglify'), // Minify scripts
    concat = require('gulp-concat'), // Concatinate files
    notify = require('gulp-notify'); // Notifications
```

- Using _`gulp watch`_ will watch for changes in the SCSS files.
- Enter _`gulp styles`_ to process the SCSS
- Enter _`gulp scripts`_ to merge and minify all vendor script files
- Enter _`gulp minijs`_ to minify the themes 'theme.js' file

## Assets
All additional files are located within this folder.

1. CSS
   1. SCSS
     1. jQuery (Vendor SCSS files)
   2. style.css (non-minified)
2. Fonts
3. Functions. 
4. img
5. js (Vendor scripts)
   1. Theme.js (all script calls, non-minified) 
6. Metaboxes
7. Required theme plugins
8. Template parts

## sftp-config.json
FTP addon for sublime, auto-uploads theme files on save, change "remote_path" on line 22.
