<?php
namespace Config;

class BuildConfig
{
    private $loader;
    private $db_connection;
    private $build_paths;
    private $error_config;

    public function __construct($loader, $db_connection = false, $build_paths = true)
    {
        $this->loader        = $loader;
        $this->db_connection = $db_connection;
        $this->build_paths   = $build_paths;

        setlocale(LC_MONETARY, 'en_US.UTF-8');

        define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);

        $localList = array('127.0.0.1');

        if (in_array($_SERVER['REMOTE_ADDR'], $localList)) {
            define('REL_PATH', '/');
        } else {
            if ($_SERVER['PHP_SELF'] != '/index.php') {
                define('REL_PATH', htmlspecialchars($_SERVER['PHP_SELF']));
            } else {
                define('REL_PATH', '');
            }
        }

        //define the path to the admin panel.
        //this is an attempt to make routes more movable
        define("ADMIN_PATH","/admin");
        define("ADMIN_TEMPLATE", $_SERVER["DOCUMENT_ROOT"]."/templates/admin");
        define("CART_TEMPLATE", $_SERVER["DOCUMENT_ROOT"]."/templates/cart");

        if ($this->build_paths) {
            BuildPath::setLoadPaths($this->loader);
        }

        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        $this->error_config = new ErrorConfig();
    }
}
