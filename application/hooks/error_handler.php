<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorHandler {
    public function handle_errors() {
        set_error_handler(function($errno, $errstr, $errfile, $errline) {
            // Suppress deprecation notices about dynamic properties
            if ($errno === E_DEPRECATED && strpos($errstr, 'Creation of dynamic property') !== false) {
                return true;
            }
            
            // Let PHP handle all other errors
            return false;
        });
    }
} 