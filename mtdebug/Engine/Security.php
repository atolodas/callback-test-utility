<?php

namespace MTDebug\Engine;

/**
 * Class Security
 * @package MTDebug\Engine
 */
class Security
{
    /**
     * @var Security
     */
    private static $instance;

    /**
     * @var array
     */
    private $ipWhitelist = array(
        '127.0.0.1'
    );

    /**
     * @return Security
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Security();
        }

        return self::$instance;
    }

    /**
     * @return bool
     */
    public function isIpAllowed()
    {
        return in_array($_SERVER['REMOTE_ADDR'], Config::getInstance()->getIpWhitelist());
    }
}
