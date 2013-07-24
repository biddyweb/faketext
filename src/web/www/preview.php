<?php
/**
 * @author Nguyen Huu Phuoc <huuphuoc.me>
 */

include_once __DIR__ . '/config/application.config.php';

// Prevent to access this file if the key parameter is not passed or not correct
if (!isset($_POST['key']) || $_POST['key'] != SECRET_KEY) {
    //die('Invalid secret key');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Preview</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="asset/css/style.css"/>
    <script src="vendor/jquery/jquery-2.0.2.min.js"></script>
</head>
<body>
    <div class="container">
        <div id="<?= PREVIEW_ID; ?>">Hello blabla</div>
    </div>
</body>
</html>