<?php

namespace Drupal\drupal_ng\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'DefaultBlock' block.
 *
 * @Block(
 *  id = "nadir",
 *  admin_label = @Translation("Default block"),
 * )
 */
class DefaultBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
         'name' => $this->t(''),
        ] + parent::defaultConfiguration();

 }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('name'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['name'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['name'] = $form_state->getValue('name');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
   $title = t('Hello!');
    $build['myelement2'] = array(
      '#theme' => 'drupal_ng_view',
      '#title' => 'Block 2 ',
    );
    $build['myelement2']['#attached']['library'][] = 'drupal_ng/angularjs';
    $build['myelement2']['#attached']['library'][] = 'drupal_ng/drupal_ng';
    $build['myelement2']['#attached']['library'][] = 'drupal_ng/angular.angularjs';
    return $build;
  }

}
