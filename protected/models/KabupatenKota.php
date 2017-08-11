<?php

/**
 * This is the model class for table "regencies".
 *
 * The followings are the available columns in table 'regencies':
 * @property string $id
 * @property string $province_id
 * @property string $name
 * @property string $alias
 *
 * The followings are the available model relations:
 * @property Districts[] $districts
 * @property Provinces $province
 */
class KabupatenKota extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'regencies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, province_id, name', 'required'),
			array('id', 'length', 'max'=>4),
			array('province_id', 'length', 'max'=>2),
			array('name, alias', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, province_id, name, alias', 'safe', 'on'=>'search'),
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
			'districts' => array(self::HAS_MANY, 'Districts', 'regency_id'),
			'province' => array(self::BELONGS_TO, 'Provinces', 'province_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'province_id' => 'Province',
			'name' => 'Name',
			'alias' => 'Alias',
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
	public function search(array $columns)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
                if (isset($_GET['sSearch'])) {
			$criteria->compare('name',$_GET['sSearch'],true,'OR');
			$criteria->compare('alias',$_GET['sSearch'],true,'OR');
		}
		$criteria->compare('id',$this->id,true);
		$criteria->compare('province_id',$this->province_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('alias',$this->alias,true);
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>new EDTSort(__CLASS__, $columns),
			'pagination'=>new EDTPagination,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KabupatenKota the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}