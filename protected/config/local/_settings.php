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
      'transportType' => 'smtp',
      'viewPath' => 'application.views.mail',
      'logging' => true,
      'dryRun' => false,
      'transportOptions' => 
      array (
        'host' => 'smtp.gmail.com',
        'username' => 'followedupe@gmail.com',
        'password' => 'javac123',
        'encryption' => 'ssl',
        'port' => '465',
        'options' => 
        array (
          'ssl' => 
          array (
            'allow_self_signed' => true,
            'verify_peer' => false,
          ),
        ),
      ),
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
  'name' => 'FollowEdu',
  'language' => 'pt_br',
  'theme' => 'HumHub',
); ?>