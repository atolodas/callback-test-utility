<?php

namespace MTDebug\Engine;

/**
 * Class Config
 * @package MTDebug\Engine
 */
class Config
{
    /**
     * @var Config
     */
    private static $instance;

    /**
     * @var array
     */
    private $ipWhitelist = array(
        '127.0.0.1'
    );

    /**
     * Config constructor.
     */
    public function __construct()
    {
        include dirname(dirname(__FILE__)).'/config.php';

        $this->ipWhitelist = $ipWhitelist;
    }

    /**
     * @return Config
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * @return array
     */
    public function getIpWhitelist()
    {
        return $this->ipWhitelist;
    }

    /**
     * @param $ipWhitelist
     */
    public function setIpWhitelist($ipWhitelist)
    {
        $this->ipWhitelist = $ipWhitelist;
    }
}
