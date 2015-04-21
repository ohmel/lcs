<?php

/**
 * This is the model class for table "lcs_tests_questions".
 *
 * The followings are the available columns in table 'lcs_tests_questions':
 * @property integer $question_id
 * @property string $question
 * @property string $question_type
 * @property integer $question_status
 * @property integer $test_id
 *
 * The followings are the available model relations:
 * @property LcsQuestionAnswers[] $lcsQuestionAnswers
 * @property LcsTests $test
 */
class LcsTestsQuestions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsTestsQuestions the static model class
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
		return 'lcs_tests_questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, question_type, question_status, test_id', 'required'),
			array('question_status, test_id', 'numerical', 'integerOnly'=>true),
			array('question_type', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('question_id, question, question_type, question_status, test_id', 'safe', 'on'=>'search'),
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
			'lcsQuestionAnswers' => array(self::HAS_MANY, 'LcsQuestionAnswers', 'question_id'),
			'test' => array(self::BELONGS_TO, 'LcsTests', 'test_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'question_id' => 'Question',
			'question' => 'Question',
			'question_type' => 'Question Type',
			'question_status' => 'Question Status',
			'test_id' => 'Test',
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

		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('question_type',$this->question_type,true);
		$criteria->compare('question_status',$this->question_status);
		$criteria->compare('test_id',$this->test_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}