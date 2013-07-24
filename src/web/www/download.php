<?php
/**
 * @author Nguyen Huu Phuoc <huuphuoc.me>
 */
session_start();

include_once __DIR__ . '/config/application.config.php';

$captureJs  = dirname(__DIR__) . '/capture/capture.js';
$previewUrl = implode('', array(
    (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 80) ? 'http' : 'https',
    '://',
    $_SERVER['SERVER_NAME'],
    '/preview.php',
));

$params = array(
    'key' => SECRET_KEY,
);

$outputFile = dirname(__DIR__) . '/data/' . uniqid() . '.txt';
//$outputFile = dirname(__DIR__) . '/data/' . session_id() . '.txt';
$fp = fopen($outputFile, 'w+');
fclose($fp);
chmod($outputFile, 0777);

$command = implode(' ', array(
    'phantomjs',
    $captureJs,
    $previewUrl,
    PREVIEW_ID,
    base64_encode(urlencode(http_build_query($params))),
    '>',
    $outputFile,
));

echo $command;

shell_exec($command);
//$output = file_get_contents($outputFile);
//echo json_encode(array(
//    'output' => $output,
//));