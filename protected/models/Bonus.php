<?php

/**
 * This is the model class for table "bonus".
 *
 * The followings are the available columns in table 'bonus':
 * @property integer $id
 * @property string $kode_member
 * @property string $tanggal
 * @property double $bonus
 * @property integer $poin
 * @property string $bonus_diambil
 * @property string $tanggal_ambil
 */
class Bonus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bonus the static model class
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
		return 'bonus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_member', 'required'),
			array('poin', 'numerical', 'integerOnly'=>true),
			array('bonus', 'numerical'),
			array('kode_member,dari_member', 'length', 'max'=>45),
			array('bonus_diambil', 'length', 'max'=>1),
			array('tanggal_ambil', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode_member,dari_member,idbonus,keterangan, tanggal, bonus, poin, bonus_diambil, tanggal_ambil', 'safe', 'on'=>'search'),
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
			'kode_member' => 'Kode Member',
			'tanggal' => 'Tanggal',
			'bonus' => 'Bonus',
			'poin' => 'Poin',
			'bonus_diambil' => 'Bonus Diambil',
			'tanggal_ambil' => 'Tanggal Ambil',
			'keterangan' => 'Keterangan',
			'dari_member' => 'Dari Member',
			'idbonus' => 'Id Bonus',
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
			$criteria->compare('kode_member',$_GET['sSearch'],true,'OR');
			$criteria->compare('tanggal',$_GET['sSearch'],true,'OR');
            $criteria->compare('bonus',$_GET['sSearch'],true,'OR');
			$criteria->compare('poin',$_GET['sSearch'],true,'OR');
		}

		$criteria->compare('id',$this->id);
		$criteria->compare('kode_member',$this->kode_member,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('bonus',$this->bonus);
		$criteria->compare('poin',$this->poin);
		$criteria->compare('bonus_diambil',$this->bonus_diambil,true);
		$criteria->compare('tanggal_ambil',$this->tanggal_ambil,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('dari_member',$this->dari_member,true);
		$criteria->compare('idbonus',$this->idbonus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>new EDTSort(__CLASS__, $columns,array('id'=>'desc')),
			'pagination'=>new EDTPagination,
		));
	}
}