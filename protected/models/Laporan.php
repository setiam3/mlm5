<?php
class Laporan extends CFormModel
{
	public $jo;
	public $tgl_stuffing;
	public $customer;
	public $agen;
	public $operator;
	public $tujuan;
	public $komoditi;
	public $status;
	public $kapal;
	public $pelayaran;
	public $pengirim;
	public $penerima;
public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
	array(' jo, tgl_stuffing, tujuan, pengirim,penerima, kapal, status, operator, agen, customer,komoditi,pelayaran', 'safe', 'on'=>'search'),
	);
	}
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'jo'=>'Job Order',
			'tgl_stuffing'=>'Tgl Stuffing',
			'customer'=>'Customer',
			'agen'=>'Agen',
			'operator'=>'Operator',
			'tujuan'=>'Tujuan',
			'komoditi'=>'Komoditi',
			'status'=>'Status',
			'kapal'=>'Kapal',
			'pelayaran'=>'Pelayaran',
			'pengirim'=>'Pengirim',
			'penerima'=>'Penerima',
		);
	}
}