<?php

/**
 * This is the model class for table "{{clinic_assignment}}".
 *
 * The followings are the available columns in table '{{clinic_assignment}}':
 * @property integer $id
 * @property integer $account_id
 * @property integer $clinic_id
 * @property integer $status_id
 *
 * The followings are the available model relations:
 * @property Account $account
 * @property Clinic $clinic
 * @property Status $status
 */
class ClinicAssignment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{clinic_assignment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_id, clinic_id, status_id', 'required'),
			array('account_id, clinic_id, status_id', 'numerical', 'integerOnly'=>true),
			array('availability_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, account_id, clinic_id, status_id', 'safe', 'on'=>'search'),
		);
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
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
			'clinic' => array(self::BELONGS_TO, 'Clinic', 'clinic_id'),
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
			'account_id' => 'Account',
			'clinic_id' => 'Clinic',
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
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('clinic_id',$this->clinic_id);
		$criteria->compare('status_id',$this->status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClinicAssignment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
