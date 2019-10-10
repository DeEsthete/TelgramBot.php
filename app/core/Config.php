<?php

namespace Core;

class Config {

    private static $cfgs = [];

    private function __construct()
    {
    }

    static function getFromName($name, $key = null) {

        if (self::$cfgs[$name])
            $cfg = self::$cfgs[$name];
        else {
            $cfg = include Helpers::path( "config", "$name.php");
            self::$cfgs[$name] = $cfg;
        }

        return Helpers::keyOrArray($cfg, $key);

    }

    static function composer($key = null) {

        $composerDir = Helpers::path("composer.json");
        $composerFile = file_get_contents($composerDir);
        $composer = json_decode($composerFile, true);

        return Helpers::keyOrArray($composer, $key);

    }

    static function telegram($key = null){
        return self::getFromName("telegram", $key);
    }
}