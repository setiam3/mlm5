<?php

/**
 * This is the model class for table "setting_level".
 *
 * The followings are the available columns in table 'setting_level':
 * @property integer $id
 * @property string $level
 * @property integer $member
 * @property string $keterangan
 */
class SettingLevel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SettingLevel the static model class
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
		return 'setting_level';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, level, member', 'required'),
			array('id, member', 'numerical', 'integerOnly'=>true),
			array('keterangan', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, level, member, keterangan', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'level' => 'Level',
			'member' => 'Member',
			'keterangan' => 'Keterangan',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('member',$this->member);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}