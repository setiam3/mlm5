<?php

/**
 * This is the model class for table "containerjo".
 *
 * The followings are the available columns in table 'containerjo':
 * @property integer $id
 * @property string $no_jo
 * @property string $nomor_kontainer
 * @property string $type_kontainer
 * @property string $komoditi
 * @property string $nopol
 * @property string $supir
 * @property string $foto
 * @property string $foto2
 * @property string $customer
 * @property string $tujuan
 * @property string $kapal, $voyage
 * @property string $pelayaran
 */
class Containerjo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Containerjo the static model class
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
		return 'containerjo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_jo, nomor_kontainer', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('no_jo, nomor_kontainer, type_kontainer', 'length', 'max'=>100),
			array('komoditi, supir, foto, foto2, customer,penerima, tujuan, kapal, pelayaran', 'length', 'max'=>255),
			array('nopol', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, no_jo, nomor_kontainer, type_kontainer, komoditi, nopol, supir, foto, foto2,penerima, customer, tujuan, kapal,voyage, pelayaran', 'safe', 'on'=>'search'),
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
			'nomor_kontainer' => 'Nomor Kontainer',
			'type_kontainer' => 'Type Kontainer',
			'komoditi' => 'Komoditi',
			'nopol' => 'Nopol',
			'supir' => 'Supir',
			'foto' => 'Foto',
			'foto2' => 'Foto2',
			'penerima' => 'Penerima',
			'customer' => 'Customer',
			'agen' => 'Agen',
			'operator' => 'Operator',
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
			$criteria->compare('nomor_kontainer',$_GET['sSearch'],true,'OR');
			$criteria->compare('type_kontainer',$_GET['sSearch'],true,'OR');
			$criteria->compare('komoditi',$_GET['sSearch'],true,'OR');
			$criteria->compare('nopol',$_GET['sSearch'],true,'OR');
			$criteria->compare('supir',$_GET['sSearch'],true,'OR');
			$criteria->compare('customer',$_GET['sSearch'],true,'OR');
			$criteria->compare('penerima',$_GET['sSearch'],true,'OR');
			$criteria->compare('tujuan',$_GET['sSearch'],true,'OR');
			$criteria->compare('kapal',$_GET['sSearch'],true,'OR');
			$criteria->compare('voyage',$_GET['sSearch'],true,'OR');
			$criteria->compare('pelayaran',$_GET['sSearch'],true,'OR');
		}
		$criteria->compare('id',$this->id);
		$criteria->compare('no_jo',$this->no_jo,true);
		$criteria->compare('nomor_kontainer',$this->nomor_kontainer,true);
		$criteria->compare('type_kontainer',$this->type_kontainer,true);
		$criteria->compare('komoditi',$this->komoditi,true);
		$criteria->compare('nopol',$this->nopol,true);
		$criteria->compare('supir',$this->supir,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('foto2',$this->foto2,true);
		$criteria->compare('agen',$this->agen,true);
		$criteria->compare('operator',$this->operator,true);
		$criteria->compare('penerima',$this->penerima,true);
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