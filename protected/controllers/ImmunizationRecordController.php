<?php

class ImmunizationRecordController extends Controller
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
				'actions'=>array('admin','delete','listOfImmunizationRecord', 'DeleteRecord','ListImmunizationRecordForDoctor'),
				'users'=>array('super admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','listOfImmunizationRecord', 'DeleteRecord','ListImmunizationRecordForDoctor','CreateImmunizationRecordForDoctor'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
{
    $model = new ImmunizationRecord;

    // Fetch all immunizations
    $immunizations = Immunization::model()->findAll(); // Replace 'Immunization' with your actual model name

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    $immunizationOptions = array();

    foreach ($immunizations as $immunization) {
        $immunizationOptions[$immunization->id] = $immunization->immunization;
    }

    $patients = Account::model()->findAllByAttributes(array('account_type_id' => '4'));
    $patientOptions = array();

    foreach ($patients as $patient) {
        $fullName = $model->getFullname($patient->id);
        $patientOptions[$patient->id] = $fullName;
    }

    if (isset($_POST['ImmunizationRecord'])) {
        $model->attributes = $_POST['ImmunizationRecord'];
        if ($model->save())
		$this->redirect(array('immunizationRecord/listOfImmunizationRecord'));
    }


    $this->render('create', array(
        'model' => $model,
        'patients' => $patientOptions,
        'immunizations' => $immunizationOptions, // Pass the immunization options to the view
    ));
}

public function actionlistOfImmunizationRecord()
	{
		$listOfImmunizationRecord = ImmunizationRecord::model()->findAll(
			array(
				'condition' => 'status_id = :statusId',
				'params' => array(':statusId' => 1),
			)
		);
		

		$this->render('listImmunizationRecord',array(
			'listOfImmunizationRecord'=>$listOfImmunizationRecord,
		));
	}
	
	public function actionCreateImmunizationRecordForDoctor()
{
    // Assuming that the doctor's ID is associated with the currently logged-in user
    $doctorId = Yii::app()->user->id;

    // Fetch the list of patients who have a consultation record with the doctor
    $patients = ConsultationRecord::model()->findAllByAttributes(array(
        'doctor_account_id' => $doctorId,
    ));

    // Extract patient IDs
    $patientIds = array();
    foreach ($patients as $patient) {
        $patientIds[] = $patient->patient_account_id;
    }

    // Fetch the immunizations
    $immunizations = Immunization::model()->findAll(); // Replace 'Immunization' with your actual model name
    $immunizationOptions = array();

    foreach ($immunizations as $immunization) {
        $immunizationOptions[$immunization->id] = $immunization->immunization;
    }

    // Fetch the list of patients based on consultation records
    $eligiblePatients = Account::model()->findAllByAttributes(array(
        'id' => $patientIds,
        'account_type_id' => '4', // Assuming '4' is the account type for patients
    ));

	
    $patientOptions = array();
    foreach ($eligiblePatients as $patient) {
		$user = User::model()->findByAttributes(array('account_id' => $patient->id));
        $fullName = $user->getFullname($patient->id);
        $patientOptions[$patient->id] = $fullName;
    }

    $model = new ImmunizationRecord;

    if (isset($_POST['ImmunizationRecord'])) {
        $model->attributes = $_POST['ImmunizationRecord'];
        if ($model->save())
            $this->redirect(array('account/viewPatients/'));
    }

    $this->render('createImmunizationRecordForDoctor', array(
        'model' => $model,
        'patients' => $patientOptions,
        'immunizations' => $immunizationOptions,
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

    // Fetch the list of immunizations
    $immunizations = Immunization::model()->findAll(); // Replace 'Immunization' with your actual model name
    $immunizationOptions = array();

    foreach ($immunizations as $immunization) {
        $immunizationOptions[$immunization->id] = $immunization->immunization;
    }

    // Fetch the list of patients
    $patients = Account::model()->findAllByAttributes(array('account_type_id' => '4'));
    $patientOptions = array();

    foreach ($patients as $patient) {
        $fullName = $model->getFullname($patient->id);
        $patientOptions[$patient->id] = $fullName;
    }

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['ImmunizationRecord'])) {
        $model->attributes = $_POST['ImmunizationRecord'];
        if ($model->save())
            $this->redirect(array('immunizationRecord/listOfImmunizationRecord'));
    }

    $this->render('update', array(
        'model' => $model,
        'patients' => $patientOptions,
        'immunizations' => $immunizationOptions, // Pass the immunization options to the view
    ));
}

public function actionDeleteRecord($id)
	 {
		 // Load the Account model
		 $accountModel = ImmunizationRecord::model()->findByAttributes(
			array(
				'id' => $id,
				'status_id' => 1,
			)
		);
		
	 
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ImmunizationRecord');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ImmunizationRecord('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ImmunizationRecord']))
			$model->attributes=$_GET['ImmunizationRecord'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ImmunizationRecord the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ImmunizationRecord::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ImmunizationRecord $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='immunization-record-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
