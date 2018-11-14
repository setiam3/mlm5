<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<?php echo Yii::app()->user->getFlash('registration'); 

//echo Controller::get_sponsor(Controller::get_upline('BY0000110'))
//echo $this->get_sponsor('BY0000012');
?>
<div id="jstree_demo_div"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script type="text/javascript">
var url='<?php echo $this->createUrl('member/create');?>';

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
