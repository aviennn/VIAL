<?php

/**
 * This is the model class for table "{{prescription}}".
 *
 * The followings are the available columns in table '{{prescription}}':
 * @property integer $id
 * @property integer $patient_account_id
 * @property integer $doctor_account_id
 * @property string $prescription
 * @property string $date_of_prescription
 * @property integer $status_id
 *
 * The followings are the available model relations:
 * @property Account $doctorAccount
 * @property Account $patientAccount
 * @property Status $status
 */
class Prescription extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{prescription}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patient_account_id, doctor_account_id, prescription, status_id', 'required'),
			array('patient_account_id, doctor_account_id, status_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, patient_account_id, doctor_account_id, prescription, date_of_prescription, status_id', 'safe', 'on'=>'search'),
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
			'doctorAccount' => array(self::BELONGS_TO, 'Account', 'doctor_account_id'),
			'patientAccount' => array(self::BELONGS_TO, 'Account', 'patient_account_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'patient_account_id' => 'Patient Account',
			'doctor_account_id' => 'Doctor Account',
			'prescription' => 'Prescription',
			'date_of_prescription' => 'Date Of Prescription',
			'status_id' => 'Status',
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
		$criteria->compare('patient_account_id',$this->patient_account_id);
		$criteria->compare('doctor_account_id',$this->doctor_account_id);
		$criteria->compare('prescription',$this->prescription,true);
		$criteria->compare('date_of_prescription',$this->date_of_prescription,true);
		$criteria->compare('status_id',$this->status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
{
    if (parent::beforeSave()) {
        if ($this->isNewRecord) {
            // Set default values for new records
            $this->date_of_prescription = date('Y-m-d H:i:s');
            // Set default value for consultation_id if it's null
            $this->consultation_id = ($this->consultation_id !== null) ? $this->consultation_id : 1; // Adjust the default value as needed
        }

        return true;
    }

    return false;
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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prescription the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
