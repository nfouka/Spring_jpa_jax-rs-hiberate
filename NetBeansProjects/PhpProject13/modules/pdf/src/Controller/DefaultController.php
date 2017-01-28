<?php

namespace Drupal\pdf\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\pdf\Controller
 */
class DefaultController extends ControllerBase {
    
    use \Drupal\pdf\Traits\SwiftMailerTrait ; 
    use \Drupal\pdf\Traits\Html2pdfTrait ; 
    
    
	/**
	 * @var TwigEnvironment
	 */
	public $twig;
        private $render  ; 
        /**
	 * Constructor
	 *
	 * @param TwigEnvironment $twig
	 */
	public function __construct(\Drupal\Core\Template\TwigEnvironment $twig  ) {
		$this->twig = $twig; 
              
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function create(\Symfony\Component\DependencyInjection\ContainerInterface $container) {
		return new static($container->get('twig'));
	}

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($name) {
      
      
        $content = "
<link rel='stylesheet' href='http://www.w3schools.com/lib/w3.css'>
<img src='http://www.chu-grenoble.fr/sites/all/themes/acti_main/tpl/img/logo.png' style='text-align:center;' />
<h1 style='color:red;'>LIST DES MEDECINS SUR LA REGION : ".strtoupper($name)."</h1>
    <strong>Dr. Sofiane Merouane </strong>Spécialiste à des maladies du drupal 8 et Symfony
    <br/>
    Adresse : Avenue Maquis du Grésivaudan, 38700 La Tronche
        <br/>
Téléphone : 04 76 76 75 75
<hr/>

<table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Libelle_acheminement</th>
              <th>Code_postal</th>
              <th>Locate</th>
            </tr>
          </thead>
          <tbody>
"; 
        $query = \Drupal::service('entity.query')
                ->get('medecin')
                ->condition('ville_ref', strtoupper($name) ) ; 
        
        $entity_ids = $query->execute();
        $patients = entity_load_multiple('medecin', $entity_ids);
        
        if( !$patients ) {
             $content = '' ; 
             $content = "
                <link rel='stylesheet' href='http://www.w3schools.com/lib/w3.css'>
                <h1 style='color:red;'>LIST DES MEDECINS SUR LA REGION : ".$name."</h1>
                    <code>Généré automatique.</code>
                <hr/><strong>AUCUN RESULTAT TROUVÉE.</strong>"; 
        }else {
     
            $cpt = 0 ; 
            
            
  foreach ($patients as $patient) {
    
      $row_ = "<tr>"
              . "<td>".$patient->id->value."</td>"
              . "<td>".$patient->name->value."</td>"
              . "<td>".$patient->Libelle_acheminement->value."</td>"
              . "<td>".$patient->Code_postal->value."</td>"
              . "<td>".$patient->Nom_commune->value."</td>"
              . "<td>".$patient->Code_commune_INSEE->value."</td>"
             
              . "</tr>" ; 
      $cpt++ ; 
      \Drupal::logger('CONVERTION HTML>PDF')->info( $cpt."/".sizeof($patients).'  : '.$row_) ; 
      $content.= $row_ ; 
  }
      $content.="
   </tbody>
        </table>"  ; 
}

	$twigFilePath = drupal_get_path('module', 'pdf') . '/templates/hello.html.twig';
  	$template = $this->twig->loadTemplate($twigFilePath);
    
    $this->convertHtmlToPdf($template->render(array('name' => $name )))  ; 
    //$this->sendMailSwiftMail('smerouane78@yahoo.fr' , $name ) ; 
    $this->sendMailSwiftMail('nadir.fouka@gmail.com' , $name ) ; 
      
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello with parameter(s): $name'),
    ];
  }
  
  
  
    public function twig($name) {
     
        
    return [
      '#theme' => 'hello_page',
      '#name' => $name
    ];

  }
  
  
  public function sendMailer() {
      
    
$query = \Drupal::service('entity.query')->get('rdv')->condition('status', 1); 
$entity_ids = $query->execute();
$patients = entity_load_multiple('rdv', $entity_ids);
$count = 0 ; 
$patientEventSentMailAndSms = [] ; 

foreach ($patients as $patient) {
     $startdate = $patient->date->value ; 

     $now = new \DateTime() ; 
     $datetime1 = new \DateTime($startdate);
     $remainingDays = $datetime1->diff(new \DateTime())->format('%d');
     

        $query = \Drupal::service('entity.query')->get('medecin')->condition('status', 1); 
        $entity_ids = $query->execute();
        $medecin_ids = array_values($entity_ids) ; 
        $random_tab = [] ; 
        foreach ($medecin_ids as $key => $value) {
            $random_tab[]  = $value ; 
        }

        $size_max = sizeof($medecin_ids) ; 
        $patients = entity_load('medecin', $random_tab[rand(0, sizeof($random_tab))] );
     
    
     if($remainingDays <= 1 ) {
         $patientEventSentMailAndSms[] = array(
                    'email' => $patient->email->value , 
                    'name' => $patient->name->value  , 
                    'rdv_medecin' => $patients
         ) ; 
         
         $count++ ; 
     }
}
 
    
    	$twigFilePath = drupal_get_path('module', 'pdf') . '/templates/hello.html.twig';
  	$template = $this->twig->loadTemplate($twigFilePath);
      

        
          $transport =  
          \Swift_SmtpTransport::newInstance(\Drupal::service('config.factory')->get('swiftmailer.transport')->get('transport').'.gmail.com', 
                 \Drupal::service('config.factory')->get('swiftmailer.transport')->get('smtp_port') ,  "ssl")
      ->setUsername(\Drupal::service('config.factory')->get('swiftmailer.transport')->get('smtp_username'))
      ->setPassword(\Drupal::service('config.factory')->get('swiftmailer.transport')->get('smtp_password'))
    ;
    $name = 'Nadir Fouka' ; 
    $context = array(
        'name' => $name
    ) ; 
    $mailer = \Swift_Mailer::newInstance($transport);
    $message = \Swift_Message::newInstance('Generteur automatique')
       ->setFrom(array('softrain.evaluaciones@gmail.com' => 'List des medecin par région'))
       ->setEncoder(\Swift_Encoding::get8BitEncoding())
       ->setBody($this->twig->render($template, $context) , "text/html")
      ->setTo(array('nadir.fouka@gmail.com'=> 'Doctor'))  ; 


    $mailer->send($message);
    
     
    return [
      '#theme' => 'hello_page',

    ];

  }
  
  
}
