<?php

/**
 * This is the model class for table "lcs_student_educational_background".
 *
 * The followings are the available columns in table 'lcs_student_educational_background':
 * @property integer $educ_id
 * @property string $educ_school_name
 * @property string $educ_school_type
 * @property string $educ_school_address
 * @property string $educ_years_attended
 * @property string $educ_fromto_date
 * @property string $educ_extracurricular
 * @property string $educ_position
 * @property string $educ_achievements
 * @property integer $student_id
 *
 * The followings are the available model relations:
 * @property LcsStudent $student
 */
class LcsStudentEducationalBackground extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsStudentEducationalBackground the static model class
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
		return 'lcs_student_educational_background';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('educ_school_name, educ_school_type, educ_school_address, student_id', 'required'),
			array('student_id', 'numerical', 'integerOnly'=>true),
			array('educ_school_name', 'length', 'max'=>100),
			array('educ_school_type, educ_position', 'length', 'max'=>50),
			array('educ_years_attended', 'length', 'max'=>5),
			array('educ_fromto_date', 'length', 'max'=>20),
			array('educ_extracurricular, educ_achievements', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('educ_id, educ_school_name, educ_school_type, educ_school_address, educ_years_attended, educ_fromto_date, educ_extracurricular, educ_position, educ_achievements, student_id', 'safe', 'on'=>'search'),
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
			'educ_id' => 'Educ',
			'educ_school_name' => 'Educ School Name',
			'educ_school_type' => 'Educ School Type',
			'educ_school_address' => 'Educ School Address',
			'educ_years_attended' => 'Educ Years Attended',
			'educ_fromto_date' => 'Educ Fromto Date',
			'educ_extracurricular' => 'Educ Extracurricular',
			'educ_position' => 'Educ Position',
			'educ_achievements' => 'Educ Achievements',
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

		$criteria->compare('educ_id',$this->educ_id);
		$criteria->compare('educ_school_name',$this->educ_school_name,true);
		$criteria->compare('educ_school_type',$this->educ_school_type,true);
		$criteria->compare('educ_school_address',$this->educ_school_address,true);
		$criteria->compare('educ_years_attended',$this->educ_years_attended,true);
		$criteria->compare('educ_fromto_date',$this->educ_fromto_date,true);
		$criteria->compare('educ_extracurricular',$this->educ_extracurricular,true);
		$criteria->compare('educ_position',$this->educ_position,true);
		$criteria->compare('educ_achievements',$this->educ_achievements,true);
		$criteria->compare('student_id',$this->student_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}