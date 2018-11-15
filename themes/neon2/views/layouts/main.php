<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	<link rel="icon" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/images/favicon.ico">
	<title><?php echo $this->pageTitle?></title>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/font-icons/entypo/css/entypo.css">
	<!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">-->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/neon-core.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/custom.css">
	<!--<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/skins/white.css">-->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery-1.11.3.min.js"></script>
	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="page-body" data-url="http://neon.dev">
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
<?php 
include ('sidebar-menu.php');
//switch (Controller::getrole()) {
//      case 'user':include ('sidebar-cs.php');
//          break;
//      case 'reseller':include ('sidebar-cs.php');
//          break;
//      case 'agen':include ('sidebar-customer.php');
//          break;
//      case 'distributor':include ('sidebar-operasional.php');
//          break;
//      default:include ('sidebar-menu.php');
//          break;
//  }
	?>
	<div class="main-content">
		<?php include('top-bar.php');?>
            <?php if(isset($this->breadcrumbs)):?>
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'homeLink'=>CHtml::link('Home', Yii::app()->createUrl('/')),
                    'htmlOptions'=>array('class'=>'breadcrumbs bc-2 hidden-print row'),
		)); ?><!-- breadcrumbs -->
	<?php endif?>
		<div class="row">
		<?php echo $content?>
		</div>
		<!-- Footer -->
		<footer class="main row">
			&copy; <?php echo date('Y');?> Supported By <a href="http://zetia.web.id" target="_blank">ZETIA.WEB.ID</a>
		</footer>
	</div>
</div>
        <!-- Bottom scripts (common) -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/gsap/TweenMax.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/bootstrap.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/joinable.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/resizeable.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-api.js"></script>
	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-custom.js"></script>
	<!-- Demo Settings -->
	<!--<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/neon-demo.js"></script>-->
        <?php $this->isActive($this->uniqueId.'/'.$this->action->id);//set menu active?>
        <?php $this->notify();?>
</body>
</html>