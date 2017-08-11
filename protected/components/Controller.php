<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
    public $arrayImages=array('jpg','bmp','png','jpeg');
    public static function imagesPath(){
        return Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR;   
    }
    public static function tanggal_indo($tanggal){//tanggal mysql to indo
    if(isset($tanggal) && !empty($tanggal)){
        $split=explode('-', $tanggal);
        return $split[2].'-'.$split[1].'-'.$split[0];}
    }
    public static function getKomoditi($nojo){
        	$k=array();
            foreach(Kontainerjo::model()->findAllByAttributes(array('no_jo'=>$nojo)) as $kk){
                    $k[]=$kk->komoditi;
                }
                if(!empty($k) && isset($k))
                return implode(',',array_unique($k));
        }
    public static function getPelayaran($kapal){
    if(!empty($kapal)){
        $pelayarans=Kapal::model()->findByAttributes(array("nama_kapal"=>$kapal));
        if($pelayarans->pelayaran){
            $pelayaran=$pelayarans->pelayaran;
        }else{
            $pelayaran='';
        }
        return $pelayaran;
    }
}
        /**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    public function isActive($d){
            if(isset($this->module)){
                $controller=$this->module->id.'/'.$this->id;
            }else{
                $controller= $this->id;
            }
            $baseUrl=Yii::app()->baseUrl;
           $a="'".$baseUrl.'/'.$d."'";
            if($d===$controller.'/'.Yii::app()->controller->action->id){
                echo '<script>'
                . 'jQuery(function($){
                    jQuery.noConflict();
                    $("a[href*='.$a.']").parent().addClass("active");
                    $("a[href*='.$a.']").parent().parent().addClass("visible");
                    $("a[href*='.$a.']").parent().parent().parent().addClass("opened active");
                    $("a[href*='.$a.']").parent().parent().parent().parent().parent().addClass("opened active");
                });'
                . '</script>';
         }     
    }
    public static function arMessage(){//member notify()
        return array('success','alert','warning','danger','error');
    }
    public function notify(){
        foreach ($this->arMessage() as $type) {
        if (!Yii::app()->user->hasFlash($type))
                continue;
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/toastr.js',CClientScript::POS_END);
        $alertext=Yii::app()->user->getFlash($type); 
        echo "<script>"
            . "jQuery(function($){jQuery.noConflict();setTimeout(function(){			
		var opts = {
			'closeButton': true,
			'debug': false,
			'positionClass': 'toast-top-right',
			'onclick': null,
			'showDuration': '30',
			'hideDuration': '1000',
			'timeOut': '5000',
			'extendedTimeOut': '1000',
			'showEasing': 'swing',
			'hideEasing': 'linear',
			'showMethod': 'fadeIn',
			'hideMethod': 'fadeOut'
		};
		toastr.$type('".$alertext."', '".$type."', opts);
	}, 3000);         
});"
            ."</script>";
            }
        }
    public static function genListView($model,$attributes,$id=null){//model, attrbutes, id
        $tbname=Controller::generateRandomString();
            $i=0;
            $n= 0;
        echo '<table class="table table-bordered table-responsive table-hover" id="'.$tbname.'">';
            //looping th labels
        foreach($attributes as $attribute){
			if(is_string($attribute))
			{
				if(!preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/',$attribute,$matches))
					throw new CException(Yii::t('zii','The attribute must be specified in the format of "Name:Type:Label", where "Type" and "Label" are optional.'));
				$attribute=array(
					'name'=>$matches[1],
					'type'=>isset($matches[3]) ? $matches[3] : 'text',
				);
				if(isset($matches[5]))
					$attribute['label']=$matches[5];
			}
			if(isset($attribute['visible']) && !$attribute['visible'])
				continue;
                        if(isset($attribute['label']))
				$tr['{label}']=$attribute['label'];
			elseif(isset($attribute['name']))
			{
				if($model instanceof CModel)
					$tr['{label}']=$model::model()->getAttributeLabel($attribute['name']);
				else
					$tr['{label}']=ucwords(trim(strtolower(str_replace(array('-','_','.'),' ',preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $attribute['name'])))));
			}
			if(!isset($attribute['type']))
				$attribute['type']='text';
			if(isset($attribute['value']))
				$value=is_object($attribute['value']) && get_class($attribute['value']) === 'Closure' ? call_user_func($attribute['value'],$this->data) : $attribute['value'];
			elseif(isset($attribute['name']))
				$value=CHtml::value($model,$attribute['name']);
			else
				$value=null;
			$i++;
            echo '<tr><td class="col-sm-1" style="font-weight:bold;text-align:right;">'.$tr['{label}'].'</td><td class="col-sm-6">'.$value.'</td></tr>';
		}
            //===end table
            echo '</table>';
        }
    public static function generateRandomString($length = 10){//member gentables
    $charaters = "01234567890abcdefghijklmnopqrstuvwxyz";
    $randomString = '';
    for($i = 0; $i<$length;$i++){
    $randomString .= $charaters[rand(0,strlen($charaters) - 1)];
    }
    return $randomString;
    }

        /*
         * format: idtable, coloms, modelnya, filter null, typetable null
         */
    public function genTables($colom,$model,$filter=NULL,$options=NULL){
        $tbname=Controller::generateRandomString();
        $atr=array();
        $kondisi=array();
        if(isset($filter) && !is_null($filter)){
    foreach ($filter as $key => $value) {
        if($key==='attributes'){
        foreach ($value as $k=>$data) {
            $atr[$k]=$data;
        }
        }
        if($key==='condition'){
            foreach ($value as $k=>$data) {
            $kondisi[$k]=$data;
            }
        }
    }        
    $modelx=$model::model()->cache(1000)->findAllByAttributes($atr,$kondisi);
        }else{
            $modelx=$model::model()->cache(1000)->findAll(array('order'=>'id DESC'));
        }
        if(count($modelx)>0){
        //the module . controller
        if(isset($this->module)){
            $controller=$this->module->id.'/'.$this->id;
        }else{
            $controller=$this->id;
        }
        if($model!==ucfirst($controller) && !isset($this->module)){
            $controller=$model;
        }
        //gen js
        $opt= explode(' ', $options);
        if(in_array('datatable', $opt)){
            echo '<script>'
            . 'jQuery( function( $ ) {
                jQuery.noConflict();
                        var $'.$tbname.' = jQuery("#'.$tbname.'" );
                        $'.$tbname.'.DataTable( {
                                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                "bStateSave": true,
                            
                            "dom": "Bfrtip",
			"buttons": [
				"copyHtml5",
				"excelHtml5",
				"csvHtml5",
				"pdfHtml5"
			]
                        });
                        $'.$tbname.'.closest( ".dataTables_wrapper" ).find( "select" ).select2( {
                                minimumResultsForSearch: -1
                        });
                });</script>';
        }
        //===start table
        $i=1;
        echo '<table class="table '.$options.'" id="'.$tbname.'">
		<thead><tr><th>#</th>';
        //looping th
        foreach ($colom as $cc) {
            foreach($model::model()->attributeLabels() as $key=>$label){
                if($key===$cc){
                echo '<th>'.$label.'</th>';
            }
            }
        }
        echo $this->action->id==='admin'?'<th>aksi</th>':'';
        echo '</tr></thead>';
        echo '<tbody>';
        //looping body
        foreach ($modelx as $value) {
            echo '<tr><td>'.$i++.'</td>';
                foreach ($colom as $v) {
                    echo '<td>'. CHtml::link($value->$v, Yii::app()->createUrl($controller.'/view/id/'.$value->id)).'</td>';
                }
            echo $this->action->id==='admin'?'<td>'
                . CHtml::link('<i class="entypo-pencil"></i>',Yii::app()->createUrl($controller.'/update/id/'.$value->id),array('class'=>'btn btn-default btn-sm'))
                .' '. CHtml::link('<i class="entypo-info"></i>',Yii::app()->createUrl($controller.'/view/id/'.$value->id),array('class'=>'btn btn-info btn-sm'))
                .' '. CHtml::link('<i class="entypo-cancel"></i>',
                    Yii::app()->createUrl($controller.'/delete/id/'.$value->id),
                    array('submit'=> Yii::app()->createUrl($controller.'/delete/id/'.$value->id),
                        'confirm'=>'Yakin akan dihapus?',
                        'class'=>'btn btn-danger btn-sm'))
                    . '</td>':'';
            echo '</tr>';
        }
        //footer
        echo '<tfoot><tr><th>#</th>';
        foreach ($colom as $cc) {
            foreach($model::model()->attributeLabels() as $key=>$label){
                if($key===$cc){
                echo '<th>'.$label.'</th>';
            }
            }
        }
        echo $this->action->id==='admin'?'<th>aksi</th>':'';
        echo '</tr></tfoot></table>';
        //=== end table
        if(in_array('datatable', $opt)){
            echo '<link rel="stylesheet" href="'.Yii::app()->theme->baseUrl.'/assets/js/datatables/datatables.css'.'">';
            echo '<link rel="stylesheet" href="'.Yii::app()->theme->baseUrl.'/assets/js/select2/select2-bootstrap.css'.'">';
            echo '<link rel="stylesheet" href="'.Yii::app()->theme->baseUrl.'/assets/js/select2/select2.css'.'">';
            Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/datatables/datatables.js',CClientScript::POS_END);
            Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/select2/select2.min.js',CClientScript::POS_END);
        }
        }
    }
    public static function getControllers(){
        foreach (glob(Yii::getPathOfAlias('application.controllers') . "/*Controller.php") as $controller){
            $class[]= basename($controller, "Controller.php");
          }
          return $class;
    }
    public static function getrole(){
        //$user = Yii::app()->getUser();
        //if( $user->isGuest===true )
        //    $user->loginRequired();

        $role=Rights::getAssignedRoles(Yii::app()->user->id);
        foreach ($role as $value) {
            $roles=$value->name;
        }
        return $roles;
    }
    public function GetTelp($q){
        $criteria=new CDbCriteria(array('select'=>'telp','condition'=>'nama=:namae','params'=>array(':namae'=>"$q")));
        $cust=Customer::model()->findByAttributes(array('nama'=>$q))->telp;
        echo $cust;
	}
	public function GetCustomer($q){
        $qs = new CDbCriteria(array('select'=>'nama','condition' => "nama LIKE :match",'params'=> array(':match' => "%$q%")));
        $model=Customer::model()->findAll($qs);
        $arr=array();
        foreach ($model as $value) {
            $arr[]=$value->nama;
        }
        echo json_encode($arr);
	}
	public function GetTypeKontainer($q){
        $qs = new CDbCriteria(array('select'=>'type','condition' => "type LIKE :match",'params'=> array(':match' => "%$q%")));
        $model=Kontainer::model()->findAll($qs);
        $arr=array();
        foreach ($model as $value) {
            $arr[]=$value->type;
        }
        echo json_encode($arr);
    }
	public function actionCari($q,$act=null){
        if($act==='telp'){$this->GetTelp($q);die;}
        if($act==='customer'){$this->GetCustomer($q);die;}
        if($act==='typekontainer'){$this->GetTypeKontainer($q);die;}
        //step 1 cari di regenci
$qs = new CDbCriteria(array('select'=>'name','condition' => "name LIKE :match",'params'=> array(':match' => "%$q%")));
        $kota=KabupatenKota::model()->findAll($qs);
        if(is_array($kota) && !empty($kota)){
            foreach ($kota as $value) {
                $s1=explode(' ', $value->name);
                    if(strtoupper($s1[0])==='KOTA' || strtoupper($s1[0])==='KABUPATEN')
                    $res[]=str_replace($s1[0],'', $value->name);
            }
            echo json_encode($res);
        }else{
            $distric=Districts::model()->findAll($qs);//step 2 cari di distric
            if(is_array($distric) && !empty($distric)){
                foreach ($distric as $value) {
                    $res[]=$value->name;
                }
                echo json_encode($res);
            }else{
                $village=Villages::model()->findAll($qs);
                if(!empty($village)){
                        foreach ($village as $value) {
                            $res[]=$value->name;
                        }
                    echo json_encode($res);
                }else{
                    echo json_encode('data tidak ditemukan');
                }
            }
        } 
	}
	public static function toDate($date){// revers format waktu di controller detail posisi
        if(!empty($date) && !is_null($date)){
            $split=explode(' ', $date);
            return $split[1].' '.Controller::tanggal_indo($split[0]);
        }
    }
}