<?php

/**
 * This is the model class for table "lcs_tests".
 *
 * The followings are the available columns in table 'lcs_tests':
 * @property integer $test_id
 * @property string $test_name
 * @property string $test_descrption
 * @property integer $test_status
 *
 * The followings are the available model relations:
 * @property LcsTestsQuestions[] $lcsTestsQuestions
 */
class LcsTests extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LcsTests the static model class
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
		return 'lcs_tests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_name, test_descrption, test_status', 'required'),
			array('test_status', 'numerical', 'integerOnly'=>true),
			array('test_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('test_id, test_name, test_descrption, test_status', 'safe', 'on'=>'search'),
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
			'lcsTestsQuestions' => array(self::HAS_MANY, 'LcsTestsQuestions', 'test_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'test_id' => 'Test',
			'test_name' => 'Test Name',
			'test_descrption' => 'Test Descrption',
			'test_status' => 'Test Status',
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

		$criteria->compare('test_id',$this->test_id);
		$criteria->compare('test_name',$this->test_name,true);
		$criteria->compare('test_descrption',$this->test_descrption,true);
		$criteria->compare('test_status',$this->test_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}