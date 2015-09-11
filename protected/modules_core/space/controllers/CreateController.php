<?php

/**
 * CreateController is responsible for creation of new spaces
 *
 * @author Luke
 * @package humhub.modules_core.space.controllers
 * @since 0.5
 */
class CreateController extends Controller
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->redirect($this->createUrl('create/create'));
    }

    /**
     * Creates a new Space
     */
    public function actionCreate()
    {
		
		//Parte editada por Renan ... CUIDADO =P
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "followedu";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		
		$user_id = Yii::app()->user->id;
		$sql = "SELECT perfil FROM profile WHERE user_id = $user_id";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$perfil = $row["perfil"];
		
		
		$conn->close();
				
		if ($perfil == 1) {
		//if ($user_id = Yii::app()->user->id == 1) {
			
		$model = new Space('edit');

        // Ajax Validation
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'space-create-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['Space'])) {
            $_POST['Space'] = Yii::app()->input->stripClean($_POST['Space']);

            $model->attributes = $_POST['Space'];

            if ($model->validate() && $model->save()) {

                // Save in this user variable, that the workspace was new created
                Yii::app()->user->setState('ws', 'created');

                // Redirect to the new created Space
                $this->htmlRedirect($model->getUrl());
            }
        }

        $this->renderPartial('create', array('model' => $model), false, true);
		
		}else{
			echo '<script>alert("Você não tem permissão para criar grupos!!");</script>';
		}

        
    }

}

?>
