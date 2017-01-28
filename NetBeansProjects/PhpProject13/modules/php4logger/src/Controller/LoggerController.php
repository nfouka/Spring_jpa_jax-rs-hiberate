<?php

namespace Drupal\php4logger\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\php4logger\Controller
 */

 
class LoggerController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello() {
   
   
    $ids =   \Drupal::entityQuery('medecin')->execute() ; 
    $entityManager = $this->entityTypeManager()->getStorage('medecin')->loadMultiple($ids); 
      
    \Drupal::service('php4logger.factory')->debug($entityManager ) ; 
    
    
   
    

    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello with parameter(s): $name'),
    ];
  }

}
