<?php

/**
 * This is the model class for table "setting_bonus".
 *
 * The followings are the available columns in table 'setting_bonus':
 * @property integer $id
 * @property string $jenis_bonus
 * @property double $bonus
 * @property string $param
 * @property string $keterangan
 */
class SettingBonus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SettingBonus the static model class
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
		return 'setting_bonus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jenis_bonus, bonus', 'required'),
			array('bonus', 'numerical'),
			array('jenis_bonus, param', 'length', 'max'=>25),
			array('keterangan', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, jenis_bonus, bonus, param, keterangan', 'safe', 'on'=>'search'),
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
			'jenis_bonus' => 'Jenis Bonus',
			'bonus' => 'Bonus',
			'param' => 'Param',
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
		$criteria->compare('jenis_bonus',$this->jenis_bonus,true);
		$criteria->compare('bonus',$this->bonus);
		$criteria->compare('param',$this->param,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}