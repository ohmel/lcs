<?php

/**
 * This is the model class for table "lcs_student_requirements".
 *
 * The followings are the available columns in table 'lcs_student_requirements':
 * @property integer $requirement_id
 * @property string $requirement_doc
 * @property string $requirement_date_passed
 * @property string $requirement_remarks
 * @property integer $student_id
 *
 * The followings are the available model relations:
 * @property LcsStudent $student
 */
class LcsStudentRequirements extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsStudentRequirements the static model class
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
		return 'lcs_student_requirements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('requirement_doc, requirement_date_passed, requirement_remarks, student_id', 'required'),
			array('student_id', 'numerical', 'integerOnly'=>true),
			array('requirement_doc', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('requirement_id, requirement_doc, requirement_date_passed, requirement_remarks, student_id', 'safe', 'on'=>'search'),
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
			'requirement_id' => 'Requirement',
			'requirement_doc' => 'Requirement Doc',
			'requirement_date_passed' => 'Requirement Date Passed',
			'requirement_remarks' => 'Requirement Remarks',
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

		$criteria->compare('requirement_id',$this->requirement_id);
		$criteria->compare('requirement_doc',$this->requirement_doc,true);
		$criteria->compare('requirement_date_passed',$this->requirement_date_passed,true);
		$criteria->compare('requirement_remarks',$this->requirement_remarks,true);
		$criteria->compare('student_id',$this->student_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}