<?php

/**
 * This is the model class for table "t_detail".
 *
 * The followings are the available columns in table 't_detail':
 * @property integer $id
 * @property string $resi_detail
 * @property string $date
 * @property string $posisi
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property TOrder $resiDetail
 */
class Detail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resi_detail, date, posisi', 'required'),
			array('resi_detail, posisi, keterangan', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, resi_detail, date, posisi, keterangan,customer,tujuan,kapal,voyage,pelayaran', 'safe', 'on'=>'search'),
		);
	}
	public $customer;
	public $tujuan;
	public $kapal;
	public $voyage;
	public $pelayaran;

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'resiDetail' => array(self::BELONGS_TO, 'Order', 'resi_detail'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'resi_detail' => 'Nomor JO',
			'date' => 'Waktu',
			'posisi' => 'Posisi',
			'keterangan' => 'Keterangan',
			'customer'=>'Customer',
			'tujuan'=>'Tujuan',
			'kapal'=>'Kapal',
			'voyage'=>'Voyage',
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
	public function nojo(){
            switch (Controller::getrole()) {
                case 'agen':$agen=Order::model()->findAllByAttributes(array('agen'=>Yii::app()->user->name));
			if(!empty($agen)){
                            foreach ($agen as $value) {
                                $jo[]=$value->no_jo;
                            }
			}
                    break;
                case 'operasional':$op=Order::model()->findAllByAttributes(array('operator'=>Yii::app()->user->name));
			if(!empty($op)){
                            foreach ($op as $value) {
                                $jo[]=$value->no_jo;
                            }
			}
                    break;
                case 'customer':$cust=Order::model()->findAllByAttributes(array('customer'=>Yii::app()->user->name));
			if(!empty($cust)){
                            foreach ($cust as $value) {
                                $jo[]=$value->no_jo;
                            }
			}
                    break;
                    default :$cs=Order::model()->findAll();
			if(!empty($cs)){
                            foreach ($cs as $value) {
                                $jo[]=$value->no_jo;
                            }
			}
                    break;
            }
            return $jo;
	}
	public function search(array $columns)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		if (isset($_GET['sSearch'])) {
			$criteria->compare('resi_detail',$_GET['sSearch'],true,'OR');
			$criteria->compare('date',$_GET['sSearch'],true,'OR');
			$criteria->compare('posisi',$_GET['sSearch'],true,'OR');
			$criteria->compare('keterangan',$_GET['sSearch'],true,'OR');
			$criteria->with=array('resiDetail');
			$criteria->compare('resiDetail.customer',$_GET['sSearch'],true,'OR');
			$criteria->compare('resiDetail.kapal',$_GET['sSearch'],true,'OR');
			$criteria->compare('resiDetail.voyage',$_GET['sSearch'],true,'OR');
			$criteria->compare('resiDetail.tujuan',$_GET['sSearch'],true,'OR');
			$criteria->together=true;
		}
		$criteria->compare('id',$this->id);
		$criteria->compare('resi_detail',$this->nojo(),true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('posisi',$this->posisi,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		//$criteria->select='resi_detail="'.Order::model()->find(array('operator'=>'')).'"';

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
	 * @return Detail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function afterSave(){
            parent::afterSave();
            $q="CALL sp_setstatus('".$this->resi_detail."')";
            $setstatus= Yii::app()->db->createCommand($q);
            $setstatus->execute();

        }
}
