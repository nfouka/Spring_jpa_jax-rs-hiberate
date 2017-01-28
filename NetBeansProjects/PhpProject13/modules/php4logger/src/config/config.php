<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    Logger::configure(array(
        'rootLogger' => array(
            'appenders' => array('default'),
        ),
        'appenders' => array(
            'default' => array(
                'class' => 'LoggerAppenderFile',
                'layout' => array(
                    'class' => 'LoggerLayoutSimple'
                ),
                'params' => array(
                	'file' => 'log/log.log',
                	'append' => true
                )
            ),
                'class' => 'LoggerAppenderEcho',
                'layout' => array(
                    'class' => 'LoggerLayoutPattern',
                    'params' => array(
                        'conversionPattern' => '%date %logger %-5level %msg%n'
                    )
                )
        )
    ));




 /*
  \Logger::configure(array(
        'rootLogger' => array(
            'appenders' => array('default'),
        ) , 
      

    array(
        'appenders' => array(
            'default' => array(
                'class' => 'LoggerAppenderEcho',
                'layout' => array(
                    'class' => 'LoggerLayoutPattern',
                    'params' => array(
                        'conversionPattern' => '%date %logger %-5level %msg%n'
                    )
                )
            )
        ),
        'rootLogger' => array(
            'appenders' => array('default')
        ),
    )


    ));  
  
  
  */ 