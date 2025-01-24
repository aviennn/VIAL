<?php

class AccountController extends Controller
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
				'actions'=>array('admin', 'viewRecords','UpdateSecretaryAssignment','ViewRecordsDoctor','UpdateSecretary','viewRecordsSecretary','deleteDoctor','createDoctor','updateDoctor','listDoctor','listPatient','createPatient1', 'updatePatient', 'createPatient2','createSecretary','listSecretary','assignSecretary','ListSecretaryAssignment','UpdatePatient1', 'DeleteRecord','DeleteRecordAssignment'),
				'users'=>array('super admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('viewpatients','ListDoctorSecretaryAssignment','createPatient1', 'updatePatient', 'createPatient2','viewprofile','CreatePatient1ForDoctor','CreatePatient2ForDoctor','searchpatients','addtodoctorlist', 'viewRecords', 'DeleteRecord', 'AddFormPrescription', 'DeleteRecordAssignment'),
				'users'=>array('doctor'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('createPatient1', 'updatePatient', 'createPatient2', 'ListAssignedPatients','ListDoctorAppointments','viewProfileOfSecretary', 'viewRecords', 'updatePatient1'),
				'users'=>array('secretary'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('viewProfileOfPatient', 'AvailableDoctors'),
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

	public function actionListDoctor()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition' => 'account_type_id=:account_type_id AND status_id=:status_id',
			'params' => array(
				':account_type_id' => 3,
				':status_id' => 1,
			),
		));

		$this->render('listDoctor',array(
			'listOfAccounts'=>$listOfAccounts,
		));
	}

	public function actionAvailableDoctors()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition' => 'account_type_id=:account_type_id AND status_id=:status_id',
			'params' => array(
				':account_type_id' => 3,
				':status_id' => 1,
			),
		));

		$this->render('AvailableDoctors',array(
			'listOfAccounts'=>$listOfAccounts,
		));
	}


	public function actionListPatient()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id AND status_id=:status_id',
			'params'=>array(
				':account_type_id'=>4,
				':status_id' => 1,
			),
		));

		$this->render('listPatient',array(
			'listOfAccounts'=>$listOfAccounts,
		));
	}

	public function actionListSecretary()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id AND status_id=:status_id',
			'params'=>array(
				':account_type_id'=>5,
				':status_id' => 1,
			),
		));

		$this->render('listSecretary',array(
			'listOfAccounts'=>$listOfAccounts,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateDoctor()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>3,
			),
		));
		$account = new Account;
		$user = new User;
		$account->setScenario('createNewDoctor');
		$user->setScenario('createNewDoctor');

		
		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 3;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;

						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully registered for an account!');
							$this->redirect(array('/account/listDoctor'));
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listDoctor'));
				}
			}
		}
		

		$this->render('create',array(
			'account' => $account,
			'user' => $user,
			'listOfAccounts' => $listOfAccounts,
		));
	}

	public function actionCreateSecretary()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>5,
			),
		));
		$account = new Account;
		$user = new User;
		$account->setScenario('createNewSecretary');
		$user->setScenario('createNewSecretary');

		
		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 5;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;

						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully registered for an account!');
							$this->redirect(array('/account/listSecretary'));
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listSecretary'));
				}
			}
		}
		

		$this->render('createSecretary',array(
			'account' => $account,
			'user' => $user,
			'listOfAccounts' => $listOfAccounts,
		));
	}

	
	public function actionCreatePatient1()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>4,
			),
		));
		$account = new Account;
		$user = new User;
		$ImmunizationRecord = new ImmunizationRecord;
		$BirthHistory = new BirthHistory;
		$account->setScenario('createNewPatient');
		$user->setScenario('createNewPatient');

		
		if ((isset($_POST['Account'])) AND (isset($_POST['User'])) AND (isset($_POST['ImmunizationRecord'])) AND (isset($_POST['BirthHistory'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$ImmunizationRecord->attributes = $_POST['ImmunizationRecord'];
			$BirthHistory->attributes = $_POST['BirthHistory'];
			$account->account_type_id = 4;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;
						$ImmunizationRecord->account_id = $account_id;
						$BirthHistory->account_id = $account_id;

						if ($user->save(false))
						{
							if($ImmunizationRecord->save(false) && $BirthHistory->save(false))
							{
								$transaction->commit();
								Yii::app()->user->setFlash('success','You have successfully registered for an account!');
								$userAccountType = Yii::app()->user->getState('account_type_id');
								if ($userAccountType == 5) {
									// Secretary
									Yii::app()->user->setFlash('success', 'You have successfully registered for an account!');
									$this->redirect(array('/account/listAssignedPatients'));
								} else {
									// Other users
									Yii::app()->user->setFlash('success', 'You have successfully registered for an account!');
									$this->redirect(array('/account/listPatient'));
								}
							}

						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listPatient'));
				}
			}
		}

		$this->render('createPatient1',array(
			'account' => $account,
			'user' => $user,
			'ImmunizationRecord' => $ImmunizationRecord,
			'BirthHistory' => $BirthHistory,
			'listOfAccounts' => $listOfAccounts,
		));
	}


	public function actionCreatePatient1ForDoctor()
{
    $listOfAccounts = Account::model()->findAll(array(
        'condition' => 'account_type_id=:account_type_id',
        'params' => array(
            ':account_type_id' => 4,
        ),
    ));

    $account = new Account;
    $user = new User;
    $ImmunizationRecord = new ImmunizationRecord;
    $BirthHistory = new BirthHistory;
    $consultationRecord = new ConsultationRecord;
	$prescription = new Prescription;

    $account->setScenario('createNewPatient');
    $user->setScenario('createNewPatient');

    $valid = true;

    if (
        isset($_POST['Account'])
        && isset($_POST['User'])
        && isset($_POST['ImmunizationRecord'])
        && isset($_POST['ConsultationRecord'])
    ) {
        $account->attributes = $_POST['Account'];
        $user->attributes = $_POST['User'];
        $ImmunizationRecord->attributes = $_POST['ImmunizationRecord'];
        $consultationRecord->attributes = $_POST['ConsultationRecord'];

        // Check if BirthHistory data is available in the form
        if (isset($_POST['BirthHistory'])) {
            $BirthHistory->attributes = $_POST['BirthHistory'];

            // Validate account and user models
            $account->account_type_id = 4;
            $valid = $account->validate();
            $valid = $user->validate() && $valid;

            if ($valid) {
                $connection = Yii::app()->db;
                $transaction = $connection->beginTransaction();

                try {
                    if ($account->save()) {
                        $user->account_id = $account->id;
                        $user->save(false);

                        // Set the account_id for BirthHistory after account has been saved
                        $BirthHistory->account_id = $account->id;
                        $BirthHistory->save(false);  // Save the BirthHistory model

                        // Check if ImmunizationRecord data is available in the form
                        if (!empty($_POST['ImmunizationRecord'])) {
                            $ImmunizationRecord->account_id = $account->id;
                            $ImmunizationRecord->save(false);
                        }

                        // Check if ConsultationRecord data is available in the form
                        if (!empty($_POST['ConsultationRecord'])) {
                            $consultationRecord->patient_account_id = $account->id;
                            $consultationRecord->doctor_account_id = Yii::app()->user->id;
                            $consultationRecord->save(false);
							if (!empty($_POST['Prescription']) && array_filter($_POST['Prescription'])) {
								$prescription->attributes = $_POST['Prescription'];
								$prescription->consultation_id = $consultationRecord->id; // Link to consultation record
								$prescription->patient_account_id = $consultationRecord->patient_account_id; // Save patient_account_id
								$prescription->doctor_account_id = $consultationRecord->doctor_account_id; // Save doctor_account_id
								$prescription->date_of_prescription = $consultationRecord->date_of_consultation; // Set date_of_prescription to date_of_consultation
								$prescription->status_id = 1;
			
								if (!$prescription->save()) {
									// Handle prescription save error
									var_dump($prescription->getErrors()); // Remove this line in production
								}
							}
                        }

                        $transaction->commit();
                        Yii::app()->user->setFlash('success', 'You have successfully registered for an account!');
                        $this->redirect(array('/account/viewPatients'));
                    }
                } catch (Exception $e) {
                    $transaction->rollback();
                    Yii::app()->user->setFlash('error', 'An error occurred while trying to add an account! Please try again later');
                    $this->redirect(array('/account/viewPatients'));
                }
            }
        }
    }

    $this->render('createPatient1ForDoctor', array(
        'account' => $account,
        'user' => $user,
        'ImmunizationRecord' => $ImmunizationRecord,
        'BirthHistory' => $BirthHistory,
        'listOfAccounts' => $listOfAccounts,
        'consultationRecord' => $consultationRecord,
		'prescription' => $prescription,
    ));
}



	public function actionCreatePatient2()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>4,
			),
		));
		$account = new Account;
		$user = new User;
		$account->setScenario('createNewPatient');
		$user->setScenario('createNewPatient');

		
		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 4;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;

						if ($user->save(false))
						{

								$transaction->commit();
								Yii::app()->user->setFlash('success','You have successfully registered for an account!');
							
								$userAccountType = Yii::app()->user->getState('account_type_id');
								if ($userAccountType == 5) {
									// Secretary
									Yii::app()->user->setFlash('success', 'You have successfully registered for an account!');
									$this->redirect(array('/account/listAssignedPatients'));
								} else {
									// Other users
									Yii::app()->user->setFlash('success', 'You have successfully registered for an account!');
									$this->redirect(array('/account/listPatient'));
								}
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listPatient'));
				}
			}
		}
		

		$this->render('createPatient2',array(
			'account' => $account,
			'user' => $user,
			'listOfAccounts' => $listOfAccounts
		));
	}


	public function actionCreatePatient2ForDoctor()
{
    $listOfAccounts = Account::model()->findAll(array(
        'condition' => 'account_type_id=:account_type_id',
        'params' => array(
            ':account_type_id' => 4,
        ),
    ));

    $account = new Account;
    $user = new User;
    $consultationRecord = new ConsultationRecord;
	$prescription = new Prescription;

    $account->setScenario('createNewPatient');
    $user->setScenario('createNewPatient');

    $valid = true;

    if (
        isset($_POST['Account'])
        && isset($_POST['User'])
        && isset($_POST['ConsultationRecord'])
    ) {
        $account->attributes = $_POST['Account'];
        $user->attributes = $_POST['User'];
        $consultationRecord->attributes = $_POST['ConsultationRecord'];

        $account->account_type_id = 4;
        $valid = $account->validate();
        $valid = $user->validate() && $valid;

        if ($valid) {
            $connection = Yii::app()->db;
            $transaction = $connection->beginTransaction();

            try {
                if ($account->save()) {
                    $user->account_id = $account->id;
                    $user->save(false);


                    // Check if ConsultationRecord data is available in the form
					if (!empty($_POST['ConsultationRecord'])) {
						$consultationRecord->patient_account_id = $account->id;
						$consultationRecord->doctor_account_id = Yii::app()->user->id;
						$consultationRecord->save(false);
						if (!empty($_POST['Prescription']) && array_filter($_POST['Prescription'])) {
							$prescription->attributes = $_POST['Prescription'];
							$prescription->consultation_id = $consultationRecord->id; // Link to consultation record
							$prescription->patient_account_id = $consultationRecord->patient_account_id; // Save patient_account_id
							$prescription->doctor_account_id = $consultationRecord->doctor_account_id; // Save doctor_account_id
							$prescription->date_of_prescription = $consultationRecord->date_of_consultation; // Set date_of_prescription to date_of_consultation
							$prescription->status_id = 1;
		
							if (!$prescription->save()) {
								// Handle prescription save error
								var_dump($prescription->getErrors()); // Remove this line in production
							}
						}
					}

                    $transaction->commit();
                    Yii::app()->user->setFlash('success', 'You have successfully registered for an account!');
                    $this->redirect(array('/account/viewPatients'));
                }
            } catch (Exception $e) {
                $transaction->rollback();
                Yii::app()->user->setFlash('error', 'An error occurred while trying to add an account! Please try again later');
                $this->redirect(array('/account/viewPatients'));
            }
        }
    }

    $this->render('createPatient2ForDoctor', array(
        'account' => $account,
        'user' => $user,
        'listOfAccounts' => $listOfAccounts,
        'consultationRecord' => $consultationRecord,
		'prescription' => $prescription,
    ));
}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateDoctor($id)
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>3,
			),
		));
		$account = $this->loadModel($id);
		$user = $account->user;
		$account->setScenario('updateDoctor');
		$user->setScenario('updateDoctor');

		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 3;
			$valid = $account->validate();
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully updated the account!');
							$this->redirect(array('/account/listDoctor'));
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to update the account! Please try again later');
				}
			}
		}

		$this->render('update',array(
			'account' => $account,
			'user' => $user,
			'listOfAccounts' => $listOfAccounts,
		));
	}

	public function actionUpdateSecretary($id)
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>5,
			),
		));
		$account = $this->loadModel($id);
		$user = $account->user;
		$account->setScenario('updateSecretary');
		$user->setScenario('updateSecretary');

		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 5;
			$valid = $account->validate();
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully updated the account!');
							$this->redirect(array('/account/listSecretary'));
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to update the account! Please try again later');
				}
			}
		}

		$this->render('updateSecretary',array(
			'account' => $account,
			'user' => $user,
			'listOfAccounts' => $listOfAccounts,
		));
	}

	

	

	/**
 * Updates a particular patient model.
 * If update is successful, the browser will be redirected to the 'listPatient' page.
 * @param integer $id the ID of the model to be updated
 */
