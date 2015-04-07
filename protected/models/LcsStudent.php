<?php

/**
 * This is the model class for table "lcs_student".
 *
 * The followings are the available columns in table 'lcs_student':
 * @property integer $student_id
 * @property string $student_number
 * @property string $student_firstname
 * @property string $student_lastname
 * @property string $student_middlename
 * @property string $student_gender
 * @property string $student_birthdate
 * @property string $student_age
 * @property string $student_complexion
 * @property string $student_eye_color
 * @property string $student_height
 * @property string $student_religion
 * @property integer $course_id
 * @property integer $student_status
 * @property string $student_bloodtype
 * @property string $student_nationality
 * @property string $student_language
 *
 * The followings are the available model relations:
 * @property LcsStudentAddress[] $lcsStudentAddresses
 * @property LcsStudentContactDetails[] $lcsStudentContactDetails
 * @property LcsStudentEducationalBackground[] $lcsStudentEducationalBackgrounds
 * @property LcsStudentRequirements[] $lcsStudentRequirements
 */
class LcsStudent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsStudent the static model class
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
		return 'lcs_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_number, student_firstname, student_lastname, student_middlename, student_gender, student_birthdate, student_age, student_complexion, student_eye_color, student_height, student_religion, course_id, student_status, student_bloodtype, student_nationality, student_language', 'required'),
			array('course_id, student_status', 'numerical', 'integerOnly'=>true),
			array('student_number, student_firstname, student_lastname, student_middlename', 'length', 'max'=>50),
			array('student_gender, student_bloodtype', 'length', 'max'=>10),
			array('student_age', 'length', 'max'=>3),
			array('student_complexion, student_eye_color, student_height, student_religion, student_nationality, student_language', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_id, student_number, student_firstname, student_lastname, student_middlename, student_gender, student_birthdate, student_age, student_complexion, student_eye_color, student_height, student_religion, course_id, student_status, student_bloodtype, student_nationality, student_language', 'safe', 'on'=>'search'),
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
			'address' => array(self::HAS_ONE, 'LcsStudentAddress', 'student_id'),
			'contact' => array(self::HAS_MANY, 'LcsStudentContactDetails', 'student_id'),
            'requirement' => array(self::HAS_MANY, 'LcsStudentRequirements', 'student_id'),
            'background' => array(self::HAS_MANY, 'LcsStudentEducationalBackground', 'student_id'),
            'skill' => array(self::HAS_MANY, 'LcsStudentSkills', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_id' => 'Student',
			'student_number' => 'Student Number',
			'student_firstname' => 'Student Firstname',
			'student_lastname' => 'Student Lastname',
			'student_middlename' => 'Student Middlename',
			'student_gender' => 'Student Gender',
			'student_birthdate' => 'Student Birthdate',
			'student_age' => 'Student Age',
			'student_complexion' => 'Student Complexion',
			'student_eye_color' => 'Student Eye Color',
			'student_height' => 'Student Height',
			'student_religion' => 'Student Religion',
			'course_id' => 'Course',
			'student_status' => 'Student Status',
			'student_bloodtype' => 'Student Bloodtype',
			'student_nationality' => 'Student Nationality',
			'student_language' => 'Student Language',
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

		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('student_number',$this->student_number,true);
		$criteria->compare('student_firstname',$this->student_firstname,true);
		$criteria->compare('student_lastname',$this->student_lastname,true);
		$criteria->compare('student_middlename',$this->student_middlename,true);
		$criteria->compare('student_gender',$this->student_gender,true);
		$criteria->compare('student_birthdate',$this->student_birthdate,true);
		$criteria->compare('student_age',$this->student_age,true);
		$criteria->compare('student_complexion',$this->student_complexion,true);
		$criteria->compare('student_eye_color',$this->student_eye_color,true);
		$criteria->compare('student_height',$this->student_height,true);
		$criteria->compare('student_religion',$this->student_religion,true);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('student_status',$this->student_status);
		$criteria->compare('student_bloodtype',$this->student_bloodtype,true);
		$criteria->compare('student_nationality',$this->student_nationality,true);
		$criteria->compare('student_language',$this->student_language,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function scopes()
    {
        return array(
            'inactive'=>array(
                'condition'=>'student_status=0',
            ),
            'active'=>array(
                'condition'=>'student_status=1',
            ),
            'dropout'=>array(
                'condition'=>'student_status=2',
            ),
            'kickedout'=>array(
                'condition'=>'student_status=3',
            ),
            'awol'=>array(
                'condition'=>'student_status=4',
            ),
        );
    }

}