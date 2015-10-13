<?php return array (
  'components' => 
  array (
    'db' => 
    array (
	//remoto e tal teste...
      'connectionString' => 'mysql:host=renanfelixrodrigues.com.br;dbname=renan549_followedu',
      'username' => 'renan549_upe',
      'password' => 'upe2015',
    ),
    'cache' => 
    array (
      'class' => 'CFileCache',
    ),
    'user' => 
    array (
    ),
    'mail' => 
    array (
      'class' => 'ext.yii-mail.YiiMail',
      'transportType' => 'php',
      'viewPath' => 'application.views.mail',
      'logging' => true,
      'dryRun' => false,
    ),
  ),
  'params' => 
  array (
    'installer' => 
    array (
      'db' => 
      array (
        'installer_hostname' => 'renanfelixrodrigues.com.br',
        'installer_database' => 'renan549_followedu',
      ),
    ),
    'installed' => true,
  ),
  'name' => 'FollowEdu',
  'language' => 'pt_br',
  'theme' => 'HumHub',
); ?>