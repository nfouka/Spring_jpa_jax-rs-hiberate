<?php

namespace Drupal\app\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\app\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('<br/><br/><br/><div class="progress" data-drupal-progress>
                                            <div class="progress__label">SETUP 1/%x</div>
                                            <div class="progress__track" style="width: 100%">
                                            <div class="progress__bar" style="width: 73%"></div>
                                            <div class="progress__percentage" style="color:red ;">50%</div>
                                            <div class="progress__description" style="color:red ; ">Setup 2 loading ... </div>
                                            </div>  <br/>
                            ', array(
                                    '%x' => 182
                            ))
    ];
  }

}
