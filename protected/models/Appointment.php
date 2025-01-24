<?php

/**
 * This is the model class for table "{{appointment}}".
 *
 * The followings are the available columns in table '{{appointment}}':
 * @property integer $id
 * @property integer $doctor_account_id
 * @property integer $patient_account_id
 * @property string $appointment_date_time
 * @property integer $clinic_id
 * @property string $notes
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status_id
 * @property string $appointment_date
 * @property string $appointment_time
 *
 * The followings are the available model relations:
 * @property Status $status
 * @property Clinic $clinic
 * @property Account $doctorAccount
 * @property Account $patientAccount
 */
class Appointment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{appointment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doctor_account_id, patient_account_id, appointment_date_time, clinic_id, appointment_date, appointment_time', 'required'),
			array('doctor_account_id, patient_account_id, clinic_id, status_id', 'numerical', 'integerOnly'=>true),
			array('notes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, doctor_account_id, patient_account_id, appointment_date_time, clinic_id, notes, created_at, updated_at, status_id, appointment_date, appointment_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'clinic' => array(self::BELONGS_TO, 'Clinic', 'clinic_id'),
			'doctorAccount' => array(self::BELONGS_TO, 'Account', 'doctor_account_id'),
			'patientAccount' => array(self::BELONGS_TO, 'Account', 'patient_account_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'doctor_account_id' => 'Doctor Account',
			'patient_account_id' => 'Patient Account',
			'appointment_date_time' => 'Appointment Date Time',
			'clinic_id' => 'Clinic',
			'notes' => 'Notes',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'status_id' => 'Status',
			'appointment_date' => 'Appointment Date',
			'appointment_time' => 'Appointment Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('doctor_account_id',$this->doctor_account_id);
		$criteria->compare('patient_account_id',$this->patient_account_id);
		$criteria->compare('appointment_date_time',$this->appointment_date_time,true);
		$criteria->compare('clinic_id',$this->clinic_id);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('appointment_date',$this->appointment_date,true);
		$criteria->compare('appointment_time',$this->appointment_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Appointment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getFullname($id)
	{
    	$model = User::model()->find(array(
        	'condition'=>'account_id=:account_id',
				'params'=>array(
					':account_id'=>$id,
        	)
    	));

    	if ($model !== null) {
        	if ($model->middlename == null) {
            	return $model->firstname . " " . $model->lastname;
        	} else {
           	 return $model->firstname . " " . substr($model->middlename, 0, 1) . ". " . $model->lastname;
        	}
    	}
	}
}
