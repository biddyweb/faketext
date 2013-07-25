<?php
/**
 * @author Nguyen Huu Phuoc <huuphuoc.me>
 */

include_once __DIR__ . '/config/application.config.php';

// Prevent to access this file if the key parameter is not passed or not correct
if (!isset($_POST['key']) || $_POST['key'] != APP_SECRET_KEY) {
    //die('Invalid secret key');
}

$params = array_merge(array(
    'operator'       => '',
    'connection'     => 'none',
    'receiver'       => '',
    'hour'           => 0,
    'minute'         => 0,
    'batteryPercent' => '100',
), $_POST);
$params['12hHour']  = ($params['hour'] > 12) ? ($params['hour'] - 12) : $params['hour'];
$params['messages'] = isset($params['messages']) ? json_decode($params['messages'], true) : array();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Preview</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="asset/css/style.css"/>
</head>
<body>
    <div class="container">
        <div id="<?= APP_PREVIEW_ID; ?>" class="ft-preview">
            <!-- preview/top: -->
            <div class="row-fluid ft-preview-top">
                <div class="pull-left ft-operator">
                    <img src="asset/img/iphone-top-signal.jpg" width="39" height="30" alt=""/>
                    <span><?= $params['operator']; ?></span>
                    <img src="asset/img/iphone-connection-<?= $params['connection']; ?>.jpg" width="26" height="30" alt=""/>
                </div>
                <div class="pull-right ft-battery">
                    <span><?= $params['batteryPercent']; ?>%</span>
                    <img src="asset/img/iphone-battery.jpg" width="41" height="30" alt=""/>
                </div>
                <div class="ft-time">
                    <?= ($params['12hHour'] < 10) ? ('0' . $params['12hHour']) : $params['12hHour']; ?>:<?= ($params['minute'] < 10) ? ('0' . $params['minute']) : $params['minute']; ?> <?= $params['hour'] > 12 ? 'AM' : 'PM'; ?>
                </div>
            </div>
            <!-- :preview/top -->

            <!-- preview/header: -->
            <div class="row-fluid ft-preview-header">
                <div class="span4 ft-btn-message">Messages</div>
                <div class="span4 ft-receiver"><h2><?= $params['receiver']; ?></h2></div>
                <div class="span4 pull-right ft-btn-edit">Edit</div>
            </div>
            <!-- :preview/header -->

            <!-- preview/messages: -->
            <div class="row-fluid ft-preview-message">
                <ul>
                    <?php foreach ($params['messages'] as $k => $v) : ?>
                    <li class="<?= 'sender' == $v['from'] ? 'ft-message-blue' : 'ft-message-grey'; ?>">
                        <p><?= $v['content']; ?></p>
                        <div></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- :preview/messages -->

            <!-- preview/footer: -->
            <div class="ft-preview-footer"></div>
            <!-- :preview/footer -->
        </div>
    </div>
</body>
</html>