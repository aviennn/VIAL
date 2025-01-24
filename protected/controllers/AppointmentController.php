<?php

class AppointmentController extends Controller
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
				'actions'=>array('admin','delete','listOfAppointments','deleteappointment','updateappointment', 'SeeAppointments', 'DeleteRecord', 'GetDoctorClinics'),
				'users'=>array('super admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('deleteappointment','updateappointment', 'SeeAppointments', 'AcceptAppointment', 'DeleteRecord'),
				'users'=>array('doctor'),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('createAppointmentPatient', 'SeeAppointmentsPatient', 'GetDoctorClinics'),
			'users'=>array('Patient'),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('ListDoctorAppointments', 'AcceptAppointment', 'DeleteRecord'),
			'users'=>array('secretary'),
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
		$model = new Appointment;
	
		// Fetch the list of patients, doctors, and clinics
		$patients = Account::model()->findAllByAttributes(array('account_type_id' => '4'));
		$doctors = Account::model()->findAllByAttributes(array('account_type_id' => '3'));
		$clinics = Clinic::model()->findAll();
	
		$patientOptions = array();
		$doctorOptions = array();
		$clinicOptions = array();
	
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
	
		// Populate clinic dropdown options
		foreach ($clinics as $clinic) {
			$clinicOptions[$clinic->id] = $clinic->clinic;
		}
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if (isset($_POST['Appointment'])) {
			$model->attributes = $_POST['Appointment'];
	
			// Concatenate date and time
			$date = new DateTime($model->appointment_date);
			$time = new DateTime($model->appointment_time = date('H:i:s', strtotime($model->appointment_time)));
			$dateTime = $date->format('Y-m-d') . ' ' . $time->format('H:i:s');
	
			// Check if the selected date and time are available
			if (!$this->isAppointmentAvailable($dateTime)) {
				// Display an error message or handle it as needed
				Yii::app()->user->setFlash('error', 'The selected date and time are not available. Please choose another.');
			} else {
				// Save to the database
				$model->appointment_date_time = $dateTime;
	
				if ($model->save()) {
					$this->redirect(array('view', 'id' => $model->id));
				} else {
					// Display errors if saving fails
					var_dump($model->getErrors()); // Remove this line in production
				}
			}
		}
	
		$this->render('create', array(
			'model' => $model,
			'patients' => $patientOptions,
			'doctors' => $doctorOptions,
			'clinics' => $clinicOptions, // Add clinic options to the view
		));
	}

	public function actionCreateAppointmentPatient()
	{
		$model = new Appointment;
	
		// Fetch the list of doctors and clinics
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
			$clinicOptions[$clinic->id] = $clinic->clinic;
		}
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if (isset($_POST['Appointment'])) {
			$model->attributes = $_POST['Appointment'];
	
			// Automatically set patient_account_id to the currently logged-in patient's ID
			$model->patient_account_id = Yii::app()->user->id;
	
			// Concatenate date and time
			$date = new DateTime($model->appointment_date);
			$time = new DateTime($model->appointment_time = date('H:i:s', strtotime($model->appointment_time)));
			$dateTime = $date->format('Y-m-d') . ' ' . $time->format('H:i:s');
	
			// Check if the selected date and time are available
			if (!$this->isAppointmentAvailable($dateTime)) {
				// Display an error message or handle it as needed
				Yii::app()->user->setFlash('error', 'The selected date and time are not available. Please choose another.');
			} else {
				// Save to the database
				$model->appointment_date_time = $dateTime;
	
				if ($model->save()) {
					$this->redirect(array('view', 'id' => $model->id));
				} else {
					// Display errors if saving fails
					var_dump($model->getErrors()); // Remove this line in production
				}
			}
		}
	
		$this->render('createAppointmentPatient', array(
			'model' => $model,
			'doctors' => $doctorOptions,
			'clinics' => $clinicOptions, // Add clinic options to the view
		));
	}
	
	private function isAppointmentAvailable($dateTime)
	{
		// You need to implement the logic to check if the selected appointment time is available.
		// This may involve querying the database to see if there's already an appointment at the specified time.
		// Adjust the logic based on your database structure and requirements.
		
		$existingAppointment = Appointment::model()->findByAttributes(array('appointment_date_time' => $dateTime));
	
		return ($existingAppointment === null);
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Appointment']))
		{
			$model->attributes=$_POST['Appointment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionAcceptAppointment($id)
	{
		// Load the appointment model
		$model = Appointment::model()->findByPk($id);
	
		// Check if the appointment exists
		if ($model === null) {
			throw new CHttpException(404, 'The requested appointment does not exist.');
		}
	
		// Update the status_id attribute to 1
		$model->status_id = 1;
	
		// Save the changes
		if ($model->save()) {
			Yii::app()->user->setFlash('success', 'Appointment accepted successfully.');
			$this->redirect(Yii::app()->request->urlReferrer);
		} else {
			Yii::app()->user->setFlash('error', 'Error accepting appointment.');
		}
	
		// Redirect back to the update view or any other appropriate action
		$this->redirect(['update', 'id' => $model->id]);
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

	public function actionDeleteAppointment($id)
	{
		$model = $this->loadModel($id);
	 
		$transaction = Yii::app()->db->beginTransaction();
		try {
			$model->delete();
	 
			$transaction->commit();
			Yii::app()->user->setFlash('success', 'Appointment record has been successfully deleted!');
		} catch (Exception $e) {
			$transaction->rollback();
			Yii::app()->user->setFlash('error', 'An error occurred while trying to delete the consultation record. Please try again later.');
		}
	 
		$this->redirect(array('/Appointment/listOfAppointments'));
	}

	public function actionlistOfAppointments()
	{
		$listOfAppointments = Appointment::model()->findAll(
			array(
				'condition' => 'status_id = :statusId',
				'params' => array(':statusId' => 1),
			)
		);

		$this->render('listAppointments',array(
			'listOfAppointments'=>$listOfAppointments,
		));
	}

	public function actionSeeAppointments()
	{
		// Assuming you have a user component and the doctor's account ID is stored in the 'doctor_account_id' field
		$doctorAccountId = Yii::app()->user->getState('doctor_account_id');

		// Fetch appointments for the logged-in doctor
		$criteria = new CDbCriteria;
		$criteria->compare('doctor_account_id', $doctorAccountId);

		$listOfActiveAppointments = Appointment::model()->findAllByAttributes(['status_id' => 1]);
    	$listOfPendingAppointments = Appointment::model()->findAllByAttributes(['status_id' => 3]);

		$this->render('listAppointmentfordoctor', array(
			'listOfActiveAppointments' => $listOfActiveAppointments,
			'listOfPendingAppointments' => $listOfPendingAppointments,
		));
	}

	public function actionSeeAppointmentsPatient()
	{
		// Assuming you have a user component and the patient's account ID is stored in the 'patient_account_id' field
		$patientAccountId = Yii::app()->user->id; // Adjust this based on how you store patient account ID

		// Fetch appointments for the logged-in patient
		$criteria = new CDbCriteria;
		$criteria->compare('patient_account_id', $patientAccountId);
		$listOfAppointments = Appointment::model()->findAll($criteria);

		$this->render('listAppointmentforpatient', array(
			'listOfAppointments' => $listOfAppointments,
		));
	}

	public function actionDeleteRecord($id)
	{
		// Load the model
		$model = Appointment::model()->findByPk($id);

		// Check if the model exists
		if ($model === null) {
			throw new CHttpException(404, 'The requested appointment does not exist.');
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

	public function actionListDoctorAppointments()
{
    // Get the currently logged-in secretary's ID
    $secretaryId = Yii::app()->user->id;
	$listOfActiveAppointments = Appointment::model()->findAllByAttributes(['status_id' => 1]);
	$listOfPendingAppointments = Appointment::model()->findAllByAttributes(['status_id' => 3]);

    // Find the secretary assignment record for the logged-in secretary
    $assignment = Secretary::model()->findByAttributes(array('secretary_id' => $secretaryId));

    if ($assignment) {
        // Get the doctor ID from the assignment
        $doctorId = $assignment->doctor_id;

        // Find the doctor record
        $doctor = Account::model()->findByPk($doctorId);

        if ($doctor) {
            // Get the list of appointments for the doctor
            $appointments = Appointment::model()->findAllByAttributes(array('doctor_account_id' => $doctorId));

            $this->render('listAppointmentforSecretary', array(
                'doctor' => $doctor,
                'listOfActiveAppointments' => $appointments,
				'listOfActiveAppointments' => $listOfActiveAppointments,
    			'listOfPendingAppointments' => $listOfPendingAppointments,
            ));
        } else {
            Yii::app()->user->setFlash('error', 'Doctor not found.');
            $this->redirect(array('/site/index')); // Redirect to an appropriate page
        }
    } else {
        Yii::app()->user->setFlash('error', 'Secretary assignment not found.');
        $this->redirect(array('/site/index')); // Redirect to an appropriate page
    }
}

public function actionGetDoctorClinics()
{
    // Fetch clinic assignments for the selected doctor based on account_id
    $doctorId = Yii::app()->request->getQuery('account_id');
    $clinicAssignments = ClinicAssignment::model()->findAllByAttributes(array('account_id' => $doctorId));
    $clinicOptions = array();

    foreach ($clinicAssignments as $clinicAssignment) {
        $clinic = Clinic::model()->findByPk($clinicAssignment->clinic_id);

        // Check if the clinic exists
        if ($clinic) {
            $clinicOptions[$clinic->id] = $clinic->clinic;
        } else {
            Yii::log('Clinic not found for clinic ID ' . $clinicAssignment->clinic_id, 'error', 'application.controllers.AppointmentController');
        }
    }

    echo CJSON::encode($clinicOptions);
    Yii::app()->end();
}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Appointment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Appointment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Appointment']))
			$model->attributes=$_GET['Appointment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Appointment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Appointment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Appointment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='appointment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
