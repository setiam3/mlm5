<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $createtime
 * @property integer $lastvisit
 * @property integer $status
 * @property string $level
 * @property string $kode_member
 * @property string $kode_upline
 * @property string $sponsor
 * @property string $nik
 * @property string $nama
 * @property string $alamat
 * @property string $birthday
 * @property string $hp
 * @property string $bank
 * @property string $rekening
 */
class Member extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Member the static model class
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
		return 'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, kode_member, kode_upline, nik, nama, alamat', 'required'),
			array('id, createtime, lastvisit, status', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('password, email', 'length', 'max'=>128),
			array('level, bank', 'length', 'max'=>50),
			array('kode_member, kode_upline, sponsor, nik, nama, alamat', 'length', 'max'=>45),
			array('hp', 'length', 'max'=>15),
			array('rekening', 'length', 'max'=>30),
			array('birthday', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, createtime, lastvisit, status, level, kode_member, kode_upline, sponsor, nik, nama, alamat, birthday, hp, bank, rekening', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'createtime' => 'Createtime',
			'lastvisit' => 'Lastvisit',
			'status' => 'Status',
			'level' => 'Level',
			'kode_member' => 'Kode Member',
			'kode_upline' => 'Kode Upline',
			'sponsor' => 'Sponsor',
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
	public function search(array $columns)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		if (isset($_GET['sSearch'])) {
			$criteria->compare('kode_member',$_GET['sSearch'],true,'OR');
			$criteria->compare('username',$_GET['sSearch'],true,'OR');
            $criteria->compare('kode_upline',$_GET['sSearch'],true,'OR');
			$criteria->compare('nama',$_GET['sSearch'],true,'OR');
			$criteria->compare('alamat',$_GET['sSearch'],true,'OR');
			$criteria->compare('bank',$_GET['sSearch'],true,'OR');
			$criteria->compare('rekening',$_GET['sSearch'],true,'OR');
			$criteria->compare('sponsor',$_GET['sSearch'],true,'OR');
			$criteria->compare('nik',$_GET['sSearch'],true,'OR');
			$criteria->compare('level',$_GET['sSearch'],true,'OR');
		}

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('lastvisit',$this->lastvisit);
		$criteria->compare('status',$this->status);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('kode_member',$this->kode_member,true);
		$criteria->compare('kode_upline',$this->kode_upline,true);
		$criteria->compare('sponsor',$this->sponsor,true);
		$criteria->compare('nik',$this->nik,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('bank',$this->bank,true);
		$criteria->compare('rekening',$this->rekening,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>new EDTSort(__CLASS__, $columns,array('id'=>'desc')),
			'pagination'=>new EDTPagination,
		));
	}
}