<?php

include("../protected/config/common.php");



// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Facebook Application - Admin Panel',
    'theme' => 'shadow_dancer',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'ext.yii-mail.YiiMailMessage',
        'application.components.*',
        'application.extensions/phpthumb.*', // <--- here!
        //'ext.giix-components.*', // giix components
        'application.extensions.awegen.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        /*
          'gii'=>array(
          'class'=>'system.gii.GiiModule',
          'password'=>'admin123',
          // If removed, Gii defaults to localhost only. Edit carefully to taste.

          ),
         */


        /*
          'gii' => array(
          'class' => 'system.gii.GiiModule',
          'password'=>'admin123',
          'generatorPaths' => array(
          'ext.giix-core', // giix generators
          ),
         */


        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '10gXWOqeaf',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            //'ipFilters'=>array('127.0.0.1','::1'),
            'ipFilters' => array($_SERVER['REMOTE_ADDR'])
        ),
        'page'
    ),
    // application components
    'components' => array(
        'authManager' => array(
            'class' => 'CPhpAuthManager',
        //'authFile' => 'path'
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'WebUser',
        ),
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'smtp.sendgrid.net',
                'username' => 'dayseven',
                'password' => '123sendgrid',
                'port' => '25',
            ),
            'viewPath' => 'application.views.mail',
        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=' . $db,
            'emulatePrepare' => true,
            'username' => $user,
            'password' => $pass,
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => '/site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
