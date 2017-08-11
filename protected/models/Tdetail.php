<?php

/**
 * This is the model class for table "tdetail".
 *
 * The followings are the available columns in table 'tdetail':
 * @property integer $id
 * @property string $no_jo
 * @property string $date
 * @property string $posisi
 * @property string $keterangan
 * @property string $customer
 * @property string $tujuan
 * @property string $kapal
 * @property string $voyage
 * @property string $pelayaran
 */
class Tdetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tdetail the static model class
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
		return 'tdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_jo, date, posisi', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('no_jo, posisi, keterangan, customer, tujuan, kapal, voyage, pelayaran', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, no_jo, date, posisi, keterangan, customer, tujuan, kapal, voyage, pelayaran', 'safe', 'on'=>'search'),
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
			'no_jo' => 'No Jo',
			'date' => 'Date',
			'posisi' => 'Posisi',
			'keterangan' => 'Keterangan',
			'customer' => 'Customer',
			'tujuan' => 'Tujuan',
			'kapal' => 'Kapal',
			'voyage' => 'Voyage',
			'pelayaran' => 'Pelayaran',
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
			$criteria->compare('no_jo',$_GET['sSearch'],true,'OR');
			$criteria->compare('date',$_GET['sSearch'],true,'OR');
			$criteria->compare('posisi',$_GET['sSearch'],true,'OR');
			$criteria->compare('keterangan',$_GET['sSearch'],true,'OR');
			$criteria->compare('customer',$_GET['sSearch'],true,'OR');
			$criteria->compare('kapal',$_GET['sSearch'],true,'OR');
			$criteria->compare('voyage',$_GET['sSearch'],true,'OR');
			$criteria->compare('tujuan',$_GET['sSearch'],true,'OR');
			$criteria->compare('pelayaran',$_GET['sSearch'],true,'OR');
			$criteria->together=true;
		}
		$criteria->compare('id',$this->id);
		$criteria->compare('no_jo',$this->no_jo,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('posisi',$this->posisi,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('customer',$this->customer,true);
		$criteria->compare('tujuan',$this->tujuan,true);
		$criteria->compare('kapal',$this->kapal,true);
		$criteria->compare('voyage',$this->voyage,true);
		$criteria->compare('pelayaran',$this->pelayaran,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>new EDTSort(__CLASS__, $columns,array('id'=>'desc')),
			'pagination'=>new EDTPagination,
		));
	}
}