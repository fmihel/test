<?php

namespace fmihel\test;

class MushroomHooks
{
    const KEY_CLEAR_LIST = 'mushroom-clear';
    const UP_TO_PACKAGE = '/../';

    private static function del($path)
    {
        if (!is_dir($path)) {
            if (file_exists($path)) {
                unlink($path);
            }

        } else {
            if (substr($path, strlen($path) - 1, 1) != '/') {
                $path .= '/';
            }
            $files = glob($path . '*', GLOB_MARK);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    self::del($file);
                } else {
                    unlink($file);
                }
            }
            rmdir($path);
        }
    }

    public static function afterInstall($params)
    {
        try {
            $json = file_get_contents(__DIR__ . self::UP_TO_PACKAGE . 'composer.json');
            $composer = json_decode($json, true);
            $extra = $composer['extra'];
            $list = $extra[self::KEY_CLEAR_LIST];
            foreach ($list as $obj) {
                $files = glob(__DIR__ . self::UP_TO_PACKAGE . $obj);
                foreach ($files as $file) {
                    self::del($file);
                }
            };

        } catch (\Exception $e) {
            error_log(print_r($e));
            throw $e;
        };
    }

}
