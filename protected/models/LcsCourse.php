<?php

/**
 * This is the model class for table "lcs_course".
 *
 * The followings are the available columns in table 'lcs_course':
 * @property integer $course_id
 * @property string $course_name
 * @property string $course_description
 * @property integer $course_status
 *
 * The followings are the available model relations:
 * @property LcsStudent[] $lcsStudents
 */
class LcsCourse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsCourse the static model class
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
		return 'lcs_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_name, course_description, course_status', 'required'),
			array('course_status', 'numerical', 'integerOnly'=>true),
			array('course_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('course_id, course_name, course_description, course_status', 'safe', 'on'=>'search'),
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
			'students' => array(self::HAS_MANY, 'LcsStudent', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'course_id' => 'Course',
			'course_name' => 'Course Name',
			'course_description' => 'Course Description',
			'course_status' => 'Course Status',
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

		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('course_name',$this->course_name,true);
		$criteria->compare('course_description',$this->course_description,true);
		$criteria->compare('course_status',$this->course_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}