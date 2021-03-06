<?php

/**
 * This is the model class for table "profiles".
 *
 * The followings are the available columns in table 'profiles':
 * @property integer $user_id
 * @property string $nik
 * @property string $nama
 * @property string $alamat
 * @property string $birthday
 * @property string $hp
 * @property string $bank
 * @property string $rekening
 */
class Profil extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Profil the static model class
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
		return 'profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, nik, nama, alamat', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('nik, nama, alamat', 'length', 'max'=>45),
			array('hp', 'length', 'max'=>15),
			array('bank', 'length', 'max'=>50),
			array('rekening', 'length', 'max'=>30),
			array('birthday', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, nik, nama, alamat, birthday, hp, bank, rekening', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'nik' => 'Nik',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'birthday' => 'Birthday',
			'hp' => 'Hp',
			'bank' => 'Bank',
			'rekening' => 'Rekening',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('nik',$this->nik,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('bank',$this->bank,true);
		$criteria->compare('rekening',$this->rekening,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}