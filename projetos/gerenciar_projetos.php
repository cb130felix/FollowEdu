<?php

    
require_once '../database/datanoob.php';
require_once('../protected/vendors/yii/yii.php');

Yii::createWebApplication('../protected/config/main.php');
$user_id = Yii::app()->user->id;
echo $user_id;



?>
