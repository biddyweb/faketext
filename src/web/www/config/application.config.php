<?php
/**
 * @author Nguyen Huu Phuoc <huuphuoc.me>
 */

// The application environment defined in Nginx configuration file
define('APP_ENV',             getenv('APPLICATION_ENV') ?: 'dev');

// The secret key which is passed to preview page
define('APP_SECRET_KEY',     'WD4_Zm&jv2g~O_5bKw#AmB7Z1oX6Me!g5h5R"|E1t52!1Pm{>=Ei/+p3C0Sz49-');

// The ID of preview element in preview page
define('APP_PREVIEW_ID',     'preview');

// Path to PhantomJS
define('APP_PHANTOMJS_PATH', 'dev' == APP_ENV ? '/opt/local/bin/phantomjs' : '');
