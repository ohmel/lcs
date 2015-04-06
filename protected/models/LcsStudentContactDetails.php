<?php

/**
 * This is the model class for table "lcs_student_contact_details".
 *
 * The followings are the available columns in table 'lcs_student_contact_details':
 * @property integer $contact_id
 * @property string $contact_name
 * @property string $contact_relationship
 * @property string $contact_mobile
 * @property string $contact_tel
 * @property string $contact_address
 * @property integer $student_id
 *
 * The followings are the available model relations:
 * @property LcsStudent $student
 */
class LcsStudentContactDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsStudentContactDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lcs_student_contact_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contact_name, contact_relationship, contact_mobile, contact_tel, contact_address, student_id', 'required'),
			array('student_id', 'numerical', 'integerOnly'=>true),
			array('contact_name', 'length', 'max'=>100),
			array('contact_relationship', 'length', 'max'=>20),
			array('contact_mobile, contact_tel', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('contact_id, contact_name, contact_relationship, contact_mobile, contact_tel, contact_address, student_id', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'LcsStudent', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'contact_id' => 'Contact',
			'contact_name' => 'Contact Name',
			'contact_relationship' => 'Contact Relationship',
			'contact_mobile' => 'Contact Mobile',
			'contact_tel' => 'Contact Tel',
			'contact_address' => 'Contact Address',
			'student_id' => 'Student',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('contact_name',$this->contact_name,true);
		$criteria->compare('contact_relationship',$this->contact_relationship,true);
		$criteria->compare('contact_mobile',$this->contact_mobile,true);
		$criteria->compare('contact_tel',$this->contact_tel,true);
		$criteria->compare('contact_address',$this->contact_address,true);
		$criteria->compare('student_id',$this->student_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}