<?php

namespace fmihel\test;

class MushroomHooks
{
    public static function afterInstall($params)
    {
        // some actions on after install your package...
        error_log('afterInstall');
    }

    public static function afterUpdate($params)
    {
        // some actions on after update your package...
        error_log('afterUpdate');
    }
}
