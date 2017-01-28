<?php

/**
 * @file
 * Contains \Drupal\demo\Form\Multistep\MultistepOneForm.
 */

namespace Drupal\demo\Form\Multistep;

use Drupal\Core\Form\FormStateInterface;

class MultistepOneForm extends MultistepFormBase {

  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'multistep_form_one';
  }

  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form = parent::buildForm($form, $form_state);
    
    
    
       $form['setup_png'] = array(
           '#markup' => $this->t('<img src="http://localhost/1.png"/>')) ; 
           
           
       $form['setup_form'] = array(
           '#markup' => $this->t('<h2>Identidé(s) Client </h2>')) ; 
       
                       
        $form['some_text'] = array(
           '#markup' => $this->t('<div class="progress" data-drupal-progress>
                    <div class="progress__label">SETUP 1/%x</div>
                    <div class="progress__track" style="width: 100% ; height : 40px ; ">
                    <div class="progress__bar" style="width: 33% ; height : 40px ; "></div></div>
                    <div class="progress__percentage" style="color:red ;">30%</div>
                    <div class="progress__description" style="color:red ; ">Setup 2 loading ... </div>
                    </div>  <br/>
            ', array(
                    '%x' => 1
            ))
                        );

        
        
    $form['frstName'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name'),
      '#required' => TRUE,
      '#default_value' => $this->store->get('frstName') ? $this->store->get('frstName') : '',
    );
    
    
    $form['lastName'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name'),
      '#required' => TRUE,
      '#default_value' => $this->store->get('lastName') ? $this->store->get('lastName') : '',
    );
    
    $form['datenaissance'] = array(
      '#type' => 'date',
      '#title' => t('Date de naissance'),
      '#default_value' => $this->store->get('datenaissance') ? $this->store->get('datenaissance') : '',
    );
    $form['description'] = array(
      '#type' => 'textarea',
      '#title' => t('Description'),
      '#default_value' => $this->store->get('description') ? $this->store->get('description') : '',
    );    
        

    $form['email'] = array(
      '#type' => 'email',
      '#title' => $this->t('Your email address'),
      '#default_value' => $this->store->get('email') ? $this->store->get('email') : '',
    );
    
    $form['develop'] = array(
      '#type' => 'checkbox',
      '#title' => t('I would like to be involved in developing this material'),
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Next >'),
      '#button_type' => 'primary',
      '#weight' => 10,
    );
    
    
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    
      
      $this->store->set('frstName',         $form_state->getValue('frstName'));
      $this->store->set('lastName',         $form_state->getValue('lastName'));
      $this->store->set('datenaissance',    $form_state->getValue('datenaissance'));
      $this->store->set('email',            $form_state->getValue('email'));
      $this->store->set('develop',          $form_state->getValue('develop'));
      
      \Drupal::logger('MultiStep1')->info($this->store->get('frstName')) ; 
      \Drupal::logger('MultiStep1')->info($this->store->get('lastName')) ; 
      \Drupal::logger('MultiStep1')->info($this->store->get('datenaissance')) ; 
      \Drupal::logger('MultiStep1')->info($this->store->get('email')) ; 
      \Drupal::logger('MultiStep1')->info($this->store->get('develop')) ; 
      
    
      $form_state->setRedirect('demo.multistep_two');
  }

}
