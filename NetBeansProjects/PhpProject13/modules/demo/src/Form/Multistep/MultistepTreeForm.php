<?php

/**
 * @file
 * Contains \Drupal\demo\Form\Multistep\MultistepTwoForm.
 */

namespace Drupal\demo\Form\Multistep;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class MultistepTreeForm extends MultistepFormBase {

  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'multistep_form_two';
  }

  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form = parent::buildForm($form, $form_state);
    
        $form['setup_png'] = array(
           '#markup' => $this->t('<img src="http://localhost/3.png"/>')) ; 
    
    
        $form['some_text'] = array(
           '#markup' => $this->t('<div class="progress" data-drupal-progress>
                    <div class="progress__label">SETUP 3/%x</div>
                    <div class="progress__track" style="width: 100% ; height : 40px ; ">
                    <div class="progress__bar" style="width: 100% ; height : 40px ; "></div></div>
                    <div class="progress__percentage" style="color:red ; font-size:20px;">100%</div>
                    <div class="progress__description" style="color:red ; ">Setup 3 loading ... </div>
                    </div><br/>
            ', array(
                    '%x' => 3
            ))
                        );
        
    $form['setup_png_logo'] = array(
           '#markup' => $this->t('<img style="width:60%;height:60%;" src="http://localhost/paiement.png"/>')) ; 
                

    $form['code'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Identifiant Bank'),
      '#default_value' => $this->store->get('code') ? $this->store->get('code') : '',
    );

    $form['dateExpiration'] = array(
      '#type' => 'datetime',
      '#title' => $this->t('Date expiration'),
      '#default_value' => $this->store->get('dateExpiration') ? $this->store->get('dateExpiration') : '',
    );
    
     $form['cryptogramme'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Cryptogramme'),
      '#default_value' => $this->store->get('cryptogramme') ? $this->store->get('cryptogramme') : '',
    );
    
    

    $form['actions']['previous'] = array(
      '#type' => 'link',
      '#title' => $this->t('Previous'),
      '#attributes' => array(
        'class' => array('button'),
      ),
      '#weight' => 0,
      '#url' => Url::fromRoute('demo.multistep_two'),
    );

    
     $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Finish'),
      '#button_type' => 'primary',
      '#weight' => 10,
    );
        
        
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    
      $this->store->set('code',                     $form_state->getValue('code'));
      $this->store->set('dateExpiration',           $form_state->getValue('dateExpiration'));
      $this->store->set('cryptogramme',             $form_state->getValue('cryptogramme'));
      
      \Drupal::logger('MultiStep3')->info($this->store->get('frstName')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('lastName')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('datenaissance')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('email')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('develop')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('adress')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('pays')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('codePostale')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('code')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('dateExpiration')) ; 
      \Drupal::logger('MultiStep3')->info($this->store->get('cryptogramme')) ; 

      
      $form_state->setRedirect('demo.demo');
  }
}
