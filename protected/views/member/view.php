<?php
/* @var $this MemberController */

$this->breadcrumbs=array(
	'Member'=>array('/member'),
	'View',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<div class="panel panel-primary">
    <div class="panel-heading">
            <div class="panel-title">My Profile</div>
    </div>
<?php $attributes=array(
		'username',
		'password',
		'email',
		'firstname',
		'lastname',
		'birthday'
		
	);
    $this->genListView($model,$attributes);
    ?>
    
</div>