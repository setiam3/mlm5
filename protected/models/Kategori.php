<?php

/**
 * This is the model class for table "m_kategori".
 *
 * The followings are the available columns in table 'm_kategori':
 * @property integer $id
 * @property string $nama_kategori
 * @property string $detail_kategori
 * @property string $kode_kategori
 */
class Kategori extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Kategori the static model class
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
		return 'm_kategori';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_kategori, detail_kategori, kode_kategori', 'required'),
			array('nama_kategori, detail_kategori, kode_kategori', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_kategori, detail_kategori, kode_kategori', 'safe', 'on'=>'search'),
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
			'nama_kategori' => 'Nama Kategori',
			'detail_kategori' => 'Detail Kategori',
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
		$criteria->compare('nama_kategori',$this->nama_kategori,true);
		$criteria->compare('detail_kategori',$this->detail_kategori,true);
		$criteria->compare('kode_kategori',$this->kode_kategori,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}