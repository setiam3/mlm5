<?php

/**
 * This is the model class for table "t_order".
 *
 * The followings are the available columns in table 't_order':
 * @property integer $id
 * @property string $no_jo
 * @property string $tanggal_jo
 * @property string $service
 * @property string $stuffing
 * @property string $POL
 * @property string $tujuan
 * @property string $pengirim
 * @property string $telp_pengirim
 * @property string $penerima
 * @property string $telp_penerima
 * @property string $kapal
 * @property string $voyage
 * @property string $ETD
 * @property string $ETA
 * @property string $status
 * @property string $operator
 * @property string $agen
 * @property string $customer
 *
 * The followings are the available model relations:
 * @property Kontainerjo[] $kontainerjos
 * @property TDetail[] $tDetails
 * @property Userjo[] $userjos
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_order';
	}
        
        public $komoditi;
        /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_jo, tanggal_jo, service, stuffing, POL, tujuan, pengirim, ', 'required'),
			array('no_jo, service', 'length', 'max'=>50),
			array('stuffing', 'length', 'max'=>100),
			array('POL, tujuan, pengirim, penerima, kapal, voyage, status, operator, agen, customer', 'length', 'max'=>255),
			array('telp_pengirim, telp_penerima', 'length', 'max'=>15),
			array('ETD, ETA', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, no_jo, tanggal_jo, service, stuffing, POL, tujuan, pengirim, telp_pengirim, penerima, telp_penerima, kapal, voyage, ETD, ETA, status, operator, agen, customer,komoditi,pelayaran', 'safe', 'on'=>'search'),
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
			'kontainerjos' => array(self::HAS_MANY, 'Kontainerjo', 'no_jo'),
			'tDetails' => array(self::HAS_MANY, 'TDetail', 'resi_detail'),
			'userjos' => array(self::HAS_MANY, 'Userjo', 'nojo'),
			//'kapaljo' => array(self::HAS_MANY, 'Kapal', 'nama_kapal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'no_jo' => 'No JO',
			'tanggal_jo' => 'Tanggal Stuffing',
			'service' => 'Service',
			'stuffing' => 'Stuffing / Stripping',
			'POL' => 'POL',
			'tujuan' => 'POD',
			'pengirim' => 'Pengirim',
			'telp_pengirim' => 'Telp Pengirim',
			'penerima' => 'Penerima',
			'telp_penerima' => 'Telp Penerima',
			'kapal' => 'Kapal',
			'voyage' => 'Voyage',
			'ETD' => 'Etd',
			'ETA' => 'Eta',
			'status' => 'Status',
			'operator' => 'Operasional Staff',
			'agen' => 'Agen / Cabang',
			'customer' => 'Customer',
			'komoditi' => 'Komoditi',
			'pelayaran'=>'Pelayaran'
		);
	}
	public function nojo(){
        $user=Yii::app()->user->name;
		$criteria=new CDbCriteria;
            switch (Controller::getrole()) {
                case 'agen':$criteria->addCondition("agen='$user'");
                			$criteria->addCondition("status <>'Delivery Complete' or status is NULL");
                    break;
                case 'operasional':$criteria->addCondition("operator='$user'");
                			$criteria->addCondition("status <>'Delivery Complete' or status is NULL");
                    break;
                case 'customer':$criteria->addCondition("customer='$user'");
                			$criteria->addCondition("status <>'Delivery Complete' or status is NULL");
                    break;
                default: $criteria->addCondition("status <>'Delivery Complete' or status is NULL");
                    break;
            }
            return Order::model()->findAll($criteria);
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
	public function search(array $columns)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
            if (isset($_GET['sSearch'])) {
			$criteria->compare('t.no_jo',$_GET['sSearch'],true,'OR');
			$criteria->compare('tanggal_jo',$_GET['sSearch'],true,'OR');
            $criteria->compare('customer',$_GET['sSearch'],true,'OR');
			$criteria->compare('stuffing',$_GET['sSearch'],true,'OR');
			$criteria->compare('status',$_GET['sSearch'],true,'OR');
			$criteria->compare('tujuan',$_GET['sSearch'],true,'OR');
			$criteria->with= array(
				'kontainerjos'=>array('select'=>'komoditi'),
				);
            $criteria->join='LEFT OUTER JOIN kapal kpl on t.kapal=kpl.nama_kapal';
			$criteria->compare('kpl.pelayaran',$_GET['sSearch'],true,'OR');
			$criteria->compare('komoditi',$_GET['sSearch'],true,'OR');
			$criteria->together=true;
		}
		$criteria->compare('id',$this->id);
		$criteria->compare('no_jo',$this->no_jo,true);
		$criteria->compare('tanggal_jo',Controller::tanggal_indo($this->tanggal_jo),true);
		$criteria->compare('service',$this->service,true);
		$criteria->compare('stuffing',$this->stuffing,true);
		$criteria->compare('POL',$this->POL,true);
		$criteria->compare('tujuan',$this->tujuan,true);
		$criteria->compare('pengirim',$this->pengirim,true);
		$criteria->compare('telp_pengirim',$this->telp_pengirim,true);
		$criteria->compare('penerima',$this->penerima,true);
		$criteria->compare('telp_penerima',$this->telp_penerima,true);
		$criteria->compare('kapal',$this->kapal,true);
		$criteria->compare('voyage',$this->voyage,true);
		$criteria->compare('ETD',$this->ETD,true);
		$criteria->compare('ETA',$this->ETA,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('operator',$this->operator,true);
		$criteria->compare('agen',$this->agen,true);
		$criteria->compare('customer',$this->customer,true);
		switch (Controller::getrole()) {
                    case 'agen':$criteria->addCondition('agen="'.Yii::app()->user->name.'"');
                        break;
                    case 'operasional':$criteria->addCondition('operator="'.Yii::app()->user->name.'"');
                        break;
                    case 'customer':$criteria->addCondition('customer="'.Yii::app()->user->name.'"');
                        break;
                    default:
                        break;
                }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'sort'=>new EDTSort(__CLASS__, $columns,array('no_jo'=>'desc')),
			'pagination'=>new EDTPagination,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
