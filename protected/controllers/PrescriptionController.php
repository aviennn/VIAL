<?php

class PrescriptionController extends Controller
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
				'actions'=>array('admin','delete','listPrescriptions', 'deletePrescription', 'DeleteRecord'),
				'users'=>array('admin','super admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('listPrescriptionsDoctor', 'createPrescriptionDoctor', 'DeleteRecord'),
				'users'=>array('doctor'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('listPrescriptionsPatient'),
				'users'=>array('patient'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	 public function actionCreate()
	 {
		 $model = new Prescription;
	 
		 // Fetch the list of patients and doctors with full names
		 $patients = Account::model()->findAllByAttributes(array('account_type_id' => '4'));
		 $doctors = Account::model()->findAllByAttributes(array('account_type_id' => '3'));
	 
		 $patientOptions = array();
		 $doctorOptions = array();
	 
		 // Populate patient dropdown options
		 foreach ($patients as $patient) {
			 $fullName = $model->getFullname($patient->id);
			 $patientOptions[$patient->id] = $fullName;
		 }
	 
		 // Populate doctor dropdown options
		 foreach ($doctors as $doctor) {
			 $fullName = $model->getFullname($doctor->id);
			 $doctorOptions[$doctor->id] = $fullName;
		 }
	 
		 // Uncomment the following line if AJAX validation is needed
		 // $this->performAjaxValidation($model);
	 
		 if (isset($_POST['Prescription'])) {
			 $model->attributes = $_POST['Prescription'];
	 
			 $transaction = Yii::app()->db->beginTransaction(); // Start a database transaction
	 
			 try {
				 if ($model->save()) {
					 $transaction->commit(); // Commit the transaction if saving is successful
					 Yii::app()->user->setFlash('success', 'Prescription created successfully.');
					 $this->redirect(array('/prescription/listPrescriptions'));
				 } else {
					 // Display errors if saving fails
					 Yii::app()->user->setFlash('error', 'Failed to create prescription. Please check the form for errors.');
					 var_dump($model->getErrors()); // Remove this line in production
				 }
				} catch (Exception $e) {
					$transaction->rollback(); // Rollback the transaction in case of an exception
					Yii::app()->user->setFlash('error', 'An error occurred while creating the prescription.');
					// Log the exception if needed
					Yii::log('Error creating prescription: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
					$this->redirect(array('/prescription/listPrescriptions')); // Redirect to the index page or another appropriate page
				}
		 }
	 
		 $this->render('create', array(
			 'model' => $model,
			 'patients' => $patientOptions, // Pass the patients variable to the view
			 'doctors' => $doctorOptions,
		 ));
	 }
	 

	 public function actionCreatePrescriptionDoctor()
	 {
		 $model = new Prescription;
	 
		 // Fetch the currently logged-in doctor's ID
		 $loggedInDoctorId = Yii::app()->user->id;
	 
		 // Fetch patients associated with the logged-in doctor through consultation records
		 $consultationRecords = ConsultationRecord::model()->findAllByAttributes(array('doctor_account_id' => $loggedInDoctorId));
	 
		 $patientOptions = array();
	 
		 // Populate patient dropdown options
		 foreach ($consultationRecords as $record) {
			 $patientId = $record->patient_account_id;
			 $fullName = $model->getFullname($patientId);
			 $patientOptions[$patientId] = $fullName;
		 }
	 
		 // Set the doctor_account_id to the currently logged-in doctor
		 $model->doctor_account_id = $loggedInDoctorId;
	 
		 // Uncomment the following line if AJAX validation is needed
		 // $this->performAjaxValidation($model);
	 
		 if (isset($_POST['Prescription'])) {
			 $model->attributes = $_POST['Prescription'];
	 
			 $transaction = Yii::app()->db->beginTransaction(); // Start a database transaction
	 
			 try {
				 if ($model->save()) {
					 $transaction->commit(); // Commit the transaction if saving is successful
					 Yii::app()->user->setFlash('success', 'Prescription created successfully.');
					 $this->redirect(array('/prescription/listPrescriptionsDoctor'));
				 } else {
					 // Display errors if saving fails
					 Yii::app()->user->setFlash('error', 'Failed to create prescription. Please check the form for errors.');
					 var_dump($model->getErrors()); // Remove this line in production
				 }
			 } catch (Exception $e) {
				 $transaction->rollback(); // Rollback the transaction in case of an exception
				 Yii::app()->user->setFlash('error', 'An error occurred while creating the prescription.');
				 // Log the exception if needed
				 Yii::log('Error creating prescription: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
				 $this->redirect(array('/prescription/listPrescriptionsDoctor')); // Redirect to the index page or another appropriate page
			 }
		 }
	 
		 $this->render('createInDoctorAccount', array(
			 'model' => $model,
			 'patients' => $patientOptions, // Pass the patients variable to the view
		 ));
	 }
	 

	 
	public function actionListPrescriptions()
	{
		$listOfPrescriptions = Prescription::model()->findAllByAttributes(array('status_id' => 1));

		$this->render('listPrescriptions',array(
			'listOfPrescriptions'=>$listOfPrescriptions,
		));
	}

	public function actionListPrescriptionsDoctor()
{
    // Get the ID of the currently signed-in doctor
    $doctorId = Yii::app()->user->id;

    // Fetch the list of prescriptions for the signed-in doctor
    $listPrescriptionsDoctor = Prescription::model()->with('patientAccount', 'doctorAccount', 'status')
    ->findAllByAttributes(array('doctor_account_id' => $doctorId, 'status_id' => 1));

    $this->render('listPrescriptionsDoctor', array(
        'listPrescriptionsDoctor' => $listPrescriptionsDoctor,
    ));
}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
{
    $model = $this->loadModel($id);

    // Fetch the list of patients and doctors with full names
    $patients = Account::model()->findAllByAttributes(array('account_type_id' => '4'));
    $doctors = Account::model()->findAllByAttributes(array('account_type_id' => '3'));

    $patientOptions = array();
    $doctorOptions = array();

    // Populate patient dropdown options
    foreach ($patients as $patient) {
        $fullName = $model->getFullname($patient->id);
        $patientOptions[$patient->id] = $fullName;
    }

    // Populate doctor dropdown options
    foreach ($doctors as $doctor) {
        $fullName = $model->getFullname($doctor->id);
        $doctorOptions[$doctor->id] = $fullName;
    }

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['Prescription'])) {
        $model->attributes = $_POST['Prescription'];
        if ($model->save()) {
            $this->redirect(array('prescription/listPrescriptions'));
        } else {
            // Display errors if saving fails
            var_dump($model->getErrors()); // Remove this line in production
        }
    }

    $this->render('update', array(
        'model' => $model,
        'patients' => $patientOptions, // Pass the patients variable to the view
        'doctors' => $doctorOptions,
    ));
}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
{
    $this->loadModel($id)->delete();

    // If AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if (!isset($_GET['ajax'])) {
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}

public function actionDeletePrescription($id)
{
    $model = $this->loadModel($id);

    $transaction = Yii::app()->db->beginTransaction();

    try {
        $model->delete();
        $transaction->commit();
        Yii::app()->user->setFlash('success', 'Prescription has been successfully deleted!');
    } catch (Exception $e) {
        $transaction->rollback();
        Yii::app()->user->setFlash('error', 'An error occurred while trying to delete the prescription. Please try again later.');
    }

    // If AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if (!isset($_GET['ajax'])) {
		$this->redirect(array('/prescription/listPrescriptions'));
    }
}


	public function actionListPrescriptionsPatient()
		{
			// Get the ID of the currently signed-in patient
			$patientId = Yii::app()->user->id;
		
			// Fetch the list of prescriptions for the signed-in patient
			$listPrescriptionsPatient = Prescription::model()->with('patientAccount', 'doctorAccount', 'status')
				->findAllByAttributes(array('patient_account_id' => $patientId));
		
			$this->render('listPrescriptionsPatient', array(
				'listPrescriptionsPatient' => $listPrescriptionsPatient,
			));
		}


		public function actionDeleteRecord($id)
		{
			// Load the Account model
			$accountModel = Prescription::model()->findByPk($id);
		
			// Check if the Account model exists
			if ($accountModel === null) {
				throw new CHttpException(404, 'The requested account does not exist.');
			}
		
			// Update the status_id attribute to 2 for the Account model
			$accountModel->status_id = 2;
		
			// Save the changes
			if ($accountModel->save()) {
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
		$dataProvider=new CActiveDataProvider('Prescription');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prescription('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prescription']))
			$model->attributes=$_GET['Prescription'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Prescription the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Prescription::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Prescription $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prescription-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
