<?php

error_reporting(-1);
ini_set('display_errors', 'on');

require_once dirname(__FILE__).'/Engine/Config.php';
require_once dirname(__FILE__).'/Engine/Security.php';
require_once dirname(__FILE__).'/Engine/Utilities.php';

$security = \MTDebug\Engine\Security::getInstance();
if (!$security->isIpAllowed()) {
    header("HTTP/1.0 404 Not Found");
    include '404.html';
    die();
}

include 'form.php';
