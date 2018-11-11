<?php

/**
 * This is the model class for table "setting_perusahaan".
 *
 * The followings are the available columns in table 'setting_perusahaan':
 * @property integer $id
 * @property string $nama_perusahaan
 * @property string $alamat
 * @property string $telp
 * @property string $email
 * @property string $logo
 */
class SettingPerusahaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SettingPerusahaan the static model class
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
		return 'setting_perusahaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_perusahaan, alamat, telp, email', 'required'),
			array('nama_perusahaan', 'length', 'max'=>45),
			array('telp', 'length', 'max'=>15),
			array('email', 'length', 'max'=>100),
			array('logo', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_perusahaan, alamat, telp, email, logo', 'safe', 'on'=>'search'),
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
			'nama_perusahaan' => 'Nama Perusahaan',
			'alamat' => 'Alamat',
			'telp' => 'Telp',
			'email' => 'Email',
			'logo' => 'Logo',
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
		$criteria->compare('nama_perusahaan',$this->nama_perusahaan,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('logo',$this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}