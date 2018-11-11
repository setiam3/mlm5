<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

<?php 
//inject database
function inject($kodeupline=null,$sponsor=null,$i=0){
    $model=new Member;
    $model->kode_member=Controller::autoformat();
    $model->userid=$model->kode_member;
    $model->password=$model->userid;
    $model->nama=$model->userid;
    $model->alamat='alamat-'.$i;
    $model->kota='kota-'.$i;
    $model->hp='031-0'.$i;
    $model->bank='BCA-'.$i;
    $model->nomor_rekening='000000-'.$i;
    $model->ktp='3525'.$i;
    $model->email=$model->userid.'@bestharmony.co.id';
    if(is_null($kodeupline)){
      $model->kode_upline='#';
    }else{
      $model->kode_upline=$kodeupline;
    }

    if(!is_null($sponsor)){
      $model->sponsor=$sponsor;
    }
   //$model->save();
}
function bukandistributor(){
  foreach (Member::model()->findAll('level !="distributor"') as $ro) {
        for ($i = 0; $i < 10; $i++) {
        inject($ro->kode_member,$ro->kode_member,$i);
      }
    }
}
// inject();
// foreach (Member::model()->findAll() as $row) {
//     for ($i = 0; $i < 10; $i++) {
//       inject($row->kode_member,$row->kode_member,$i);
//     }
//     bukandistributor();
//      bukandistributor();
//      bukandistributor();
//  }

?>

<div id="jstree_demo_div"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script type="text/javascript">
var url='<?php echo $this->createUrl('member/create');?>';
	//$(function () { $('#jstree_demo_div').jstree(); });
$('#jstree_demo_div').jstree({
    'core' : {
      'data' : {
        "url" : '<?php echo $this->createUrl('site/getTree');?>',
        "dataType" : "json" // needed only if you do not supply JSON headers
      }
    }
  });

$('#jstree_demo_div')
  // listen for event
  .on('changed.jstree', function (e, data) {
    var i, j, r = [];
    for(i = 0, j = data.selected.length; i < j; i++) {
    	if(data.instance.get_node(data.selected[i]).text==='Add'){
    		r.push(data.instance.get_node(data.selected[i]).parent);
    	}
    }
    if(r){
    	if(r.length){
    		window.open( url+'/?upline='+ r.join(', '));
    	}
    }
  })
  // create the instance
  .jstree();
</script>
