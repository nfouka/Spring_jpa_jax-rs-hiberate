<?php


namespace Drupal\drupal_ng\Controller;
use Drupal\Core\Controller\ControllerBase;

class DrupalNgController extends ControllerBase {

  public function viewDrupalNg() {
    $title = t('Hello!');
    $build['myelement'] = array(
      '#theme' => 'drupal_ng_view',
      '#title' => '',
    );
    $build['myelement']['#attached']['library'][] = 'drupal_ng/angularjs';
    $build['myelement']['#attached']['library'][] = 'drupal_ng/drupal_ng';
    $build['myelement']['#attached']['library'][] = 'drupal_ng/angular.angularjs';
    return $build;
  }
}


