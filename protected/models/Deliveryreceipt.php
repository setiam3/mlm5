<?php

/**
 * This is the model class for table "deliveryreceipt".
 *
 * The followings are the available columns in table 'deliveryreceipt':
 * @property integer $id
 * @property string $nomor_dr
 * @property string $kapal
 * @property string $voyage
 * @property string $pelayaran
 * @property string $nomor_kontainer
 * @property string $komoditi
 * @property string $penerima
 * @property string $alamat_penerima
 * @property string $up_penerima
 */
class Deliveryreceipt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Deliveryreceipt the static model class
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
		return 'deliveryreceipt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nomor_dr, kapal, voyage, pelayaran, nomor_kontainer, komoditi, penerima, alamat_penerima, up_penerima', 'required'),
			array('nomor_dr, kapal, voyage, pelayaran, nomor_kontainer, penerima, up_penerima', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nomor_dr, kapal, voyage, pelayaran, nomor_kontainer, komoditi, penerima, alamat_penerima, up_penerima', 'safe', 'on'=>'search'),
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
			'nomor_dr' => 'Nomor D/R',
			'kapal' => 'Kapal',
			'voyage' => 'Voyage',
			'pelayaran' => 'Pelayaran',
			'nomor_kontainer' => 'Nomor Kontainer',
			'komoditi' => 'Komoditi',
			'penerima' => 'Penerima',
			'alamat_penerima' => 'Alamat Penerima',
			'up_penerima' => 'Up Penerima',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search(array $columns)
	{
		$criteria=new CDbCriteria;
		if (isset($_GET['sSearch'])) {
			$criteria->compare('nomor_dr',$_GET['sSearch'],true,'OR');
			$criteria->compare('kapal',$_GET['sSearch'],true,'OR');
			$criteria->compare('voyage',$_GET['sSearch'],true,'OR');
			$criteria->compare('pelayaran',$_GET['sSearch'],true,'OR');
			$criteria->compare('nomor_kontainer',$_GET['sSearch'],true,'OR');
			$criteria->compare('komoditi',$_GET['sSearch'],true,'OR');
			$criteria->compare('penerima',$_GET['sSearch'],true,'OR');
		}

		$criteria->compare('id',$this->id);
		$criteria->compare('nomor_dr',$this->nomor_dr,true);
		$criteria->compare('kapal',$this->kapal,true);
		$criteria->compare('voyage',$this->voyage,true);
		$criteria->compare('pelayaran',$this->pelayaran,true);
		$criteria->compare('nomor_kontainer',$this->nomor_kontainer,true);
		$criteria->compare('komoditi',$this->komoditi,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('alamat_penerima',$this->alamat_penerima,true);
		$criteria->compare('up_penerima',$this->up_penerima,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>new EDTSort(__CLASS__, $columns,array('id'=>'desc')),
			'pagination'=>new EDTPagination,
		));
	}
}