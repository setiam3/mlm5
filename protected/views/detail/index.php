<?php
/* @var $this PosisiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Posisi',
);
?>
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne">
                Add Posisi
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
        <div class="panel-body">
            <?php $this->renderPartial('create',array('model'=>$model));?>
        </div>
    </div>
</div>
<?php $widget->run();