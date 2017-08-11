<?php

/**
 * This is the model class for table "t_bl".
 *
 * The followings are the available columns in table 't_bl':
 * @property integer $id
 * @property string $kapal
 * @property string $voyage
 * @property string $pelayaran
 * @property string $ETA
 * @property string $agen
 * @property string $foto
 */
class TBl extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TBl the static model class
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
		return 't_bl';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kapal, voyage, agen', 'required'),
			array('kapal, pelayaran, agen', 'length', 'max'=>45),
			array('voyage', 'length', 'max'=>12),
			array('ETA', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kapal, voyage, pelayaran, ETA, agen, foto', 'safe', 'on'=>'search'),
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
			'kapal' => 'Kapal',
			'voyage' => 'Voyage',
			'pelayaran' => 'Pelayaran',
			'ETA' => 'Eta',
			'agen' => 'Agen',
			'foto' => 'Foto',
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
			$criteria->compare('kapal',$_GET['sSearch'],true,'OR');
			$criteria->compare('voyage',$_GET['sSearch'],true,'OR');
			$criteria->compare('pelayaran',$_GET['sSearch'],true,'OR');
			$criteria->compare('ETA',$_GET['sSearch'],true,'OR');
			$criteria->compare('agen',$_GET['sSearch'],true,'OR');
		}
		$criteria->compare('id',$this->id);
		$criteria->compare('kapal',$this->kapal,true);
		$criteria->compare('voyage',$this->voyage,true);
		$criteria->compare('pelayaran',$this->pelayaran,true);
		$criteria->compare('ETA',$this->ETA,true);
		$criteria->compare('agen',$this->agen,true);
		$criteria->compare('foto',$this->foto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'sort'=>new EDTSort(__CLASS__, $columns,array('id'=>'desc')),
			'pagination'=>new EDTPagination,
		));
	}
}