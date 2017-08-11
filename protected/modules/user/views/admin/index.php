<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Manage'),
);
?>
<h1><?php echo UserModule::t("Manage Users"); ?></h1>
<?php
$colom=array(
		'username',
		'email',
		//'status',
    );
$this->genTables($colom, 'User',null,'datatable table-bordered');//format idtabel,colom,models
?>