<?php

namespace Drupal\php4logger;

/**
 * Class Php4LoggerService.
 *
 * @package Drupal\php4logger
 */
class Php4LoggerService implements Php4LoggerServiceInterface {
    
    private $logger  ; 
    
    public function __construct($name) {
        include __DIR__.'/config/config.php' ; 
        $this->logger = \Logger::getLogger($name);
    }  
    public function info($info) {
         $this->logger->info($info) ;
    }

    public function warning($warning) {
         $this->logger->warn($warning);
       
    }
    
    public function debug($debug) {
         $this->logger->debug($debug);
       
    }

}