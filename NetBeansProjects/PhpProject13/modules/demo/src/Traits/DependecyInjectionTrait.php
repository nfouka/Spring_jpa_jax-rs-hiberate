<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author nadir
 */


namespace Drupal\demo\Traits ;

trait DependecyInjectionTrait {
   
     /**
   * @var \Drupal\user\PrivateTempStoreFactory
   */
  protected $tempStoreFactory;

  /**
   * @var \Drupal\Core\Session\SessionManagerInterface
   */
  private $sessionManager;

  /**
   * @var \Drupal\Core\Session\AccountInterface
   */
  private $currentUser;

  /**
   * @var \Drupal\user\PrivateTempStore
   */
  protected $store;

  
    /**
   * The Database Connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;
  
  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;



  /**
   * Constructs a \Drupal\demo\Form\Multistep\MultistepFormBase.
   *
   * @param \Drupal\user\PrivateTempStoreFactory $temp_store_factory
   * @param \Drupal\Core\Session\SessionManagerInterface $session_manager
   * @param \Drupal\Core\Session\AccountInterface $current_user
   */
  public function __construct(
                        \Drupal\user\PrivateTempStoreFactory $temp_store_factory , 
                        \Drupal\Core\Session\SessionManagerInterface $session_manager, 
                        \Drupal\Core\Session\AccountInterface $current_user , 
                        \Drupal\Core\Database\Connection $database  , 
                        \Drupal\Core\Language\LanguageManagerInterface $langage
                     
                       
          ) {
      
    $this->tempStoreFactory         = $temp_store_factory;
    $this->sessionManager           = $session_manager;
    $this->currentUser              = $current_user;
    $this->database                 = $database ;
    $this->languageManager          = $langage ;
    $this->store                    = $this->tempStoreFactory->get('demo') ;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(\Symfony\Component\DependencyInjection\ContainerInterface $container) {
    return new static(
      $container->get('user.private_tempstore'),
      $container->get('session_manager'),
      $container->get('current_user') , 
      $container->get('database') , 
      $container->get('language_manager')    
    );
  }

}
