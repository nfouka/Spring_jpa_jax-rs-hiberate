<?php

namespace Drupal\multi_step\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\multi_step\Controller
 */
class DefaultController extends ControllerBase  {
    
    use \Drupal\multi_step\Traits\DI   ;

  public function hello() {

    return [
      '#type' => 'markup',
      '#markup' => $this->t('SETUP %x : <div class="progress__track" style=""><div class="progress__bar" style="width: 30%;"></div></div>', array(
          '%x' => '1/3'
      ))
    ];
  }

}
