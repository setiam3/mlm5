<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
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
    public $arrayImages=array('jpg','bmp','png','jpeg','pdf');
    public static function imagesPath(){
        return Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR;   
    }
    public static function imagesUrl(){
        return Yii::app()->baseUrl.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR;
    }
    public static function tanggal_indo($tanggal){//tanggal mysql to indo
    if(isset($tanggal) && !empty($tanggal)){
        $split=explode('-', $tanggal);
        return $split[2].'-'.$split[1].'-'.$split[0];}
    }
    
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
            $i=0; $n= 0;
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
            
            $modelx=$model::model()->cache(10000)->findAllByAttributes($atr,$kondisi);
            
        }else{
           
            $modelx=$model::model()->cache(10000)->findAll(array('order'=>'id DESC'));
            
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

    public static function get_produk($id=null){
        if(!empty($id)){
            $ar=Product::model()->findByPk($id)->id;
        }else{
            $ar=array();
        $prod=Product::model()->findAll();
            foreach ($prod as $value) {
                $ar[$value->id]=$value->nama_produk;
            }
        }
        return $ar;
    }
    public static function get_member($kodemember=null){
        $ar=array();
        $user=User::model()->findAll('level!="admin" and superuser="0"');
        foreach ($user as $value) {
            $ar[$value->kode_member]=$value->kode_member;
        }
        return $ar;
    }
    public static function getControllers(){
        foreach (glob(Yii::getPathOfAlias('application.controllers') . "/*Controller.php") as $controller){
            $class[]= basename($controller, "Controller.php");
          }
          return $class;
    }
    public static function getrole(){
        $role=Rights::getAssignedRoles(Yii::app()->user->id);
        foreach ($role as $value) {
            $roles=$value->name;
        }
        return $roles;
    }

	public static function toDate($date){// revers format waktu di controller detail posisi
        if(!empty($date) && !is_null($date)){
            $split=explode(' ', $date);
            return $split[1].' '.Controller::tanggal_indo($split[0]);
        }
    }
    public static function date_sql_now(){
        return gmdate("Y-m-d H:i:s", time()+60*60*7);
    }
    
    public static function autoformat(){
        $getlastjo=Yii::app()->db->createCommand('select kode_member from users order by id desc limit 1')->queryScalar();//BY0000001
        $format='BY';
        if(!empty($getlastjo)){
            $t=trim($getlastjo,$format);
            $lastno=intval($t)+1;
        }else{
            $lastno=1;
        }
            if(strlen($lastno)==1){
                $lastno='000000'.$lastno;
            }elseif(strlen($lastno)==2){
                $lastno='00000'.$lastno;
            }elseif(strlen($lastno)==3){
                $lastno='0000'.$lastno;
            }elseif(strlen($lastno)==4){
                $lastno='000'.$lastno;
            }elseif(strlen($lastno)==5){
                $lastno='00'.$lastno;
            }elseif(strlen($lastno)==6){
                $lastno='0'.$lastno;
            }elseif(strlen($lastno)==7){
                $lastno=$lastno;
            }
        return $format.$lastno;
    }
    public static function userid(){
        return Yii::app()->user->id;
    }
    public static function username(){
        return Yii::app()->user->name;
    }
    public function kode_member(){
        return Yii::app()->user->kode_member;
    }
    public static function hitungbonusgetmember($kodeupline=NULL,$kodemember){
        $upline=User::model()->countByAttributes(array('kode_member'=>$kodeupline));
        if($upline>0){
            $q1=SettingBonus::model()->findAllByAttributes(array('jenis_bonus'=>'getmember'));
            $jmldownline=User::model()->countByAttributes(array('kode_upline'=>$kodeupline));
            //$jmldownline=5;
            foreach ($q1 as $value) {
                if($jmldownline>0 && is_numeric($value->param)){
                    if($jmldownline%$value->param==0){
                        $model=new Bonus;
                        $model->kode_member=$kodeupline;
                        $model->bonus=$value->bonus;
                        $model->tanggal=Controller::date_sql_now();
                        $model->keterangan=$value->keterangan;
                        $model->dari_member=$kodemember;
                        $model->idbonus=$value->id;
                        $model->save();
                    }
                }
                //tambahkan bonus poin
                if(!is_numeric($value->param) && $value->param=='poin'){
                    $model=new Bonus;
                    $model->kode_member=$kodeupline;
                    $model->poin=$value->bonus;
                    $model->tanggal=Controller::date_sql_now();
                    $model->keterangan=$value->keterangan;
                    $model->dari_member=$kodemember;
                    $model->idbonus=$value->id;
                    $model->save();
                }
            }
        }
    }

    public function deepValues(array $array, array &$values) {
        foreach($array as $level) {
            if (is_array($level)) {
                $this->deepValues($level, $values);
            } else {
                $values[$level] = $level;
            }
        }
        //return $value;
    }
    public function comboSponsor($kode_member){
        $values=array();
        foreach(Controller::getUpline($kode_member) as $level) {
            if (is_array($level)) {
                Controller::deepValues($level, $values);
            } else {
                $values[$level] = $level;
            }
        }
        if(in_array('#', $values)){
            array_pop($values);
        }
        return $values;
    }
    
    public function getUpline($cnd){
        $row = array();
        foreach(User::model()->cache(1000)->findAllByAttributes(array('kode_member'=>$cnd)) as $haha){
            if($haha->kode_upline!=='#' or $haha->level!=='distributor'){
                $row[] = $cnd;
                $row['upline'] = $haha->kode_upline;
                if(count($this->getUpline2($haha->kode_upline))>0){
                    $row[] = $this->getUpline2($haha->kode_upline);
                }
            }
        }
        return $row;
    }
    public function getUpline2($cnd){
        $row = array();
        foreach(User::model()->cache(1000)->findAllByAttributes(array('kode_member'=>$cnd)) as $haha){
             if($haha->kode_upline!=='#'){
                $row['upline'] = $haha->kode_upline;
                if(count($this->getUpline2($haha->kode_upline))>0 && $haha->kode_upline!=='#'){
                   $row[] = $this->getUpline2($haha->kode_upline);
                }
            }
        }
        return $row;
    }
    public static function parentCount($id){
        $q="call parentCount('".$id."')";
        return Yii::app()->db->cache(100,100)->createCommand($q)->queryScalar();
    }
    public static function comboUpline(){
        $ar=array();
        $member=User::model()->cache(1000)->findAll(array('condition'=>'level!="distributor" and level!="admin"'));
        foreach ($member as $value) {
            $ar[$value['kode_member']]=$value->kode_member.' - '.$value->username.' - '.$value->email;
        }
        if(empty($member)){
            $ar['#']='#';
        }
    return $ar;
    }

    public static function orderChildren($data,$root){
    $tree = array();
    foreach($data as $k=> $value){
        
        if($value['parent'] == '#'){  // Values without parents
            $tree[$k]=$value;
            $tree[$k] = Controller::goodParenting($value, $data);
        }else{
            //$tree[$k]=$value;
            //$tree[$value['id']] = Controller::goodParenting($root, $data);
        }
    }
    echo CJSON::encode($tree);
}

private static function goodParenting($parent, $childPool){
    foreach($childPool as $i=>$child){
        //$parent[$i]=$child;
        if($parent['id'] == $child['parent']){
            $parent[] = Controller::goodParenting($child, $childPool);
        }
    }
    return $parent;
}

    public static function tree($root=null){
        $ar1=array(); $ar2=array(); $ar3=array();
        Yii::app()->db->createCommand('SET FOREIGN_KEY_CHECKS=0;')->execute();
        if(!empty($root) && $root!=null && !is_null($root)){
            $sql="SELECT id,case when id='$root' then '#' else parent end as parent,text,level FROM parent_child where parent='$root' or id='$root'";
        }else{
            $sql="select * from parent_child order by id asc";
        }
        $cmd=Yii::app()->db->cache(1000,1000)->createCommand($sql)->queryAll();
        foreach ($cmd as $k =>$value) {
            $ar1[$k]=$value;
            if($value['level']!=='distributor'){
                //add id where parents = valueid;
                $cp=Controller::parentCount($value['id']);
                for ($i = 0; $i < Yii::app()->params['maxMember']-$cp; $i++) {
                    $ar2[]=array('id'=>$value['id'].'Add'.$i,'parent'=>$value['id'],'text'=>'Add');
                }
                $ar3=array_merge_recursive($ar1, $ar2);
           }else{//cari childnya lagi
            $ar2[]=Controller::tree($value['parent']);
            $ar3=array_merge_recursive($ar1, $ar2);

           }
        }
    echo CJSON::encode($ar3); 
    
    }

    public static function is_maxMember($kodemember){
        //cek jml downline by kode_upline
        if($kodemember!='#'){
            $model=User::model()->countByAttributes(array('kode_upline'=>$kodemember));
            if($model<Yii::app()->params['maxMember'] && $model>=0){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
    public static function get_sponsor($kodemember){
        $mem=User::model()->findByAttributes(array('kode_member'=>$kodemember));
        return $mem->sponsor;
    }
    public static function get_level($kodemember){
        if($kodemember!=='#'){
            $mem=User::model()->findByAttributes(array('kode_member'=>$kodemember));
        return $mem->level;
        }
    }
    public static function get_upline($kodemember){
        $mem=User::model()->findByAttributes(array('kode_member'=>$kodemember));
        return $mem->kode_upline;
    }

    
    public static function bonussponsor($kodesponsor,$kodemember){
        $q1=SettingBonus::model()->findAllByAttributes(array('jenis_bonus'=>'sponsor'));
        $jmlsponsor=User::model()->countByAttributes(array('sponsor'=>$kodesponsor));
        foreach ($q1 as $value) {
            $upline_level=Controller::get_level(Controller::get_upline($kodemember));
            if($jmlsponsor>0 && is_numeric($value->param)){
                if($jmlsponsor%$value->param==0){
                    //echo '<script>console.log("bonus 50k")</script>';
                    $model=new Bonus;
                    $model->kode_member=$kodesponsor;
                    $model->bonus=$value->bonus;
                    $model->tanggal=Controller::date_sql_now();
                    $model->keterangan=$value->keterangan;
                    $model->dari_member=$kodemember;
                    $model->idbonus=$value->id;
                    $model->save();
                }
            }elseif(!is_numeric($value->param) && !empty($upline_level) && $upline_level==$value->param){
                $mb=Bonus::model()->findAllByAttributes(array('dari_member'=>Controller::get_upline($kodemember)));
                $inarray=array();
                foreach($mb as $bonus){
                    $inarray[]=$bonus->idbonus;//simpan dalam array
                }
                if(is_array($inarray)){
                    if(!in_array($value->id, $inarray)){//19 id bonus sponsorship
                        //echo '<script>console.log("bonus 10k")</script>';
                        $models=new Bonus;
                        $models->kode_member=Controller::get_sponsor(Controller::get_upline($kodemember));
                        $models->bonus=$value->bonus;
                        $models->tanggal=Controller::date_sql_now();
                        $models->keterangan=$value->keterangan;
                        $models->dari_member=Controller::get_upline($kodemember);
                        $models->idbonus=$value->id;
                        $models->save();
                    }
                }
            }
        }
    }
    public static function upgradelevel($kodeupline){
        $upline=User::model()->countByAttributes(array('kode_member'=>$kodeupline));
        if($upline>0){
            $jmldownline=User::model()->countByAttributes(array('kode_upline'=>$kodeupline));
            //$jmldownline=6;
            if($jmldownline==1){
                $jmldownline=0;
            }
            $sql='select max(member) AS max from setting_level limit 1';
            $cmd=Yii::app()->db->createCommand($sql);
            $max=$cmd->queryRow();
            $q2=SettingLevel::model()->findByAttributes(array('member'=>$jmldownline));
            if(!empty($q2) && count($q2)<=$max['max']){//max di setting level
                $member=User::model()->findByAttributes(array('kode_member'=>$kodeupline));
                $member->level=$q2->level;
                $member->save();
            }
        }
    }
    public static function company(){
        return SettingPerusahaan::model()->cache(2000)->findByPk(1)->nama_perusahaan;
    }
    public static function diskonbelanja($total,$kodemember=NULL){
        $level=Controller::get_level($kodemember);
        $mb=SettingBonus::model()->findByAttributes(array('jenis_bonus'=>"diskonbelanja",'param'=>$level));
        return round($total-($total*$mb->bonus),2);
    }
    public static function bonusrepeatorder($kodemember,$hargasetelahdiskon=NULL){//repeatorderby level, and param is buyer;
        //downline belanja, upline dapat cashback
        $level=Controller::get_level($kodemember);
        $upline_level=Controller::get_level(Controller::get_upline($kodemember));
        switch ($level) {
            case 'distributor':
                if($upline_level!='#'){
                    $hasil=0;
                    $mb=SettingBonus::model()->findByAttributes(array('jenis_bonus'=>'repeatorderdistributor','param'=>$upline_level));
                if(!empty($mb)){
                    if($hargasetelahdiskon>0){
                        $hasil=$mb->bonus*$hargasetelahdiskon;
                        $bonus=New Bonus;
                        $bonus->kode_member=Controller::get_upline($kodemember);//yg nerima bonus;
                        $bonus->bonus=$hasil;//nilai bonus;
                        $bonus->tanggal=Controller::date_sql_now();
                        $bonus->keterangan=$mb->keterangan;
                        $bonus->dari_member=$kodemember;
                        $bonus->idbonus=$mb->id;
                        $bonus->save();
                    }
                }
                }
                break;
            case 'reseller':
                if($upline_level!='#'){
                    $hasil=0;
                    $mb=SettingBonus::model()->findAllByAttributes(array('jenis_bonus'=>'repeatorderreseller'));
                if(!empty($mb)){
                    foreach ($mb as $value) {
                        if($value->param==$upline_level){
                            if($hargasetelahdiskon>0){
                            $bonus=New Bonus;
                            $bonus->kode_member=Controller::get_upline($kodemember);//yg nerima bonus;
                            $bonus->bonus=$hasil=($value->bonus*$hargasetelahdiskon);
                            $bonus->tanggal=Controller::date_sql_now();
                            $bonus->dari_member=$kodemember;
                            $bonus->keterangan=$value->keterangan;
                            $bonus->idbonus=$value->id;
                            $bonus->save();
                            }
                        }
                    }
                }
                }
                break;
            case 'agen':
                if($upline_level!='#'){
                    $hasil=0;
                    $mb=SettingBonus::model()->findByAttributes(array('jenis_bonus'=>'repeatorderagen','param'=>$upline_level));
                if(!empty($mb)){
                    if($hargasetelahdiskon>0){
                        $bonus=New Bonus;
                        $bonus->kode_member=Controller::get_upline($kodemember);//yg nerima bonus;
                        $bonus->bonus=$hasil=$mb->bonus*$hargasetelahdiskon;
                        $bonus->tanggal=Controller::date_sql_now();
                        $bonus->keterangan=$mb->keterangan;
                        $bonus->dari_member=$kodemember;
                        $bonus->idbonus=$mb->id;
                        $bonus->save();
                    }
                    
                }
                }
                break;
            case 'user':
                if($upline_level!='#'){
                    $hasil=0;
                    $mb=SettingBonus::model()->findAllByAttributes(array('jenis_bonus'=>'repeatorderuser'));
                if(!empty($mb)){
                    foreach ($mb as $value) {
                        if($value->param==$upline_level){
                            if($hargasetelahdiskon>0){
                            $bonus=New Bonus;
                            $bonus->kode_member=Controller::get_upline($kodemember);//yg nerima bonus;
                            $bonus->bonus=$hasil=($value->bonus*$hargasetelahdiskon);
                            $bonus->tanggal=Controller::date_sql_now();
                            $bonus->dari_member=$kodemember;
                            $bonus->keterangan=$value->keterangan;
                            $bonus->idbonus=$value->id;
                            $bonus->save();
                            }
                        }
                    }
                }
                }
                break;
            default:
                // code...
                break;
        }
    }

    public static function bonuspoinbelanja($totalbelanja){
        $sb=SettingBonus::model()->findAll('jenis_bonus="poin" order by param asc');
        foreach ($sb as $k=>$value) {
            $range[$k]=$value;
            //$range[$k]=array('bonus'=>$value->bonus,'param'=>$value->param,'keterangan'=>$value->keterangan);
        }
        Controller::bonuspoinbelanja1($totalbelanja,$range);
    }
    public static function bonuspoinbelanja1($totalbelanja,$range){

        switch ($totalbelanja) {

            case ($totalbelanja>=$range[0]['param'] && $totalbelanja<$range[1]['param'])://r150
                $poin=$range[0]['bonus'];
                if(isset($poin) && $poin>0 ){
                    //insert to bonus
                    $bonus=new Bonus;
                    $bonus->kode_member=Yii::app()->user->kode_member;
                    $bonus->bonus=$poin;
                    $bonus->tanggal=Controller::date_sql_now();
                    $bonus->dari_member=Yii::app()->user->kode_member;
                    $bonus->keterangan=$range[0]['keterangan'];
                    $bonus->idbonus=$range[0]['id'];
                    $bonus->save();
                }
                if($totalbelanja-$range[0]['param']>0){
                    Controller::bonuspoinbelanja($totalbelanja-$range[0]['param']);
                }
                break;
            case ($totalbelanja>=$range[1]['param'] && $totalbelanja<$range[2]['param']):
                $poin=$range[1]['bonus'];
                if(isset($poin) && $poin>0 ){
                    //insert to bonus
                    $bonus=new Bonus;
                    $bonus->kode_member=Yii::app()->user->kode_member;
                    $bonus->bonus=$poin;
                    $bonus->tanggal=Controller::date_sql_now();
                    $bonus->dari_member=Yii::app()->user->kode_member;
                    $bonus->keterangan=$range[1]['keterangan'];
                    $bonus->idbonus=$range[1]['id'];
                    $bonus->save();
                }
                if($totalbelanja-$range[1]['param']>0){
                    Controller::bonuspoinbelanja($totalbelanja-$range[1]['param']);
                }
                break;
            case ($totalbelanja>=$range[2]['param']):
                $poin=$range[2]['bonus'];
                if(isset($poin) && $poin>0 ){
                    //insert to bonus
                    $bonus=new Bonus;
                    $bonus->kode_member=Yii::app()->user->kode_member;
                    $bonus->bonus=$poin;
                    $bonus->tanggal=Controller::date_sql_now();
                    $bonus->dari_member=Yii::app()->user->kode_member;
                    $bonus->keterangan=$range[2]['keterangan'];
                    $bonus->idbonus=$range[2]['id'];
                    $bonus->save();
                }
                if($totalbelanja-$range[2]['param']>0){
                    Controller::bonuspoinbelanja($totalbelanja-$range[2]['param']);
                }
                break;
            
            default:
                // code...
                break;
        }
    }





}