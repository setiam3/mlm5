<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	<link rel="icon" href="<?=Yii::app()->theme->baseUrl;?>/assets/images/favicon.ico">
	<title><?=$this->pageTitle?></title>
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/css/font-icons/entypo/css/entypo.css">
	<!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">-->
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/css/neon-core.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/css/custom.css">
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/jquery-1.11.3.min.js"></script>
	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="page-body" data-url="http://neon.dev">
<?php
echo $content;
?>
<!-- Imported styles on this page -->
    <link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/datatables/datatables.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/selectboxit/jquery.selectBoxIt.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/minimal/_all.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/square/_all.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/flat/_all.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/futurico/futurico.css">
	<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/skins/polaris/polaris.css">
        
	<!-- Bottom scripts (common) -->
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/gsap/TweenMax.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/bootstrap.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/joinable.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/resizeable.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/neon-api.js"></script>
        
        <!-- Imported scripts on this page -->
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/select2/select2.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-tagsinput.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/typeahead.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-datepicker.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-timepicker.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/bootstrap-colorpicker.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/moment.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/jquery.multi-select.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/icheck/icheck.min.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/neon-chat.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/toastr.js"></script>
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/datatables.js"></script>
        
	<!-- JavaScripts initializations and stuff -->
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/neon-custom.js"></script>
	<!-- Demo Settings -->
	<script src="<?=Yii::app()->theme->baseUrl;?>/assets/js/neon-demo.js"></script>
        <?php $this->isActive($this->uniqueId.'/'.$this->action->id);//set menu active?>
        <?php $this->notify();?>
</body>
</html>