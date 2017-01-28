<?php

namespace Drupal\angulars\Controller;

use Drupal\Core\Controller\ControllerBase;

class AngularsController extends ControllerBase {

  public function content() {
    
    $output['content'] = $this->angular();
    $output['#attached']['library'][] = 'angulars/angulars';
    return $output;
  }
  

  function angular() {
    $data = array();
    
     $data['angular'] = array(
      '#type' => 'details',
      '#title' => t('AngularJS 1: List des médecins '),
      '#open' => FALSE ,
      '#attributes' => array(
        'ng-app' => 'myAppHttp',
        'ng-controller' => 'customersCtrl',
      ),
    );
     
    $data['angular']['png'] = array(
          '#markup' => '<div id="view"></div>'
    );

      $data['angular']['input'] = array(
          '#markup' => ' 
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
  
}  
