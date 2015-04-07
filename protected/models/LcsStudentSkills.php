<?php

/**
 * This is the model class for table "lcs_student_skills".
 *
 * The followings are the available columns in table 'lcs_student_skills':
 * @property integer $skill_id
 * @property string $skill_name
 * @property integer $student_id
 *
 * The followings are the available model relations:
 * @property LcsStudent $student
 */
class LcsStudentSkills extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsStudentSkills the static model class
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
		return 'lcs_student_skills';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skill_name, student_id', 'required'),
			array('student_id', 'numerical', 'integerOnly'=>true),
			array('skill_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('skill_id, skill_name, student_id', 'safe', 'on'=>'search'),
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
			'skill_id' => 'Skill',
			'skill_name' => 'Skill Name',
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

		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('skill_name',$this->skill_name,true);
		$criteria->compare('student_id',$this->student_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}