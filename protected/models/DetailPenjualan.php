<?php

/**
 * This is the model class for table "detail_penjualan".
 *
 * The followings are the available columns in table 'detail_penjualan':
 * @property integer $id
 * @property string $kode_penjualan
 * @property string $kode_barang
 * @property string $ukuran_barang
 * @property integer $jumlah_barang
 */
class DetailPenjualan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetailPenjualan the static model class
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
		return 'detail_penjualan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_penjualan, kode_barang, ukuran_barang, jumlah_barang', 'required'),
			array('jumlah_barang', 'numerical', 'integerOnly'=>true),
			array('kode_penjualan, kode_barang, ukuran_barang', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_penjualan, kode_barang, ukuran_barang, jumlah_barang', 'safe', 'on'=>'search'),
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
			'kode_barang' => 'Kode Barang',
			'ukuran_barang' => 'Ukuran Barang',
			'jumlah_barang' => 'Jumlah Barang',
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
		$criteria->compare('kode_barang',$this->kode_barang,true);
		$criteria->compare('ukuran_barang',$this->ukuran_barang,true);
		$criteria->compare('jumlah_barang',$this->jumlah_barang);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}