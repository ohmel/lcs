<?php

/**
 * This is the model class for table "lcs_course_subjects".
 *
 * The followings are the available columns in table 'lcs_course_subjects':
 * @property integer $subject_id
 * @property integer $course_id
 * @property integer $pre_subject_id
 * @property string $subject_name
 * @property string $subject_description
 * @property integer $subject_status
 * @property string $subject_type
 *
 * The followings are the available model relations:
 * @property LcsCourse $course
 */
class LcsCourseSubjects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsCourseSubjects the static model class
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
		return 'lcs_course_subjects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, pre_subject_id, subject_name, subject_description, subject_status, subject_type', 'required'),
			array('course_id, pre_subject_id, subject_status', 'numerical', 'integerOnly'=>true),
			array('subject_name', 'length', 'max'=>100),
			array('subject_type', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subject_id, course_id, pre_subject_id, subject_name, subject_description, subject_status, subject_type', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'LcsCourse', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subject_id' => 'Subject',
			'course_id' => 'Course',
			'pre_subject_id' => 'Pre Subject',
			'subject_name' => 'Subject Name',
			'subject_description' => 'Subject Description',
			'subject_status' => 'Subject Status',
			'subject_type' => 'Subject Type',
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

		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('pre_subject_id',$this->pre_subject_id);
		$criteria->compare('subject_name',$this->subject_name,true);
		$criteria->compare('subject_description',$this->subject_description,true);
		$criteria->compare('subject_status',$this->subject_status);
		$criteria->compare('subject_type',$this->subject_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}