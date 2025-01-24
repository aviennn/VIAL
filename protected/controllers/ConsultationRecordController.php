<?php

class ConsultationRecordController extends Controller
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
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('super admin','delete', 'listofconsultationrecord', 'deleteconsultationrecord', 'DeleteRecord', 'AddFormPrescription'),
				'users'=>array('super admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('createForDoctor','listOfConsultationRecordForDoctor','createForDoctorNew','DeleteRecord', 'AddFormPrescription'),
				'users'=>array('doctor'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('listofconsultationrecordpatient'),
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

	 // Inside your Account model

	 public function actionAddFormPrescription()
	 {
		 // Assuming you have a model for the form, replace 'YourFormModel' with the actual model class name
		 $prescription = new Prescription;
	 
		 // Assuming you have a view file for the form, replace '_your_form_view' with the actual view file
		 $PrescriptionForm = $this->renderPartial('_prescriptionForm', array('form' => new CActiveForm($prescription), 'prescription' => $prescription), true);
	 
		 // Return the form HTML
		 echo $PrescriptionForm;
		 Yii::app()->end();
	 }
 
	 public function actionCreate()
	 {
		$model = new ConsultationRecord;
		$prescription = new Prescription;
	 
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
	 
		 try {
			 if (isset($_POST['ConsultationRecord'])) {
				 $model->attributes = $_POST['ConsultationRecord'];
	 
				 if ($model->save()) {
					 // Save prescription if requested
					 if (!empty($_POST['Prescription']) && array_filter($_POST['Prescription'])) {
						 $prescription->attributes = $_POST['Prescription'];
						 $prescription->consultation_id = $model->id; // Link to consultation record
						 $prescription->patient_account_id = $model->patient_account_id; // Save patient_account_id
						 $prescription->doctor_account_id = $model->doctor_account_id; // Save doctor_account_id
						 $prescription->date_of_prescription = $model->date_of_consultation; // Set date_of_prescription to date_of_consultation
						 $prescription->status_id = 1;
	 
						 if (!$prescription->save()) {
							 // Handle prescription save error
							 var_dump($prescription->getErrors()); // Remove this line in production
						 }
					 }
	 
					 $this->redirect(array('view', 'id' => $model->id));
				 } else {
					 // Display errors if saving fails
					 var_dump($model->getErrors()); // Remove this line in production
				 }
			 }
		 } catch (CException $e) {
			 // Handle exceptions
			 echo 'Transaction failed: ' . $e->getMessage();
		 }
	 
		 $this->render('create', array(
			 'model' => $model,
			 'patients' => $patientOptions,
			 'doctors' => $doctorOptions,
			 'prescription' => $prescription,
		 ));
	 }
	 

	 
	 
	 public function actionCreateForDoctor()
{
    // Fetch the currently logged-in doctor's ID
    $loggedInDoctorId = Yii::app()->user->id;

    $model = new ConsultationRecord;
	$prescription = new Prescription;

    // Fetch the list of consultation records associated with the logged-in doctor
    $consultationRecords = ConsultationRecord::model()->findAllByAttributes(array('doctor_account_id' => $loggedInDoctorId));

    $patientOptions = array();

    // Populate patient dropdown options
    foreach ($consultationRecords as $record) {
        $patientId = $record->patient_account_id;
        $fullName = Account::model()->findByPk($patientId)->user->getFullname($patientId);
        $patientOptions[$patientId] = $fullName;
    }

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

	try {
		if (isset($_POST['ConsultationRecord'])) {
			$model->attributes = $_POST['ConsultationRecord'];
			$model->doctor_account_id = $loggedInDoctorId;

			if ($model->save()) {
				// Save prescription if requested
				if (!empty($_POST['Prescription']) && array_filter($_POST['Prescription'])) {
					$prescription->attributes = $_POST['Prescription'];
					$prescription->consultation_id = $model->id; // Link to consultation record
					$prescription->patient_account_id = $model->patient_account_id; // Save patient_account_id
					$prescription->doctor_account_id = $model->doctor_account_id; // Save doctor_account_id
					$prescription->date_of_prescription = $model->date_of_consultation; // Set date_of_prescription to date_of_consultation
					$prescription->status_id = 1;

					if (!$prescription->save()) {
						// Handle prescription save error
						var_dump($prescription->getErrors()); // Remove this line in production
					}
				}

				$this->redirect(array('view', 'id' => $model->id));
			} else {
				// Display errors if saving fails
				var_dump($model->getErrors()); // Remove this line in production
			}
		}
	} catch (CException $e) {
		// Handle exceptions
		echo 'Transaction failed: ' . $e->getMessage();
	}

    $this->render('createForDoctor', array(
        'model' => $model,
        'patients' => $patientOptions,
        'loggedInDoctorId' => $loggedInDoctorId,
		'prescription' => $prescription,
    ));
}

public function actionCreateForDoctorNew()
{
    // Fetch the currently logged-in doctor's ID
    $loggedInDoctorId = Yii::app()->user->id;

    $model = new ConsultationRecord;
	$prescription = new Prescription;

    // Fetch the list of consultation records associated with the logged-in doctor
    $consultationRecords = ConsultationRecord::model()->findAllByAttributes(array('doctor_account_id' => $loggedInDoctorId));

    $patientOptions = array();

    // Populate patient dropdown options
    foreach ($consultationRecords as $record) {
        $patientId = $record->patient_account_id;
        $fullName = Account::model()->findByPk($patientId)->user->getFullname($patientId);
        $patientOptions[$patientId] = $fullName;
    }

    // Check if the patientId is passed in the URL
    if (isset($_GET['patientId'])) {
        // Automatically fill in the patient ID
        $model->patient_account_id = $_GET['patientId'];
    }

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    try {
		if (isset($_POST['ConsultationRecord'])) {
			$model->attributes = $_POST['ConsultationRecord'];
			$model->doctor_account_id = $loggedInDoctorId;

			if ($model->save()) {
				// Save prescription if requested
				if (!empty($_POST['Prescription']) && array_filter($_POST['Prescription'])) {
					$prescription->attributes = $_POST['Prescription'];
					$prescription->consultation_id = $model->id; // Link to consultation record
					$prescription->patient_account_id = $model->patient_account_id; // Save patient_account_id
					$prescription->doctor_account_id = $model->doctor_account_id; // Save doctor_account_id
					$prescription->date_of_prescription = $model->date_of_consultation; // Set date_of_prescription to date_of_consultation
					$prescription->status_id = 1;

					if (!$prescription->save()) {
						// Handle prescription save error
						var_dump($prescription->getErrors()); // Remove this line in production
					}
				}

				$this->redirect(array('view', 'id' => $model->id));
			} else {
				// Display errors if saving fails
				var_dump($model->getErrors()); // Remove this line in production
			}
		}
	} catch (CException $e) {
		// Handle exceptions
		echo 'Transaction failed: ' . $e->getMessage();
	}

    $this->render('createForDoctorNew', array(
        'model' => $model,
        'patients' => $patientOptions,
        'loggedInDoctorId' => $loggedInDoctorId,
		'prescription' => $prescription,
    ));
}


	 public function actionDeleteConsultationRecord($id)
	 {
		 $model = $this->loadModel($id);
	 
		 $transaction = Yii::app()->db->beginTransaction();
		 try {
			 $model->delete();
	 
			 $transaction->commit();
			 Yii::app()->user->setFlash('success', 'Consultation record has been successfully deleted!');
		 } catch (Exception $e) {
			 $transaction->rollback();
			 Yii::app()->user->setFlash('error', 'An error occurred while trying to delete the consultation record. Please try again later.');
		 }
	 
		 $this->redirect(array('/consultationRecord/listOfConsultationRecord'));
	 }
	 


	 public function actionlistOfConsultationRecord()
	 {
		 // Assuming 'status' is a field in the ConsultationRecord model
		 $listOfConsultationRecord = ConsultationRecord::model()->findAllByAttributes(array('status_id' => 1));
	 
		 $this->render('listConsultationRecord', array(
			 'listOfConsultationRecord' => $listOfConsultationRecord,
		 ));
	 }
	 

	public function actionlistOfConsultationRecordForDoctor()
{
    // Fetch the currently logged-in doctor's ID
    $loggedInDoctorId = Yii::app()->user->id;

    // Use a criteria to filter consultation records for the logged-in doctor and status_id = 1
    $criteria = new CDbCriteria;
    $criteria->compare('doctor_account_id', $loggedInDoctorId);
    $criteria->compare('status_id', 1);  // Add this line to filter by status_id = 1

    // Find consultation records that match the criteria
    $listOfConsultationRecord = ConsultationRecord::model()->findAll($criteria);

    $this->render('listConsultationRecord', array(
        'listOfConsultationRecord' => $listOfConsultationRecord,
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

    if (isset($_POST['ConsultationRecord'])) {
        $model->attributes = $_POST['ConsultationRecord'];
        if ($model->save()) {
            $this->redirect(array('consultationRecord/listOfConsultationRecord'));
        } else {
            // Display errors if saving fails
            var_dump($model->getErrors()); // Remove this line in production
        }
    }

    $this->render('update', array(
        'model' => $model,
        'patients' => $patientOptions,
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionListOfConsultationRecordPatient()
	{
		// Get the ID of the currently signed-in patient
		$patientId = Yii::app()->user->id;
	
		// Fetch the list of consultation records for the signed-in patient
		$listOfConsultationRecordPatient = ConsultationRecord::model()->findAllByAttributes(
			array(
				'patient_account_id' => $patientId,
				'status_id' => 1,
			)
		);
		
	
		$this->render('listConsultationRecordPatient', array(
			'listOfConsultationRecordPatient' => $listOfConsultationRecordPatient,
		));
	}

	public function actionDeleteRecord($id)
	 {
		 // Load the Account model
		 $accountModel = ConsultationRecord::model()->findByPk($id);
	 
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
		$dataProvider=new CActiveDataProvider('ConsultationRecord');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ConsultationRecord('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ConsultationRecord']))
			$model->attributes=$_GET['ConsultationRecord'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ConsultationRecord the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ConsultationRecord::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ConsultationRecord $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='consultation-record-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
