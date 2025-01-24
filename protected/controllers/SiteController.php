<?php

class SiteController extends Controller
{
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
            array('allow',
                'actions'=>array('login'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index', 'logout'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users

                'users'=>array('*'),

            ),
        );
    }


	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		 // Get the currently logged-in secretary's ID
		 $secretaryId = Yii::app()->user->id;
		 $listOfActiveAppointments = Appointment::model()->findAllByAttributes(['status_id' => 1]);
		 $listOfPendingAppointments = Appointment::model()->findAllByAttributes(['status_id' => 3]);
	 
		 // Find the secretary assignment record for the logged-in secretary
		 $assignment = Secretary::model()->findByAttributes(array('secretary_id' => $secretaryId));

		// Get the secretary's assignments
		$assignments = Secretary::model()->findAllByAttributes(array(
			'secretary_id' => Yii::app()->user->id, // Assuming Yii::app()->user->id is the secretary's user ID
			'status_id' => 1, // Assuming 1 is the status for active assignments
		));
	
		$assignedPatients = array();
	
		foreach ($assignments as $assignment) {
			// Fetch the doctor's patients based on the assignment
			$doctorId = $assignment->doctor_id;
			$patients = ConsultationRecord::model()->findAllByAttributes(array(
				'doctor_account_id' => $doctorId,
				'status_id' => 1, // Assuming 1 is the status for active patients
			));
	
			foreach ($patients as $patient) {
				// Assuming you have a 'patient_account_id' attribute in your consultation record
				$patientAccount = Account::model()->findByPk($patient->patient_account_id);
	
				if ($patientAccount) {
					$assignedPatients[] = $patientAccount;
				}
			}
		}

		// Assuming you have a user component and the patient's account ID is stored in the 'patient_account_id' field
		$patientAccountId = Yii::app()->user->id; // Adjust this based on how you store patient account ID

		// Fetch appointments for the logged-in patient
		$criteria = new CDbCriteria;
		$criteria->compare('patient_account_id', $patientAccountId);
		$listOfAppointments = Appointment::model()->findAll($criteria);

		// Get the ID of the currently signed-in patient
		$patientId = Yii::app()->user->id;
	
		// Fetch the list of consultation records for the signed-in patient
		$listOfConsultationRecordPatient = ConsultationRecord::model()->findAllByAttributes(array('patient_account_id' => $patientId));

		// Get the ID of the currently signed-in patient
		$patientId = Yii::app()->user->id;
		
		// Fetch the list of prescriptions for the signed-in patient
		$listPrescriptionsPatient = Prescription::model()->with('patientAccount', 'doctorAccount', 'status')
			->findAllByAttributes(array('patient_account_id' => $patientId));

		// Assuming you have a user component and the doctor's account ID is stored in the 'doctor_account_id' field
		$doctorAccountId = Yii::app()->user->getState('doctor_account_id');

		// Fetch appointments for the logged-in doctor
		$criteria = new CDbCriteria;
		$criteria->compare('doctor_account_id', $doctorAccountId);

    	$listOfPendingAppointments = Appointment::model()->findAllByAttributes(['status_id' => 3]);

		//For Consultation Recors | DOCTOR DASHBOARD
		$consultationRecords = ConsultationRecord::model()->findAllByAttributes(array(
			'doctor_account_id' => Yii::app()->user->id,
			'status_id' => 1, 
		));
	
		$activePatients = array();
	
		foreach ($consultationRecords as $record) {
			// Assuming you have a 'patient_account_id' attribute in your consultation record
			$patientAccount = Account::model()->findByPk($record->patient_account_id);
	
			if ($patientAccount) {
				$activePatients[] = $patientAccount;
			}
		}

		$doctorCount = Account::model()->count(array(
			'condition' => 'account_type_id = :doctorId',
			'params' => array(':doctorId' => 3),
		));
	
		$patientCount = Account::model()->count(array(
			'condition' => 'account_type_id = :patientId',
			'params' => array(':patientId' => 4),
		));
	
		$secretaryCount = Account::model()->count(array(
			'condition' => 'account_type_id = :secretaryId',
			'params' => array(':secretaryId' => 5),
		));

		$clinicCount = Clinic::model()->count(array(
			'select' => 'COUNT(DISTINCT id)',
		));
		
		
		$userRole = '';
		if (!empty(Yii::app()->user->account_type_id)) {
			switch (Yii::app()->user->account_type_id) {
				case 1:
					$userRole = 'admin';
					break;
				case 3:
					$userRole = 'doctor';
					break;
				case 4:
					$userRole = 'patient';
					break;
				case 5:
					$userRole = 'secretary';
					break;
			}
		}
		// Fetch the currently logged-in doctor's ID
		$loggedInDoctorId = Yii::app()->user->id;

		// Use a criteria to filter consultation records for the logged-in doctor
		$criteria = new CDbCriteria;
		$criteria->compare('doctor_account_id', $loggedInDoctorId);
	
		// Find consultation records that match the criteria
		$listOfConsultationRecord = ConsultationRecord::model()->findAll($criteria);

		// Include the appropriate sidebar file based on the user role
		$sidebarFile = 'sidebar' . ucfirst($userRole) . '.php';
		if (file_exists($sidebarFile)) {
			require($sidebarFile);
		}
		

		$this->layout = '//layouts/main';
		$this->render('dashboard' . ucfirst($userRole), array(
			'user' => new User,
			'doctorCount' => $doctorCount,
			'patientCount' => $patientCount,
			'clinicCount' => $clinicCount,
			'activePatients' => $activePatients,
			'secretaryCount' => $secretaryCount,
			'listOfConsultationRecord' => $listOfConsultationRecord,
			'listOfPendingAppointments' => $listOfPendingAppointments,
			'listPrescriptionsPatient' => $listPrescriptionsPatient,
			'listOfConsultationRecordPatient' => $listOfConsultationRecordPatient,
			'listOfAppointments' => $listOfAppointments,
			'assignedPatients' => $assignedPatients,
			'listOfActiveAppointments' => $listOfActiveAppointments,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = '//layouts/login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}