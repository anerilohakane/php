<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

// Register error handler hook
$hook['pre_system'][] = array(
    'class'    => 'ErrorHandler',
    'function' => 'handle_errors',
    'filename' => 'error_handler.php',
    'filepath' => 'hooks'
);
