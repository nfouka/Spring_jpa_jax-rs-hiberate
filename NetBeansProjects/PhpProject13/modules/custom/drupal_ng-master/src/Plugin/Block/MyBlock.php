<?php

namespace Drupal\drupal_ng\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'MyBlock' block.
 *
 * @Block(
 *  id = "my_block",
 *  admin_label = @Translation("My block"),
 * )
 */
class MyBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
 
    
     $build['myblock'] = array(
      '#theme' => 'drupal_ng_view',
      '#title' => 'My Block AngularJS',
    );
    $build['myblock']['#attached']['library'][] = 'drupal_ng/angularjs';
    $build['myblock']['#attached']['library'][] = 'drupal_ng/drupal_ng';
    $build['myblock']['#attached']['library'][] = 'drupal_ng/angular.angularjs';
    return $build;
    
    
  }

}
