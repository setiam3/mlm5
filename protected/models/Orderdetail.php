<?php

/**
 * This is the model class for table "Orderdetail".
 *
 * The followings are the available columns in table 'Orderdetail':
 * @property integer $id
 * @property string $order_code
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $qty
 * @property integer $subtotal
 */
class Orderdetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Orderdetail the static model class
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
		return 'Orderdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_code, order_id, product_id, qty, subtotal', 'required'),
			array('order_id, product_id, qty, subtotal', 'numerical', 'integerOnly'=>true),
			array('order_code', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_code, order_id, product_id, qty, subtotal', 'safe', 'on'=>'search'),
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
			'order_code' => 'Order Code',
			'order_id' => 'Order',
			'product_id' => 'Product',
			'qty' => 'Qty',
			'subtotal' => 'Subtotal',
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
		$criteria->compare('order_code',$this->order_code,true);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('subtotal',$this->subtotal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}