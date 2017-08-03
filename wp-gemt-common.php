<?php
// This file is part of a WordPress plugin, `Get Error Message There'.
// version: 0.94

if (!function_exists('get_settings')) {
    require(dirname(__FILE__) . '/../../../wp-config.php');
}

if (!function_exists('gemt_rel_uri')) {
    function gemt_rel_uri() {
        $dir = str_replace('\\', '/', dirname(__FILE__));
        return rtrim(get_settings('siteurl'), '/') . strstr($dir, '/wp-content/');
    }
}

?>