<?php

namespace Drupal\angulars\Controller;

use Drupal\Core\Controller\ControllerBase;

class AngularsController extends ControllerBase {

  public function content() {
    
    
    $output['#attached']['library'][] = 'angulars/angulars';
    
    $output[] = $this->sample_5() ; 
    $output[] = $this->sample_2() ; 

    return $output;
    
  }
  /*
   * <div ng-app="myApp">
    <!-- Using directive as HTML attribute -->    
    <div class="gray" enter>Hello</div>
</div>
   */
    
  function addAngular(){
      $build = []  ; 
      $build['content'] = array(
        '#type' => 'markup',
        '#title' => t('AngularJS 3: List des médecins '),
        '#attributes' => array(
          'ng-app' => 'myAppNasir'
      ),
    );
      
     $build['content']['class'] = array(
       '#type' => 'markup',
      '#title' => t('AngularJS 2: List des médecins '),
      '#markup' => '{{ 12 * 526 }}' 
         ) ; 
      
    return $build  ; 
      
  }
  

  function angular() {
     $data = array();
     $data['angular'] = array(
      '#type' => 'details',
      '#title' => t('AngularJS 1: List des médecins '),
      '#open' => false  ,
      '#attributes' => array(
        'ng-app' => 'myAppHttp',
        'ng-controller' => 'customersCtrl',
      ),
    );
     // ng-app="myApp" ng-controller="customersCtrl
      $data['angular']['output'] = array(
          '#markup' => '  <p>My first expression: {{5+5}}</p>
                    <ul>
                            <li ng-repeat="x in myData">
                              Name : {{ x.name }} , Code_commune_INSEE : {{ x.Code_commune_INSEE }} 
                              Code_postal : {{ x.Code_postal }} , Libelle_acheminement : {{ x.Libelle_acheminement }} 
                              Name : {{ x.name }} , Code_commune_INSEE : {{ x.Code_commune_INSEE }} 
                            </li>
                    </ul>'
    );
           
    return $data;
  }
  
  
    function angular2() {
        
 $data['angular2'] = array(
      '#type' => 'details',
      '#title' => t('AngularJS 2 example : '),
      '#open' => false  ,
      '#attributes' => array(
        'ng-app' => 'myApp2',
        'ng-controller' => 'myCtrl2',
      ),
    );
    
        $data['angular2']['input'] = array(
      '#type' => 'textfield',
      '#title' => t('AngularJS 2: List des médecins '),
      '#open' => false  ,
      '#attributes' => array(
          'ng-model' => 'msg'
      ),
    );
        
    $data['angular2']['output'] = array(
          '#markup' => ' <p my-dctv >
          {{msg | myUpperFilter }}
    </p>'
    );
           
    return $data;
  }
  
  
   function sample_2() {
    $data = array();
    $data['sample2'] = array(
      '#type' => 'details',
      '#title' => t('Sample 2: Basic Filter'),
      '#open' => TRUE,
      '#attributes' => array(
        'ng-app' => 'myAppHttp',
        'ng-controller' => 'customersCtrl',
      ),
    );

      $data['sample2']['output'] = array(
          '#markup' => '<p>My first expression: {{5+5}}</p>
                    <ul>
                            <li ng-repeat="x in myData">
                              Name : {{ x.name }} , Code_commune_INSEE : {{ x.Code_commune_INSEE }} 
                              Code_postal : {{ x.Code_postal }} , Libelle_acheminement : {{ x.Libelle_acheminement }} 
                              Name : {{ x.name }} , Code_commune_INSEE : {{ x.Code_commune_INSEE }} 
                            </li>
                    </ul>'
    );
    
    return $data;
  }
  
  
   function sample_5() {
    $data = array();
    $data['sample5'] = array(
      '#type' => 'details',
      '#title' => t('Sample 5: Basic Isolate Scope'),
      '#open' => TRUE,
      '#description' => 'Fields with same class and directive but with different (isolate) scopes.',
      '#attributes' => array(
        'id' => 's5_container',
        'ng-controller' => 's5_ctrl',
      ),
    );
    // Content.
    $data['sample5']['content1'] = array(
      '#markup' => '{{12+52}}',
    );

    return $data;
  }

}  














   