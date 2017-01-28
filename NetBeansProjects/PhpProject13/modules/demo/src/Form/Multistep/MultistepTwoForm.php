<?php

/**
 * @file
 * Contains \Drupal\demo\Form\Multistep\MultistepTwoForm.
 */

namespace Drupal\demo\Form\Multistep;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class MultistepTwoForm extends MultistepFormBase {

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
           '#markup' => $this->t('<img src="http://localhost/2.png"/>')) ; 
    
               //https://www.az-fournitures.com/media//CB_Visa_Master_Card-carte-bancaire.jpg
    
        $form['some_text'] = array(
           '#markup' => $this->t('<div class="progress" data-drupal-progress>
                    <div class="progress__label">SETUP 1/%x</div>
                    <div class="progress__track" style="width: 100% ; height : 40px ; ">
                    <div class="progress__bar" style="width: 66% ; height : 40px ; "></div></div>
                    <div class="progress__percentage" style="color:red ; font-size:20px;">65%</div>
                    <div class="progress__description" style="color:red ; ">Setup 2 loading ... </div>
                    </div><br/>
            ', array(
                    '%x' => 2
            ))
                        );

    $form['adress'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Adress'),
      '#default_value' => $this->store->get('adress') ? $this->store->get('adress') : '',
    );
    
    $countries = array(
    'AF'=>'AFGHANISTAN',
    'AL'=>'ALBANIA',
    'DZ'=>'ALGERIA',
    'AS'=>'AMERICAN SAMOA',
    'AD'=>'ANDORRA',
    'AO'=>'ANGOLA',
    'AI'=>'ANGUILLA',
    'AQ'=>'ANTARCTICA',
    'AG'=>'ANTIGUA AND BARBUDA',
    'AR'=>'ARGENTINA',
    'AM'=>'ARMENIA',
    'AW'=>'ARUBA',
    'AU'=>'AUSTRALIA',
    'AT'=>'AUSTRIA',
    'AZ'=>'AZERBAIJAN',
    'BS'=>'BAHAMAS',
    'BH'=>'BAHRAIN',
    'BD'=>'BANGLADESH',
    'BB'=>'BARBADOS',
    'BY'=>'BELARUS',
    'BE'=>'BELGIUM',
    'BZ'=>'BELIZE',
    'BJ'=>'BENIN',
    'BM'=>'BERMUDA',
    'BT'=>'BHUTAN',
    'BO'=>'BOLIVIA',
    'BA'=>'BOSNIA AND HERZEGOVINA',
    'BW'=>'BOTSWANA',
    'BV'=>'BOUVET ISLAND',
    'BR'=>'BRAZIL',
    'IO'=>'BRITISH INDIAN OCEAN TERRITORY',
    'BN'=>'BRUNEI DARUSSALAM',
    'BG'=>'BULGARIA',
    'BF'=>'BURKINA FASO',
    'BI'=>'BURUNDI',
    'KH'=>'CAMBODIA',
    'CM'=>'CAMEROON',
    'CA'=>'CANADA',
    'CV'=>'CAPE VERDE',
    'KY'=>'CAYMAN ISLANDS',
    'CF'=>'CENTRAL AFRICAN REPUBLIC',
    'TD'=>'CHAD',
    'CL'=>'CHILE',
    'CN'=>'CHINA',
    'CX'=>'CHRISTMAS ISLAND',
    'CC'=>'COCOS (KEELING) ISLANDS',
    'CO'=>'COLOMBIA',
    'KM'=>'COMOROS',
    'CG'=>'CONGO',
    'CD'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
    'CK'=>'COOK ISLANDS',
    'CR'=>'COSTA RICA',
    'CI'=>'COTE D IVOIRE',
    'HR'=>'CROATIA',
    'CU'=>'CUBA',
    'CY'=>'CYPRUS',
    'CZ'=>'CZECH REPUBLIC',
    'DK'=>'DENMARK',
    'DJ'=>'DJIBOUTI',
    'DM'=>'DOMINICA',
    'DO'=>'DOMINICAN REPUBLIC',
    'TP'=>'EAST TIMOR',
    'EC'=>'ECUADOR',
    'EG'=>'EGYPT',
    'SV'=>'EL SALVADOR',
    'GQ'=>'EQUATORIAL GUINEA',
    'ER'=>'ERITREA',
    'EE'=>'ESTONIA',
    'ET'=>'ETHIOPIA',
    'FK'=>'FALKLAND ISLANDS (MALVINAS)',
    'FO'=>'FAROE ISLANDS',
    'FJ'=>'FIJI',
    'FI'=>'FINLAND',
    'FR'=>'FRANCE',
    'GF'=>'FRENCH GUIANA',
    'PF'=>'FRENCH POLYNESIA',
    'TF'=>'FRENCH SOUTHERN TERRITORIES',
    'GA'=>'GABON',
    'GM'=>'GAMBIA',
    'GE'=>'GEORGIA',
    'DE'=>'GERMANY',
    'GH'=>'GHANA',
    'GI'=>'GIBRALTAR',
    'GR'=>'GREECE',
    'GL'=>'GREENLAND',
    'GD'=>'GRENADA',
    'GP'=>'GUADELOUPE',
    'GU'=>'GUAM',
    'GT'=>'GUATEMALA',
    'GN'=>'GUINEA',
    'GW'=>'GUINEA-BISSAU',
    'GY'=>'GUYANA',
    'HT'=>'HAITI',
    'HM'=>'HEARD ISLAND AND MCDONALD ISLANDS',
    'VA'=>'HOLY SEE (VATICAN CITY STATE)',
    'HN'=>'HONDURAS',
    'HK'=>'HONG KONG',
    'HU'=>'HUNGARY',
    'IS'=>'ICELAND',
    'IN'=>'INDIA',
    'ID'=>'INDONESIA',
    'IR'=>'IRAN, ISLAMIC REPUBLIC OF',
    'IQ'=>'IRAQ',
    'IE'=>'IRELAND',
    'IL'=>'ISRAEL',
    'IT'=>'ITALY',
    'JM'=>'JAMAICA',
    'JP'=>'JAPAN',
    'JO'=>'JORDAN',
    'KZ'=>'KAZAKSTAN',
    'KE'=>'KENYA',
    'KI'=>'KIRIBATI',
    'KP'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF',
    'KR'=>'KOREA REPUBLIC OF',
    'KW'=>'KUWAIT',
    'KG'=>'KYRGYZSTAN',
    'LA'=>'LAO PEOPLES DEMOCRATIC REPUBLIC',
    'LV'=>'LATVIA',
    'LB'=>'LEBANON',
    'LS'=>'LESOTHO',
    'LR'=>'LIBERIA',
    'LY'=>'LIBYAN ARAB JAMAHIRIYA',
    'LI'=>'LIECHTENSTEIN',
    'LT'=>'LITHUANIA',
    'LU'=>'LUXEMBOURG',
    'MO'=>'MACAU',
    'MK'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
    'MG'=>'MADAGASCAR',
    'MW'=>'MALAWI',
    'MY'=>'MALAYSIA',
    'MV'=>'MALDIVES',
    'ML'=>'MALI',
    'MT'=>'MALTA',
    'MH'=>'MARSHALL ISLANDS',
    'MQ'=>'MARTINIQUE',
    'MR'=>'MAURITANIA',
    'MU'=>'MAURITIUS',
    'YT'=>'MAYOTTE',
    'MX'=>'MEXICO',
    'FM'=>'MICRONESIA, FEDERATED STATES OF',
    'MD'=>'MOLDOVA, REPUBLIC OF',
    'MC'=>'MONACO',
    'MN'=>'MONGOLIA',
    'MS'=>'MONTSERRAT',
    'MA'=>'MOROCCO',
    'MZ'=>'MOZAMBIQUE',
    'MM'=>'MYANMAR',
    'NA'=>'NAMIBIA',
    'NR'=>'NAURU',
    'NP'=>'NEPAL',
    'NL'=>'NETHERLANDS',
    'AN'=>'NETHERLANDS ANTILLES',
    'NC'=>'NEW CALEDONIA',
    'NZ'=>'NEW ZEALAND',
    'NI'=>'NICARAGUA',
    'NE'=>'NIGER',
    'NG'=>'NIGERIA',
    'NU'=>'NIUE',
    'NF'=>'NORFOLK ISLAND',
    'MP'=>'NORTHERN MARIANA ISLANDS',
    'NO'=>'NORWAY',
    'OM'=>'OMAN',
    'PK'=>'PAKISTAN',
    'PW'=>'PALAU',
    'PS'=>'PALESTINIAN TERRITORY, OCCUPIED',
    'PA'=>'PANAMA',
    'PG'=>'PAPUA NEW GUINEA',
    'PY'=>'PARAGUAY',
    'PE'=>'PERU',
    'PH'=>'PHILIPPINES',
    'PN'=>'PITCAIRN',
    'PL'=>'POLAND',
    'PT'=>'PORTUGAL',
    'PR'=>'PUERTO RICO',
    'QA'=>'QATAR',
    'RE'=>'REUNION',
    'RO'=>'ROMANIA',
    'RU'=>'RUSSIAN FEDERATION',
    'RW'=>'RWANDA',
    'SH'=>'SAINT HELENA',
    'KN'=>'SAINT KITTS AND NEVIS',
    'LC'=>'SAINT LUCIA',
    'PM'=>'SAINT PIERRE AND MIQUELON',
    'VC'=>'SAINT VINCENT AND THE GRENADINES',
    'WS'=>'SAMOA',
    'SM'=>'SAN MARINO',
    'ST'=>'SAO TOME AND PRINCIPE',
    'SA'=>'SAUDI ARABIA',
    'SN'=>'SENEGAL',
    'SC'=>'SEYCHELLES',
    'SL'=>'SIERRA LEONE',
    'SG'=>'SINGAPORE',
    'SK'=>'SLOVAKIA',
    'SI'=>'SLOVENIA',
    'SB'=>'SOLOMON ISLANDS',
    'SO'=>'SOMALIA',
    'ZA'=>'SOUTH AFRICA',
    'GS'=>'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
    'ES'=>'SPAIN',
    'LK'=>'SRI LANKA',
    'SD'=>'SUDAN',
    'SR'=>'SURINAME',
    'SJ'=>'SVALBARD AND JAN MAYEN',
    'SZ'=>'SWAZILAND',
    'SE'=>'SWEDEN',
    'CH'=>'SWITZERLAND',
    'SY'=>'SYRIAN ARAB REPUBLIC',
    'TW'=>'TAIWAN, PROVINCE OF CHINA',
    'TJ'=>'TAJIKISTAN',
    'TZ'=>'TANZANIA, UNITED REPUBLIC OF',
    'TH'=>'THAILAND',
    'TG'=>'TOGO',
    'TK'=>'TOKELAU',
    'TO'=>'TONGA',
    'TT'=>'TRINIDAD AND TOBAGO',
    'TN'=>'TUNISIA',
    'TR'=>'TURKEY',
    'TM'=>'TURKMENISTAN',
    'TC'=>'TURKS AND CAICOS ISLANDS',
    'TV'=>'TUVALU',
    'UG'=>'UGANDA',
    'UA'=>'UKRAINE',
    'AE'=>'UNITED ARAB EMIRATES',
    'GB'=>'UNITED KINGDOM',
    'US'=>'UNITED STATES',
    'UM'=>'UNITED STATES MINOR OUTLYING ISLANDS',
    'UY'=>'URUGUAY',
    'UZ'=>'UZBEKISTAN',
    'VU'=>'VANUATU',
    'VE'=>'VENEZUELA',
    'VN'=>'VIET NAM',
    'VG'=>'VIRGIN ISLANDS, BRITISH',
    'VI'=>'VIRGIN ISLANDS, U.S.',
    'WF'=>'WALLIS AND FUTUNA',
    'EH'=>'WESTERN SAHARA',
    'YE'=>'YEMEN',
    'YU'=>'YUGOSLAVIA',
    'ZM'=>'ZAMBIA',
    'ZW'=>'ZIMBABWE',
  );

    $form['pays'] = array(
      '#type' => 'select',
      '#title' => $this->t('Code Postale'),
      '#options' => $countries , 
      '#default_value' => $this->store->get('pays') ? $this->store->get('pays') : '',
    );
    
    
     $form['codePostale'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Code Postale'),
      '#default_value' => $this->store->get('codePostale') ? $this->store->get('codePostale') : '',
    );
    

    $form['actions']['previous'] = array(
      '#type' => 'link',
      '#title' => $this->t('< Previous'),
      '#attributes' => array(
        'class' => array('button'),
      ),
      '#weight' => 0,
      '#url' => Url::fromRoute('demo.multistep_one'),
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
    
      $this->store->set('adress',               $form_state->getValue('adress'));
      $this->store->set('pays',                 $form_state->getValue('pays'));
      $this->store->set('codePostale',          $form_state->getValue('codePostale'));
      
      \Drupal::logger('MultiStep2')->info($this->store->get('frstName')) ; 
      \Drupal::logger('MultiStep2')->info($this->store->get('lastName')) ; 
      \Drupal::logger('MultiStep2')->info($this->store->get('datenaissance')) ; 
      \Drupal::logger('MultiStep2')->info($this->store->get('email')) ; 
      \Drupal::logger('MultiStep2')->info($this->store->get('develop')) ; 
      \Drupal::logger('MultiStep2')->info($this->store->get('adress')) ; 
      \Drupal::logger('MultiStep2')->info($this->store->get('pays')) ; 
      \Drupal::logger('MultiStep2')->info($this->store->get('codePostale')) ; 
      
      $form_state->setRedirect('demo.multistep_tree');
  }
}
