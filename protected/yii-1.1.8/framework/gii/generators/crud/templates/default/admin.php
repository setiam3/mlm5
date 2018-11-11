<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>
?>
<h1>Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>
<?php echo '<?php ';?>
$colom=array(
		<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	if($column->name!=='id'){
		echo "\t\t'".$column->name."',\n";
	}
	
}
if($count>=7)
	echo "\t\t*/\n";
?>
);
$this->genTables($colom, '<?php echo $this->modelClass;?>',null,'datatable table-bordered');
?>