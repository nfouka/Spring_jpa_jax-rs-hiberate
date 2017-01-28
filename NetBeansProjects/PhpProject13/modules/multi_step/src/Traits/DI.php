<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\multi_step\Traits ;


Trait DI {
     /**
   * @var \Drupal\user\PrivateTempStoreFactory
   */  
    
  protected $tempStore;
     /**
   * @var \Drupal\Core\Session\SessionManagerInterface
   */
  private $sessionManager;

  /**
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * @var \Drupal\user\PrivateTempStore
   */
  protected $store;

    
 // Pass the dependency to the object constructor
  public function __construct(\Drupal\user\PrivateTempStoreFactory $temp_store_factory , 
                            \Drupal\Core\Session\SessionManagerInterface $session_manager, 
                            \Drupal\Core\Session\AccountInterface $current_user
          ) {
    $this->tempStore = $temp_store_factory ; 
     $this->sessionManager = $session_manager;
    $this->currentUser = $current_user;
    $this->store = $this->tempStore->get('multi_step');
  }
  
  
  // Uses Symfony's ContainerInterface to declare dependency to be passed to constructor
  public static function create(\Symfony\Component\DependencyInjection\ContainerInterface $container) {
    return new static(
      $container->get('user.private_tempstore'),
      $container->get('session_manager'),
      $container->get('current_user')
    );
  }
}
