<?php
/* @var $this KontainerjoController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
	'Kontainerjos',
);
?>
<br><div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne">
                Add Info Container
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
        <div class="panel-body">
            <?php $this->renderPartial('create',array('model'=>$model));?>
        </div>
    </div>
</div>
<?php 
$widget->run();