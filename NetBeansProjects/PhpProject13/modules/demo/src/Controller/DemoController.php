<?php

/**
 * @file
 * Contains \Drupal\demo\Controller\DemoController.
 */

namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * DemoController.
 */


class DemoController extends ControllerBase {
    
    
    use \Drupal\pdf\Traits\Html2pdfTrait ; 
    
    
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
  protected $currentUser;

  /**
   * @var \Drupal\user\PrivateTempStore
   */
  protected $store;
  
  /**
   *
   * @var \Drupal\Core\Template\TwigEnvironment 
   */
  protected $twig  ; 


  /**
   * Constructs a \Drupal\demo\Form\Multistep\MultistepFormBase.
   *
   * @param \Drupal\user\PrivateTempStoreFactory $temp_store_factory
   * @param \Drupal\Core\Session\SessionManagerInterface $session_manager
   * @param \Drupal\Core\Session\AccountInterface $current_user
   */
  public function __construct(\Drupal\user\PrivateTempStoreFactory $temp_store_factory, 
            \Drupal\Core\Session\SessionManagerInterface $session_manager, 
            \Drupal\Core\Session\AccountInterface $current_user , 
            \Drupal\Core\Template\TwigEnvironment $twig 
          ) {
    $this->tempStoreFactory = $temp_store_factory;
    $this->sessionManager = $session_manager;
    $this->currentUser = $current_user;

    $this->store = $this->tempStoreFactory->get('demo') ;
    $this->twig = $twig ; 
  }

  /**
   * {@inheritdoc}
   */
  public static function create(\Symfony\Component\DependencyInjection\ContainerInterface $container) {
    return new static(
      $container->get('user.private_tempstore'),
      $container->get('session_manager'),
      $container->get('current_user') , 
      $container->get('twig')
    );
  }
    
 
  public function demo() {
      
      
      $twigFilePath = drupal_get_path('module', 'demo') . '/templates/demo-bootstrap-tabs.html.twig';
      $template = $this->twig->loadTemplate($twigFilePath) ;
      
    $build = array();
    
    $build['description'] = array(
        '#type' => 'markup',
        '#markup' => $this->t('               
<h1><strong class="cdd">@progress_bar % </strong></h1>
<div class="progress-bar">
    <span class="inner"><span class="core" style="width: @progress_bar%;"></span></span>
</div>

                  <br/>
                            ', array(
                                    '@x'            => 182 , 
                                    '@progress_bar' => 53 , 
                                    '@alpha'
                            ))
      );
    
    $build['content'] = array(
      '#type'   => 'markup',
      '#markup' =>  $template->render(
                            array(
                                'frstName'              =>  $this->store->get('frstName') , 
                                'lastName'              =>  $this->store->get('lastName'), 
                                'datenaissance'         =>  $this->store->get('datenaissance') , 
                                'email'                 =>  $this->store->get('email') , 
                                'develop'               =>  $this->store->get('develop') , 
                                'adress'                =>  $this->store->get('adress') , 
                                'pays'                  =>  $this->store->get('pays') , 
                                'codePostale'           =>  $this->store->get('codePostale') , 
                                'code'                  =>  $this->store->get('code') , 
                                'dateExpiration'        =>  $this->store->get('dateExpiration') , 
                                'cryptogramme'          =>  $this->store->get('cryptogramme') , 
                                'percent'               =>  60 , 
                                'message'               => 'its works ' , 
                                'label'                 => 'Label'
                                  )
                                  
                                 )
    );

    $build['#attached']['library'][] = 'demo/mutliStep_js';
    
    
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
    
    
    
    return $build;
  }
  
  public function pdf(){
      	$twigFilePath = drupal_get_path('module', 'demo') . '/templates/demo-bootstrap-tabs.html_1.twig';
  	$template = $this->twig->loadTemplate($twigFilePath);
    
        $this->convertHtmlToPdf($template->render(
                                            array(
                                'frstName'              =>  $this->store->get('frstName')?$this->store->get('frstName'):'' , 
                                'lastName'              =>  $this->store->get('lastName'), 
                                'datenaissance'         =>  $this->store->get('datenaissance') , 
                                'email'                 =>  $this->store->get('email') , 
                                'develop'               =>  $this->store->get('develop') , 
                                'adress'                =>  $this->store->get('adress') , 
                                'pays'                  =>  $this->store->get('pays') , 
                                'codePostale'           =>  $this->store->get('codePostale') , 
                                'code'                  =>  $this->store->get('code') , 
                                'dateExpiration'        =>  $this->store->get('dateExpiration') , 
                                'cryptogramme'          =>  $this->store->get('cryptogramme') 
                )))  ; 
        
    $build = array();
    $build['content'] = array(
            '#markup' => 'html2pdf has been saved.'
    );
    $build['#attached']['library'][] = 'demo/mutliStep_js';
    $this->delete() ; 
    return $build;  
  }
  
  public function delete(){
      $keys = ['frstName','lastName','datenaissance','email','develop','adress','pays','codePostale','code','dateExpiration','cryptogramme']  ; 
      foreach ($keys as $key) {
          $this->store->delete($key) ; 
      }
  }
  
}
