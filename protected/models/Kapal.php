<?php

/**
 * This is the model class for table "kapal".
 *
 * The followings are the available columns in table 'kapal':
 * @property integer $id
 * @property string $nama_kapal
 */
class Kapal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kapal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_kapal', 'required'),
			array('nama_kapal', 'length', 'max'=>100),array('pelayaran', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama_kapal,pelayaran', 'safe', 'on'=>'search'),
		);
	}
        public function getKapals($q){
            $kapal=Kapal::model()->cache(1000)->findAll(array(
                'condition' => 'nama_kapal LIKE :q',
                'params' => array(':q' =>"%$q%"),
            ));
            foreach ($kapal as $value) {
                $kapals[]=$value->nama_kapal;
            }
            return json_encode($kapals);
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
			'nama_kapal' => 'Nama Kapal',
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
	public function search(array $columns)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
if (isset($_GET['sSearch'])) {
			$criteria->compare('nama_kapal',$_GET['sSearch'],true,'OR');
			$criteria->compare('pelayaran',$_GET['sSearch'],true,'OR');
		}
		$criteria->compare('id',$this->id);
		$criteria->compare('nama_kapal',$this->nama_kapal,true);
		$criteria->compare('pelayaran',$this->pelayaran,true);

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
	 * @return Kapal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
