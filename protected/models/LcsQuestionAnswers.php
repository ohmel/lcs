<?php

/**
 * This is the model class for table "lcs_question_answers".
 *
 * The followings are the available columns in table 'lcs_question_answers':
 * @property integer $answer_id
 * @property string $answer
 * @property integer $answer_correct
 * @property integer $question_id
 *
 * The followings are the available model relations:
 * @property LcsTestsQuestions $question
 */
class LcsQuestionAnswers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsQuestionAnswers the static model class
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
		return 'lcs_question_answers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('answer, answer_correct, question_id', 'required'),
			array('answer_correct, question_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('answer_id, answer, answer_correct, question_id', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'LcsTestsQuestions', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'answer_id' => 'Answer',
			'answer' => 'Answer',
			'answer_correct' => 'Answer Correct',
			'question_id' => 'Question',
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

		$criteria->compare('answer_id',$this->answer_id);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('answer_correct',$this->answer_correct);
		$criteria->compare('question_id',$this->question_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}