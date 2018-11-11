<?php

/**
 * This is the model class for table "m_member".
 *
 * The followings are the available columns in table 'm_member':
 * @property integer $id
 * @property string $kode_member
 * @property string $userid
 * @property string $password
 * @property string $nama
 * @property string $alamat
 * @property string $kota
 * @property string $hp
 * @property string $bank
 * @property string $nomor_rekening
 * @property string $ktp
 * @property string $email
 * @property string $kode_upline
 * @property string $tanggal_daftar
 * @property string $level
 * @property integer $poin
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
		return 'm_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_member, userid, password, nama, alamat, kota, hp, bank, nomor_rekening, ktp, email, kode_upline, ', 'required'),
			array('poin', 'numerical', 'integerOnly'=>true),
			array('kode_member, userid, password, nama, alamat, kota, bank, nomor_rekening, ktp, email, kode_upline, level,sponsor', 'length', 'max'=>45),
			array('hp', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_member, userid, password, nama, alamat, kota, hp, bank, nomor_rekening, ktp, email, kode_upline, tanggal_daftar, level, poin,sponsor', 'safe', 'on'=>'search'),
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
			'kode_member' => 'Kode Member',
			'userid' => 'Userid',
			'password' => 'Password',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'kota' => 'Kota',
			'hp' => 'Hp',
			'bank' => 'Bank',
			'nomor_rekening' => 'Nomor Rekening',
			'ktp' => 'Ktp',
			'email' => 'Email',
			'kode_upline' => 'Kode Upline',
			'tanggal_daftar' => 'Tanggal Daftar',
			'level' => 'Level',
			'poin' => 'Poin',
			'sponsor' => 'Sponsor',
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
			$criteria->compare('nama',$_GET['sSearch'],true,'OR');
            $criteria->compare('alamat',$_GET['sSearch'],true,'OR');
			$criteria->compare('ktp',$_GET['sSearch'],true,'OR');
			$criteria->compare('email',$_GET['sSearch'],true,'OR');
			$criteria->compare('level',$_GET['sSearch'],true,'OR');
		}

		$criteria->compare('id',$this->id);
		$criteria->compare('kode_member',$this->kode_member,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('bank',$this->bank,true);
		$criteria->compare('nomor_rekening',$this->nomor_rekening,true);
		$criteria->compare('ktp',$this->ktp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('kode_upline',$this->kode_upline,true);
		$criteria->compare('tanggal_daftar',$this->tanggal_daftar,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('poin',$this->poin);
		$criteria->compare('sponsor',$this->sponsor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>new EDTSort(__CLASS__, $columns,array('id'=>'desc')),
			'pagination'=>new EDTPagination,
		));
	}
	public function afterSave(){
		parent::afterSave();
		if($this->isNewRecord){
			Controller::hitungbonusgetmember($this->kode_upline,$this->kode_member);
			Controller::upgradelevel($this->kode_upline);
			Controller::bonussponsor($this->sponsor,$this->kode_member);
		}
	}
}