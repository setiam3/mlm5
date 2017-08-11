<?php

class LaporanController extends Controller
{
	public function filters()
	{
		return array(
			'postOnly + delete',
			'rights',
		);
	}
	public function grafikJo(){
		$sql="SELECT 'Jan', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=1
union
SELECT 'Feb', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=2
union
SELECT 'Mar', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=3
union
SELECT 'Apr', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=4
union
SELECT 'Mei', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=5
union
SELECT 'Jun', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=6
union
SELECT 'Jul', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=7
union
SELECT 'Aug', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=8
union
SELECT 'Sep', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=9
union
SELECT 'Okt', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=10
union
SELECT 'Nop', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=11
union
SELECT 'Des', count(*) joborder
from t_order
where year(tanggal_jo)='2017' and
month(tanggal_jo)=12";
$result=Yii::app()->db->createCommand($sql)->queryAll();
foreach ($result as $key => $value) {
	$data[$key]=$value;
	//echo $value['Jan'].':'.$value['joborder'].'<br>';
}
return json_encode($data);

	}
	public $columns=array(
        	'no_jo',
        	'tanggal_jo',
        	'customer',
        	'stuffing',
        	'status',
		    'tujuan',
		    'kapal'
            );
	
	public function actionIndex()
	{
		$model=new Laporan;
		if(isset($_POST['Laporan'])){
			//$this->render('index',array('model'=>$model));//die;
			//$this->grafikJo();die;

			$jo=$_POST['Laporan']['jo'];
			$kapal=$_POST['Laporan']['kapal'];
			$customer=$_POST['Laporan']['customer'];
			$tgl_stuffing=Controller::tanggal_indo($_POST['Laporan']['tgl_stuffing']);
			$tgl_stuffing1=Controller::tanggal_indo($_POST['Laporan']['tgl_stuffing1']);
			$tujuan=$_POST['Laporan']['tujuan'];

			$criteria = new CDbCriteria;
			if(!empty($jo)){$criteria->addCondition("no_jo = '$jo'");}
			if(!empty($kapal)){$criteria->addCondition("kapal = '$kapal'");}
			if(!empty($customer)){$criteria->addCondition("customer = '$customer'");}
			if(!empty($tgl_stuffing) && !empty($tgl_stuffing1)){$criteria->addCondition("tanggal_jo between '$tgl_stuffing' and '$tgl_stuffing1'");}
			if(!empty($tujuan)){$criteria->addCondition("tujuan = '$tujuan'");}
			$hasil=new CActiveDataProvider('Order', array(
			'criteria'=>$criteria,
                    //'sort'=>new EDTSort('Order', $this->columns,array('no_jo'=>'desc')),
			'pagination'=>array('PageSize'=>10000),
		));

        $widget=$this->createWidget('ext.EDataTables.EDataTables', array(
         'id'            => 'hasil-form',
         'dataProvider'  => $hasil,
         'ajaxUrl'       => $this->createUrl($this->getAction()->getId()),
         'columns'       => $this->columns,
         'bootstrap'=>true,

        ));
        if (Yii::app()->getRequest()->getIsAjaxRequest()) {
            echo json_encode($widget->getFormattedData(intval($_GET['sEcho'])));
            Yii::app()->session[$_COOKIE['PHPSESSID']]= $_SERVER['REQUEST_URI'];
            Yii::app()->end();
            return;
        }
		$this->render('hasil',array('widget'=>$widget,'model'=>$model));

		die;
		}

		$this->render('index',array('model'=>$model));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}