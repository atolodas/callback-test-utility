<?php

error_reporting(-1);
ini_set('display_errors', 'on');

require_once dirname(__FILE__).'/Engine/Config.php';
require_once dirname(__FILE__).'/Engine/Security.php';
require_once dirname(__FILE__).'/Engine/Utilities.php';
require_once dirname(__FILE__).'/Engine/Processor.php';

$security = \MTDebug\Engine\Security::getInstance();
if (!$security->isIpAllowed()) {
    header("HTTP/1.0 404 Not Found");
    include '404.html';
    die();
}

$processor = new \MTDebug\Engine\Processor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MisterTango payment "Debug Console"</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
</head>
<body>
<br/>
<br/>
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Callback response</h1>
            <div class="card">
                <div class="card-block">
                    <?php echo $processor->process(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden">
    <script src="assets/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</div>
</body>
</html>
