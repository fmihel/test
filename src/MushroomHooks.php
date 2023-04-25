<?php

namespace fmihel\test;

class MushroomHooks
{
    private static function routines()
    {
        //$file = __DIR__ . '/../package.json';
        //if (file_exists($file)) {
        //    unlink($file);
        // }
    }
    public static function afterInstall($params)
    {
        // some actions on after install your package...
        //error_log('afterInstall');
        //error_log(__DIR__);
        self::routines();
        error_log('install ...................');
        error_log(print_r($params, true));
        error_log('...................');

    }

    public static function afterUpdate($params)
    {
        // some actions on after update your package...
        //error_log('afterUpdate');
        //error_log(__DIR__);
        self::routines();
        error_log('update ...................');
        error_log(print_r($params, true));
        error_log('...................');
    }
}