public function actionUpdatePatient($id)
{
    $listOfAccounts = Account::model()->findAll(array(
        'condition' => 'account_type_id=:account_type_id',
        'params' => array(
            ':account_type_id' => 4,
        ),
    ));

    $account = $this->loadModel($id);

    if (!$account) {
        throw new CHttpException(404, 'The requested page does not exist.');
    }

    $user = $account->user;
    $ImmunizationRecord = ImmunizationRecord::model()->findByAttributes(array('account_id' => $account->id));

    if (!$ImmunizationRecord) {
        $ImmunizationRecord = new ImmunizationRecord();
        $ImmunizationRecord->account_id = $account->id;
    }

    $BirthHistory = BirthHistory::model()->findByAttributes(array('account_id' => $account->id));

    if (!$BirthHistory) {
        $BirthHistory = new BirthHistory();
        $BirthHistory->account_id = $account->id;
    }

    $account->setScenario('updatePatient');
    $user->setScenario('updatePatient');

    if (isset($_POST['Account']) && isset($_POST['User']) && isset($_POST['ImmunizationRecord']) && isset($_POST['BirthHistory'])) {
        $account->attributes = $_POST['Account'];
        $user->attributes = $_POST['User'];
        $ImmunizationRecord->attributes = $_POST['ImmunizationRecord'];
        $BirthHistory->attributes = $_POST['BirthHistory'];
        $account->account_type_id = 4;

        $valid = $account->validate();
        $valid = $user->validate() && $valid;
        $valid = $ImmunizationRecord->validate() && $valid;
        $valid = $BirthHistory->validate() && $valid;

        if ($valid) {
            $connection = Yii::app()->db;
            $transaction = $connection->beginTransaction();

            try {
                if ($account->save()) {
                    if ($user->save(false) && $ImmunizationRecord->save(false) && $BirthHistory->save(false)) {
                        $transaction->commit();
                        Yii::app()->user->setFlash('success', 'You have successfully updated the patient!');
						$account_type_id = Yii::app()->user->account_type_id;
                        if ($account_type_id == 1) {
							$this->redirect(array('/account/listPatient'));
						} elseif ($account_type_id == 5) {
							$this->redirect(array('/account/viewPatients'));
						}
                    }
                }
            } catch (Exception $e) {
                $transaction->rollback();
                Yii::app()->user->setFlash('error', 'An error occurred while trying to update the patient. Please try again later.');
            }
        }
    }

    $this->render('updatep1', array(
        'account' => $account,
        'user' => $user,
        'ImmunizationRecord' => $ImmunizationRecord,
        'listOfAccounts' => $listOfAccounts,
        'BirthHistory' => $BirthHistory,
    ));
}


