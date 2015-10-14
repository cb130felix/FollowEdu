<?php 


require '/../../../database/datanoob.php';

return array (
  'components' => 
  array (
    'db' => 
    array (
      'connectionString' => 'mysql:host='.$servername.';dbname='.$dbname,
      'username' => $username,
      'password' => $password,
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
        'installer_hostname' => 'localhost',
        'installer_database' => 'followedu',
      ),
    ),
    'installed' => true,
  ),
  'name' => 'HumHub',
  'language' => 'pt_br',
  'theme' => 'HumHub',
); ?>