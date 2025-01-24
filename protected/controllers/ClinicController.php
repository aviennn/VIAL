<?php

class ClinicController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'listClinic', 'updateClinic', 'assignclinic','listclinicassignment','UpdateClinicAssignment', 'DeleteRecord', 'DeleteRecordAssignment', 'ViewClinicAssignment'),
				'users'=>array('admin','super admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('listClinicsForDoctor'),
				'users'=>array('doctor'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionViewClinicAssignment($id)
	{
		$model = ClinicAssignment::model()->findByPk($id);
	
		if ($model === null) {
			throw new CHttpException(404, 'The requested clinic assignment does not exist.');
		}
	
		$this->render('viewClinicAssignment', array(
			'model' => $model,
		));
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Clinic;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$listOfClinic = Clinic::model()->findAll();

		if(isset($_POST['Clinic']))
		{
			$model->attributes=$_POST['Clinic'];
			if($model->save())
				$this->redirect(array('clinic/listClinic'));
		}

		$this->render('create',array(
			'model'=>$model,
			'listOfClinic'=>$listOfClinic,
		));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionupdateClinic($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Clinic']))
		{
			$model->attributes=$_POST['Clinic'];
			if($model->save())
				$this->redirect(array('clinic/listClinic'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	
	public function actionListClinic()
	{
		$listOfClinic = Clinic::model()->findAll(array(
			'condition' => 'status_id = 1',
		));

		$this->render('listClinic',array(
			'listOfClinic'=>$listOfClinic,
		));
	}

	public function actionListClinicsForDoctor()
	{
		$doctorId = Yii::app()->user->id; // Assuming user ID represents the doctor ID.
	
		// Assuming ClinicAssignment model is associated with the clinic_assignment table
		$clinicAssignments = ClinicAssignment::model()->findAll(array(
			'condition' => 'account_id=:account_id',
			'params' => array(
				':account_id' => $doctorId,
			),
		));
	
		$clinicIds = array(); // Array to store clinic IDs
	
		foreach ($clinicAssignments as $assignment) {
			$clinicIds[] = $assignment->clinic_id;
		}
	
		// Now fetch the clinics based on the clinic IDs
		$clinics = Clinic::model()->findAllByAttributes(array('id' => $clinicIds));
	
		$this->render('listClinicsForDoctor', array(
			'clinics' => $clinics,
		));
	}

	public function actionAssignClinic()
{
    $model = new ClinicAssignment;

    // Fetch the list of doctors and clinics with full names
    $doctors = Account::model()->findAllByAttributes(array('account_type_id' => '3'));
    $clinics = Clinic::model()->findAll();

    $doctorOptions = array();
    $clinicOptions = array();

    // Populate doctor dropdown options
	foreach ($doctors as $doctor) {
		$fullName = $model->getFullname($doctor->id);
		$doctorOptions[$doctor->id] = $fullName;
	}

    // Populate clinic dropdown options
    foreach ($clinics as $clinic) {
        $clinicOptions[$clinic->id] = $clinic->clinic; // Use the clinic attribute
    }

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['ClinicAssignment'])) {
        // Output the POST data for debugging
        var_dump($_POST['ClinicAssignment']);

        $model->attributes = $_POST['ClinicAssignment'];

        $transaction = Yii::app()->db->beginTransaction(); // Start a database transaction

        try {
            if ($model->save()) {
                $transaction->commit(); // Commit the transaction if saving is successful
                Yii::app()->user->setFlash('success', 'Doctor assigned to clinic successfully.');
                $this->redirect(array('clinic/listClinicAssignment')); // Redirect to an appropriate page
            } else {
                // Display errors if saving fails
                Yii::app()->user->setFlash('error', 'Failed to assign doctor to clinic. Please check the form for errors.');
                var_dump($model->getErrors()); // Remove this line in production
            }
        } catch (Exception $e) {
            $transaction->rollback(); // Rollback the transaction in case of an exception
            Yii::app()->user->setFlash('error', 'An error occurred while assigning doctor to clinic.');
            // Log the exception if needed
            Yii::log('Error assigning doctor to clinic: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
            $this->redirect(array('clinic/listClinicAssignment')); // Redirect to an appropriate page
        }
    }

    $this->render('assignClinic', array(
        'model' => $model,
        'doctors' => $doctorOptions, // Pass the doctors variable to the view
        'clinics' => $clinicOptions,
    ));
}

public function actionListClinicAssignment()
{
    $clinicAssignments = ClinicAssignment::model()->findAll(array(
		'condition' => 'status_id = :statusId',
		'params' => array(':statusId' => 1),
	));

    // Add status_id = 1 to each clinic assignment

    $doctors = Account::model()->findAllByAttributes(array('account_type_id' => '3'));
    $clinics = Clinic::model()->findAll();

    $doctorOptions = array();
    $clinicOptions = array();

    foreach ($doctors as $doctor) {
        $user = User::model()->findByAttributes(array('account_id' => $doctor->id));
		$fullName = $user->getFullname($doctor->id);
        $doctorOptions[$doctor->id] = $fullName;
    }

    foreach ($clinics as $clinic) {
        $clinicOptions[$clinic->id] = $clinic->clinic;
    }

    // Ensure that all doctors are included in $doctorOptions
    foreach ($clinicAssignments as $modelValue) {
        $doctorAccountId = $modelValue->account_id;
        if (!isset($doctorOptions[$doctorAccountId])) {
            // If the doctor is not in $doctorOptions, fetch and add them
            $user = User::model()->findByAttributes(array('account_id' => $doctorAccountId));
            $fullName = $user ? $user->getFullname($user->id) : 'Unknown';
            $doctorOptions[$doctorAccountId] = $fullName;
        }
    }

    $this->render('listClinicAssignment', array(
        'clinicAssignments' => $clinicAssignments,
        'doctorOptions' => $doctorOptions,
        'clinicOptions' => $clinicOptions,
    ));
}


public function actionUpdateClinicAssignment($id)
{
    // Find the existing ClinicAssignment model by primary key
    $model = ClinicAssignment::model()->findByPk($id);

    if ($model === null) {
        throw new CHttpException(404, 'The requested clinic assignment does not exist.');
    }

    $doctors = Account::model()->findAllByAttributes(array('account_type_id' => '3'));
    $clinics = Clinic::model()->findAllByAttributes(array('status_id' => 1));

    $doctorOptions = array();
    $clinicOptions = array();

    foreach ($doctors as $doctor) {
        $user = User::model()->findByAttributes(array('account_id' => $doctor->id));
        $fullName = $user->getFullname($doctor->id);
        $doctorOptions[$doctor->id] = $fullName;
    }

    foreach ($clinics as $clinic) {
        $clinicOptions[$clinic->id] = $clinic->clinic;
    }

	if (isset($_POST['ClinicAssignment'])) {
		// Update only if the model is loaded and the submitted data is valid
		$model->attributes = $_POST['ClinicAssignment'];
		if ($model->save()) {
			Yii::app()->user->setFlash('success', 'Clinic assignment updated successfully.');
			$this->redirect(array('clinic/listClinicAssignment'));  // Redirect to index or any other desired page
		}
	}

    $this->render('updateClinicAssignment', array(
        'model' => $model,
        'doctors' => $doctorOptions,
        'clinics' => $clinicOptions,
    ));
}


protected function loadClinicAssignmentModel($id)
{
    $model = ClinicAssignment::model()->findByPk($id);

    if ($model === null) {
        throw new CHttpException(404, 'The requested page does not exist.');
    }

    return $model;
}

public function actionDeleteRecordAssignment($id)
    {
        $model = ClinicAssignment::model()->findByPk($id); 

        if ($model !== null) {
            ClinicAssignment::model()->updateByPk($id, array('status_id' => 2));


            if (Yii::app()->user->name == 'super admin' || Yii::app()->user->name == 'admin'){
                $this->redirect(array('listClinicAssignment')); // Redirect to the view page, adjust as needed
            } 
        } else {
            // Handle the case when the model is not found
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }


	public function actionDeleteRecord($id)
	{
		// Load the model
		$model = Clinic::model()->findByPk($id);

		// Check if the model exists
		if ($model === null) {
			throw new CHttpException(404, 'The requested clinic assignment does not exist.');
		}

		// Update the status_id attribute to 2
		$model->status_id = 2;

		// Save the changes
		if ($model->save()) {
			Yii::app()->user->setFlash('success', 'The data has been "deleted."');
		} else {
			Yii::app()->user->setFlash('error', 'Error updating status.');
		}

		// Redirect to any appropriate action
		$this->redirect(Yii::app()->request->urlReferrer); // Change 'index' to the desired action
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Clinic');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Clinic('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Clinic']))
			$model->attributes=$_GET['Clinic'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Clinic the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Clinic::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Clinic $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='clinic-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