public function actionUpdatePatient1($id)
{
    $listOfAccounts = Account::model()->findAll(array(
        'condition' => 'account_type_id=:account_type_id',
        'params' => array(
            ':account_type_id' => 4,
        ),
    ));

    $account = $this->loadModel($id);
    $user = $account->user;
    $account->setScenario('updatePatient');
    $user->setScenario('updatePatient');


    if (isset($_POST['Account']) && isset($_POST['User'])) {
        $account->attributes = $_POST['Account'];
        $user->attributes = $_POST['User'];
        $account->account_type_id = 4;

        $valid = $account->validate();
        $valid = $user->validate() && $valid;

        if ($valid) {
            $connection = Yii::app()->db;
            $transaction = $connection->beginTransaction();

            try {
                if ($account->save()) {
                    if ($user->save(false)) {
                        $transaction->commit();
                        Yii::app()->user->setFlash('success', 'You have successfully updated the patient!');
                        $this->redirect(array('/account/listPatient'));
                    }
                }
            } catch (Exception $e) {
                $transaction->rollback();
                Yii::app()->user->setFlash('error', 'An error occurred while trying to update the patient. Please try again later.');
            }
        }
    }

    $this->render('updatep2', array(
        'account' => $account,
        'user' => $user,
        'listOfAccounts' => $listOfAccounts,
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

	public function actionDeleteDoctor($id)
{
    $model = $this->loadModel($id);

    if ($model->account_type_id == 3) {
        $transaction = Yii::app()->db->beginTransaction();
        try {     
            // Set the status_id to 2 (inactive) instead of deleting
            $model->user->status_id = 2;
            $model->user->save();

            $model->status_id = 2; // Assuming there's a status_id field in the account table
            $model->save();

            $transaction->commit();
            Yii::app()->user->setFlash('success', 'Doctor has been successfully marked as inactive!');
        }
        catch (Exception $e) {
            $transaction->rollback();
            Yii::app()->user->setFlash('error', 'An error occurred while trying to mark the doctor as inactive. Please try again later.');
        }
    } else {
        Yii::app()->user->setFlash('error', 'Invalid request. The specified account is not a doctor.');
    }

    $this->redirect(array('/account/listDoctor'));
}


public function actionViewPatients()
{
    // Get the list of active patients for the logged-in doctor
    $consultationRecords = ConsultationRecord::model()->findAllByAttributes(array(
        'doctor_account_id' => Yii::app()->user->id,
        'status_id' => 1,
    ));

    $activePatients = array();
    $uniquePatientIds = array();  // Keep track of unique patient IDs

    foreach ($consultationRecords as $record) {
        $patientAccountId = $record->patient_account_id;

        // Check if the patient ID is not already in the list
        if (!in_array($patientAccountId, $uniquePatientIds)) {
            $uniquePatientIds[] = $patientAccountId;

            // Assuming you have a 'patient_account_id' attribute in your consultation record
            $patientAccount = Account::model()->findByPk($patientAccountId);

            if ($patientAccount) {
                $activePatients[] = $patientAccount;
            }
        }
    }

    $this->render('viewPatients', array(
        'activePatients' => $activePatients,
    ));
}


public function actionViewProfile()
{
    if (!Yii::app()->user->isGuest && Yii::app()->user->getState('account_type_id') == 3) {
        $doctorAccountId = Yii::app()->user->id;

        $doctorUser = User::model()->findByAttributes(array('account_id' => $doctorAccountId));
        $doctorAccount = Account::model()->findByPk($doctorAccountId);

        // Load all clinic assignments for the doctor
        $clinicAssignments = ClinicAssignment::model()->findAllByAttributes(array('account_id' => $doctorAccountId));

        $clinics = array();

        // Load clinic information for each assignment
        foreach ($clinicAssignments as $assignment) {
            $clinic = Clinic::model()->findByPk($assignment->clinic_id);
            if ($clinic) {
                $clinics[] = $clinic;
            }
        }

        $this->render('viewProfile', array(
            'doctorUser' => $doctorUser,
            'doctorAccount' => $doctorAccount,
            'clinics' => $clinics,
        ));
    } else {
        $this->redirect(array('site/login'));
    }
}

public function actionviewProfileOfPatient()
{
    if (!Yii::app()->user->isGuest && Yii::app()->user->getState('account_type_id') == 4) {
        $patientAccountId = Yii::app()->user->id;

        $patientUser = User::model()->findByAttributes(array('account_id' => $patientAccountId));
        $patientAccount = Account::model()->findByPk($patientAccountId);

        // Load all consultation records for the patient
       

        // Pass data to the view
        $this->render('viewProfilePatient', array(
            'patientUser' => $patientUser,
            'patientAccount' => $patientAccount,
        ));
    } else {
        Yii::log("Redirecting to 'account/viewPatients' due to unauthorized access.", CLogger::LEVEL_ERROR, __METHOD__);
        $this->redirect(array('account/viewPatients'));
    }
}

public function actionviewProfileOfSecretary()
{
    if (!Yii::app()->user->isGuest && Yii::app()->user->getState('account_type_id') == 5) {
        $secretaryAccountId = Yii::app()->user->id;

        $secretaryUser = User::model()->findByAttributes(array('account_id' => $secretaryAccountId));
        $secretaryAccount = Account::model()->findByPk($secretaryAccountId);

        // Load all consultation records for the patient
       

        // Pass data to the view
        $this->render('viewProfileSecretary', array(
            'secretaryUser' => $secretaryUser,
            'secretaryAccount' => $secretaryAccount,
        ));
    } else {
        Yii::log("Redirecting to 'site/index' due to unauthorized access.", CLogger::LEVEL_ERROR, __METHOD__);
        $this->redirect(array('site/index'));
    }
}



public function actionSearchPatients()
{
	$listOfAccounts = Account::model()->findAll(array(
		'condition' => 'account_type_id=:account_type_id AND status_id=:status_id',
		'params' => array(
			':account_type_id' => 4,
			':status_id' => 1,
		),
	));	

		$this->render('searchPatients',array(
			'listOfAccounts'=>$listOfAccounts,
		));
}


public function actionAssignSecretary()
{
    $model = new Secretary;

    // Fetch the list of secretaries and doctors with full names
    // Fetch the list of secretaries and doctors with full names
	$secretaries = Account::model()->findAllByAttributes(array('account_type_id' => '5'));
	$doctors = Account::model()->findAllByAttributes(array('account_type_id' => '3'));

	$secretaryOptions = array();
	$doctorOptions = array();

	// Populate secretary dropdown options
	foreach ($secretaries as $secretary) {
			$fullName = User::model()->getFullname($secretary->id); // Pass the user ID as an argument
			$secretaryOptions[$secretary->id] = $fullName;
	}
	
	// Populate doctor dropdown options
	foreach ($doctors as $doctor) {
			$fullName = User::model()->getFullname($doctor->id); // Pass the user ID as an argument
			$doctorOptions[$doctor->id] = $fullName;
		}
	

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['Secretary'])) {
        // Output the POST data for debugging
        var_dump($_POST['Secretary']);

        $model->attributes = $_POST['Secretary'];

        $transaction = Yii::app()->db->beginTransaction(); // Start a database transaction

        try {
            if ($model->save()) {
                $transaction->commit(); // Commit the transaction if saving is successful
                Yii::app()->user->setFlash('success', 'Secretary assigned to doctor successfully.');
                $this->redirect(array('account/listSecretaryAssignment')); // Redirect to an appropriate page
            } else {
                // Display errors if saving fails
                Yii::app()->user->setFlash('error', 'Failed to assign secretary to doctor. Please check the form for errors.');
                var_dump($model->getErrors()); // Remove this line in production
            }
        } catch (Exception $e) {
            $transaction->rollback(); // Rollback the transaction in case of an exception
            Yii::app()->user->setFlash('error', 'An error occurred while assigning secretary to doctor.');
            // Log the exception if needed
            Yii::log('Error assigning secretary to doctor: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
            $this->redirect(array('account/listSecretaryAssignment')); // Redirect to an appropriate page
        }
    }

    $this->render('assignSecretary', array(
        'model' => $model,
        'secretaries' => $secretaryOptions,
        'doctors' => $doctorOptions,
    ));
}


public function actionListSecretaryAssignment()
{
		$listOfSecretaryAssignment = Secretary::model()->findAll(array(
			'condition'=>'status_id=:status_id',
			'params'=>array(
				':status_id' => 1,
			),
		));

		$this->render('listSecretaryAssignment',array(
			'listOfSecretaryAssignment'=>$listOfSecretaryAssignment,
		));
	}

	// In the AccountController

	public function actionListDoctorSecretaryAssignment()
	{
		// Get the current logged-in user
		$userId = Yii::app()->user->id;
	
		// Find the doctor's account based on the user ID
		$doctorAccount = Account::model()->findByAttributes(array(
			'id' => $userId,
			'account_type_id' => '3', // Assuming '3' is the account_type_id for doctors
		));
	
		// Check if the doctor's account exists
		if ($doctorAccount === null) {
			throw new CHttpException(404, 'The requested account does not exist.');
		}
	
		// Get the list of secretary assignments for the doctor
		$listOfSecretaryAssignment = Secretary::model()->findAllByAttributes(array(
			'doctor_id' => $doctorAccount->id,
		));
	
		$this->render('listDoctorSecretaryAssignment', array(
			'listOfSecretaryAssignment' => $listOfSecretaryAssignment,
		));
	}
	
	

	public function actionListAssignedPatients()
	{
		// Get the secretary's assignments
		$assignments = Secretary::model()->findAllByAttributes(array(
			'secretary_id' => Yii::app()->user->id, // Assuming Yii::app()->user->id is the secretary's user ID
			'status_id' => 1, // Assuming 1 is the status for active assignments
		));
	
		$assignedPatients = array();
		$uniquePatientIds = array();  // Keep track of unique patient IDs
	
		foreach ($assignments as $assignment) {
			// Fetch the doctor's patients based on the assignment
			$doctorId = $assignment->doctor_id;
			$patients = ConsultationRecord::model()->findAllByAttributes(array(
				'doctor_account_id' => $doctorId,
				'status_id' => 1, // Assuming 1 is the status for active patients
			));
	
			foreach ($patients as $patient) {
				$patientAccountId = $patient->patient_account_id;
	
				// Check if the patient ID is not already in the list
				if (!in_array($patientAccountId, $uniquePatientIds)) {
					$uniquePatientIds[] = $patientAccountId;
	
					// Assuming you have a 'patient_account_id' attribute in your consultation record
					$patientAccount = Account::model()->findByPk($patientAccountId);
	
					if ($patientAccount) {
						$assignedPatients[] = $patientAccount;
					}
				}
			}
		}
	
		$this->render('listAssignedPatients', array(
			'assignedPatients' => $assignedPatients,
		));
	}
	
	

	public function actionViewRecords($accountId)
{
    // Fetch consultation records for the specified account ID
    $consultationRecords = ConsultationRecord::model()->findAllByAttributes(['patient_account_id' => $accountId]);

    // Fetch prescription records for the specified account ID
    $prescriptionRecords = Prescription::model()->findAllByAttributes(['patient_account_id' => $accountId]);

	$birthHistory = BirthHistory::model()->findAllByAttributes(['account_id' => $accountId]);

	$listOfAccounts = Account::model()->findAllByAttributes(['id' => $accountId]);

	$immunizationRecords = ImmunizationRecord::model()->findAllByAttributes(['account_id' => $accountId]);


    return $this->render('viewPatientRecord', [
        'consultationRecords' => $consultationRecords,
        'prescriptionRecords' => $prescriptionRecords,
		'birthHistory' => $birthHistory,
		'listOfAccounts' => $listOfAccounts,
		'immunizationRecords' => $immunizationRecords,
    ]);
}

public function actionViewRecordsDoctor($accountId)
{
	$listOfAccounts = Account::model()->findAllByAttributes(['id' => $accountId]);
	$clinicAssignment = ClinicAssignment::model()->findAllByAttributes(['account_id' => $accountId]);

    return $this->render('viewDoctorRecord', [
		'listOfAccounts' => $listOfAccounts,
		'clinicAssignment' => $clinicAssignment,
    ]);
}

public function actionViewRecordsSecretary($accountId)
{
	$listOfAccounts = Account::model()->findAllByAttributes(['id' => $accountId]);
	$listOfSecretary = Secretary::model()->findAllByAttributes(['secretary_id' => $accountId]);

    return $this->render('viewSecretaryRecord', [
		'listOfAccounts' => $listOfAccounts,
		'listOfSecretary' => $listOfSecretary,
    ]);
}

public function actionDeleteRecord($id)
	 {
		 // Load the Account model
		 $accountModel = Account::model()->findByPk($id);
	 
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


	 public function actionUpdateSecretaryAssignment($id)
	 {
		 $existingModel = Secretary::model()->findByPk($id);
	 
		 if ($existingModel === null) {
			 throw new CHttpException(404, 'The requested page does not exist.');
		 }
	 
		 $secretaries = Account::model()->findAllByAttributes(array('account_type_id' => '5'));
		 $doctors = Account::model()->findAllByAttributes(array('account_type_id' => '3'));
	 
		 $doctorOptions = array();
		 foreach ($doctors as $doctor) {
			 $fullName = User::model()->getFullname($doctor->id);
			 $doctorOptions[$doctor->id] = $fullName;
		 }
	 
		 $secretaryOptions = array();
		 foreach ($secretaries as $secretary) {
			 $fullName = User::model()->getFullname($secretary->id);
			 $secretaryOptions[$secretary->id] = $fullName;
		 }
	 
		 if (isset($_POST['SecretaryAssignment'])) {
			 $postData = $_POST['SecretaryAssignment'];
			 $existingModel->attributes = $postData;
	 
			 $transaction = Yii::app()->db->beginTransaction();
	 
			 try {
				 if ($existingModel->save()) {
					 $transaction->commit();
					 Yii::app()->user->setFlash('success', 'Secretary assignment updated successfully.');
					 $this->redirect(array('secretary/listSecretaryAssignment'));
				 } else {
					 Yii::app()->user->setFlash('error', 'Failed to update secretary assignment. Please check the form for errors.');
					 var_dump($existingModel->getErrors());
				 }
			 } catch (Exception $e) {
				 $transaction->rollback();
				 Yii::app()->user->setFlash('error', 'An error occurred while updating secretary assignment.');
				 Yii::log('Error updating secretary assignment: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
				 $this->redirect(array('secretary/listSecretaryAssignment'));
			 }
		 }
	 
		 $this->render('_updateformSecretaryAssignment', array(
			 'model' => $existingModel,
			 'secretaries' => $secretaryOptions,
			 'doctors' => $doctorOptions,
		 ));
	 }
	 
	 
	 public function actionDeleteRecordAssignment($id)
	 {
		 // Load the model
		 $model = Secretary::model()->findByPk($id);
 
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
		$dataProvider=new CActiveDataProvider('Account');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Account('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Account']))
			$model->attributes=$_GET['Account'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Account the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Account::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Account $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='account-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
