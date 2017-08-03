<?php
/*
Plugin Name: Get Error Message There
Plugin URI: http://wp.reedom.com/software/wordpress-plugins/get-error-message-there
Description: Display comment posting error message within the editing page.
Author: reedom
Version: 0.94
Author URI: http://wp.reedom.com/software/
*/ 

require(dirname(__FILE__) . '/wp-gemt-common.php');

function gemt_inject_ajax() {
    $js_uri = gemt_rel_uri() . '/wp-gemt.js.php';
    wp_register_script('jquery-form', '/wp-includes/js/jquery/jquery.form.js', array('jquery'));
    wp_register_script('wp-gemt', $js_uri, array('jquery-form'));
    wp_print_scripts('wp-gemt');
    //gemt_put_css();
}

function gemt_put_css() {
    $gemt_base = gemt_rel_uri();
    echo <<<EOL
<link type="text/css" rel="stylesheet" href="$gemt_base/wp-gemt.css" />
EOL;
}

add_action('comment_form', 'gemt_inject_ajax');

?>