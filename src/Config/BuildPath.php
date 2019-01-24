<?php
namespace Config;

class BuildPath
{
    public static function setLoadPaths($loader)
    {
        $loader->addPsr4('Config\\', '/src/Config/');
        $loader->addPsr4('Models\\', '/src/Models/');

    }
}
