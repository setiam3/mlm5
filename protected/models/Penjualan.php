<?php

/**
 * This is the model class for table "penjualan".
 *
 * The followings are the available columns in table 'penjualan':
 * @property integer $id
 * @property string $kode_penjualan
 * @property string $kode_pesan
 * @property string $kode_member
 * @property string $tanggal
 * @property double $grandtotal
 */
class Penjualan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Penjualan the static model class
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
		return 'penjualan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_penjualan, kode_pesan, kode_member, tanggal, grandtotal', 'required'),
			array('grandtotal', 'numerical'),
			array('kode_penjualan, kode_pesan, kode_member', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_penjualan, kode_pesan, kode_member, tanggal, grandtotal', 'safe', 'on'=>'search'),
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
			'kode_penjualan' => 'Kode Penjualan',
			'kode_pesan' => 'Kode Pesan',
			'kode_member' => 'Kode Member',
			'tanggal' => 'Tanggal',
			'grandtotal' => 'Grandtotal',
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
		$criteria->compare('kode_penjualan',$this->kode_penjualan,true);
		$criteria->compare('kode_pesan',$this->kode_pesan,true);
		$criteria->compare('kode_member',$this->kode_member,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('grandtotal',$this->grandtotal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}