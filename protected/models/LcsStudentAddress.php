<?php

/**
 * This is the model class for table "lcs_student_address".
 *
 * The followings are the available columns in table 'lcs_student_address':
 * @property integer $address_id
 * @property string $address_details
 * @property string $address_street
 * @property string $address_province
 * @property string $address_city
 * @property string $address_country
 * @property string $address_zip
 * @property integer $student_id
 *
 * The followings are the available model relations:
 * @property LcsStudent $student
 */
class LcsStudentAddress extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsStudentAddress the static model class
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
		return 'lcs_student_address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address_details, address_street, address_province, address_city, address_country, address_zip, student_id', 'required'),
			array('student_id', 'numerical', 'integerOnly'=>true),
			array('address_street, address_province, address_city, address_country', 'length', 'max'=>50),
			array('address_zip', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('address_id, address_details, address_street, address_province, address_city, address_country, address_zip, student_id', 'safe', 'on'=>'search'),
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
			'address_id' => 'Address',
			'address_details' => 'Address Details',
			'address_street' => 'Address Street',
			'address_province' => 'Address Province',
			'address_city' => 'Address City',
			'address_country' => 'Address Country',
			'address_zip' => 'Address Zip',
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

		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('address_details',$this->address_details,true);
		$criteria->compare('address_street',$this->address_street,true);
		$criteria->compare('address_province',$this->address_province,true);
		$criteria->compare('address_city',$this->address_city,true);
		$criteria->compare('address_country',$this->address_country,true);
		$criteria->compare('address_zip',$this->address_zip,true);
		$criteria->compare('student_id',$this->student_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}