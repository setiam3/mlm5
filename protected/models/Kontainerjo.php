<?php

/**
 * This is the model class for table "kontainerjo".
 *
 * The followings are the available columns in table 'kontainerjo':
 * @property integer $id
 * @property string $no_jo
 * @property string $nomor_kontainer, $type_kontainer
 * @property string $komoditi
 * @property string $nopol
 * @property string $supir
 * @property string $foto
 *
 * The followings are the available model relations:
 * @property TOrder $noJo
 */
class Kontainerjo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kontainerjo';
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
			array('no_jo, nomor_kontainer,type_kontainer', 'length', 'max'=>100),
			array('komoditi, supir, foto', 'length', 'max'=>255),
			array('nopol', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, no_jo,customer, nomor_kontainer,type_kontainer, komoditi, nopol, supir,foto2, foto,kapal,pelayaran', 'safe', 'on'=>'search'),
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
			'noJo' => array(self::BELONGS_TO, 'Order', 'no_jo'),
			//'kpl' => array(self::BELONGS_TO, 'Kapal', 'noJo.kapal'),
		);
	}
	public function nojo(){
            $user=Yii::app()->user->name;
		$criteria=new CDbCriteria;
                switch (Controller::getrole()) {
                    case 'agen':$criteria->addCondition("agen='$user'");
                        break;
                    case 'operasional':$criteria->addCondition("operator='$user'");
                        break;
                    case 'customer':$criteria->addCondition("customer='$user'");
                        break;
                    default: $criteria->addCondition("status <>'Delivery Complete' or status is NULL");
                        break;
                }
                return Containerjo::model()->findAll($criteria);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'no_jo' => 'No Jo',
			'customer'=>'Customer',
			'tujuan'=>'Tujuan',
			'nomor_kontainer' => 'Nomor Kontainer / Seal',
			'type_kontainer'=>'Type Kontainer',
			'komoditi' => 'Komoditi',
			'nopol' => 'Nopol',
			'supir' => 'Supir',
			'foto' => 'Foto',
			'foto2' => 'Foto',
			'kapal'=>'Kapal',
			'pelayaran'=>'Pelayaran'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public $customer;
	public $tujuan;
	public $kapal;
	public $pelayaran;
	public function search(array $columns)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		if (isset($_GET['sSearch'])) {
			$criteria->join='LEFT OUTER JOIN `t_order` `noJo` ON (`t`.`no_jo`=`noJo`.`no_jo`) 
			LEFT OUTER JOIN kapal kpl on (noJo.kapal=kpl.nama_kapal)';
			$criteria->compare('t.no_jo',$_GET['sSearch'],true,'OR');
			$criteria->compare('nomor_kontainer',$_GET['sSearch'],true,'OR');
			$criteria->compare('type_kontainer',$_GET['sSearch'],true,'OR');
			$criteria->compare('komoditi',$_GET['sSearch'],true,'OR');
			$criteria->compare('nopol',$_GET['sSearch'],true,'OR');
			$criteria->compare('supir',$_GET['sSearch'],true,'OR');
			$criteria->compare('noJo.customer',$_GET['sSearch'],true,'OR');
			$criteria->compare('noJo.tujuan',$_GET['sSearch'],true,'OR');
			$criteria->compare('noJo.kapal',$_GET['sSearch'],true,'OR');
			$criteria->compare('kpl.pelayaran',$_GET['sSearch'],true,'OR');
		}
		$criteria->compare('id',$this->id);
		$criteria->compare('t.no_jo',$this->no_jo,true);
		$criteria->compare('nomor_kontainer',$this->nomor_kontainer,true);
		$criteria->compare('type_kontainer',$this->type_kontainer,true);
		$criteria->compare('komoditi',$this->komoditi,true);
		$criteria->compare('nopol',$this->nopol,true);
		$criteria->compare('supir',$this->supir,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('foto2',$this->foto2,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>new EDTSort(__CLASS__, $columns,array('id'=>'desc')),
			'pagination'=>new EDTPagination,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kontainerjo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
