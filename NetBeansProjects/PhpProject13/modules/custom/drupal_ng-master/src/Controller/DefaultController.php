<?php

namespace Drupal\drupal_ng\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\drupal_ng\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello(\Symfony\Component\HttpFoundation\Request $request ) {
      
       $firstname = $request->request->get('fName'); 
       $lastname = $request->request->get('lName');  
       
        return new \Symfony\Component\HttpFoundation\Response( $firstname.' : '.$lastname ) ; 
  }

}
