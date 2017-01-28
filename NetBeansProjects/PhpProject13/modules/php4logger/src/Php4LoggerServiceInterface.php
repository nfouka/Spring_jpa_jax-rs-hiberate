<?php

namespace Drupal\php4logger;

/**
 * Interface Php4LoggerServiceInterface.
 *
 * @package Drupal\php4logger
 */
interface Php4LoggerServiceInterface {

    public function info($info) ; 
    public function warning($warning)  ; 
    public function debug($debug) ; 
}
