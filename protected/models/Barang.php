<?php

/**
 * This is the model class for table "m_barang".
 *
 * The followings are the available columns in table 'm_barang':
 * @property integer $id
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $detail_barang
 * @property string $kode_kategori
 */
class Barang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Barang the static model class
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
		return 'm_barang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_barang, nama_barang, kode_kategori', 'required'),
			array('kode_barang, nama_barang, kode_kategori', 'length', 'max'=>45),
			array('detail_barang', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_barang, nama_barang, detail_barang, kode_kategori', 'safe', 'on'=>'search'),
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
			'kode_barang' => 'Kode Barang',
			'nama_barang' => 'Nama Barang',
			'detail_barang' => 'Detail Barang',
			'kode_kategori' => 'Kode Kategori',
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
		$criteria->compare('kode_barang',$this->kode_barang,true);
		$criteria->compare('nama_barang',$this->nama_barang,true);
		$criteria->compare('detail_barang',$this->detail_barang,true);
		$criteria->compare('kode_kategori',$this->kode_kategori,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}