<?php

/**
 * This is the model class for table "{{consultation_record}}".
 *
 * The followings are the available columns in table '{{consultation_record}}':
 * @property integer $id
 * @property integer $patient_account_id
 * @property integer $doctor_account_id
 * @property string $subjective
 * @property string $objective
 * @property string $assessment
 * @property string $plan
 * @property string $notes
 * @property integer $prescription_id
 * @property string $date_of_consultation
 * @property integer $status_id
 *
 * The followings are the available model relations:
 * @property Account $doctorAccount
 * @property Account $patientAccount
 * @property Status $status
 */
class ConsultationRecord extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{consultation_record}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patient_account_id, doctor_account_id', 'required'),
			array('patient_account_id, doctor_account_id, status_id', 'numerical', 'integerOnly'=>true),
			array('subjective, objective, assessment, plan, notes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, patient_account_id, doctor_account_id, subjective, objective, assessment, plan, notes, date_of_consultation, status_id', 'safe', 'on'=>'search'),
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
			'subjective' => 'Subjective',
			'objective' => 'Objective',
			'assessment' => 'Assessment',
			'plan' => 'Plan',
			'notes' => 'Notes',
			'prescription_id' => 'Prescription',
			'date_of_consultation' => 'Date Of Consultation',
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
		$criteria->compare('subjective',$this->subjective,true);
		$criteria->compare('objective',$this->objective,true);
		$criteria->compare('assessment',$this->assessment,true);
		$criteria->compare('plan',$this->plan,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('prescription_id',$this->prescription_id);
		$criteria->compare('date_of_consultation',$this->date_of_consultation,true);
		$criteria->compare('status_id',$this->status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{

				$this->date_of_consultation = date('Y-m-d H:i:s');

			}
			else
			{
				return true;
			}
			return true;
		}
		else
		{
			return false;
		}
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
	 * @return ConsultationRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
