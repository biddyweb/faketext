<?php
/**
 * @author Nguyen Huu Phuoc <huuphuoc.me>
 */

include_once __DIR__ . '/config/application.config.php';

$captureJs  = dirname(__DIR__) . '/capture/capture.js';
$previewUrl = implode('', array(
    (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 80) ? 'http' : 'https',
    '://',
    $_SERVER['SERVER_NAME'],
    '/preview.php',
));

$params = array_merge(array(
    'key' => APP_SECRET_KEY,
), $_POST);

$command = implode(' ', array(
    APP_PHANTOMJS_PATH,
    $captureJs,
    $previewUrl,
    APP_PREVIEW_ID,
    base64_encode(urlencode(http_build_query($params))),
));

$output = exec($command . ' 2>&1');

// Force download png
header('Content-Disposition: attachment;filename="faketext_' . uniqid() . '.png"');
header('Content-Type: application/force-download');
// header("Content-type: application/octet-stream");
echo base64_decode($output);
exit();
