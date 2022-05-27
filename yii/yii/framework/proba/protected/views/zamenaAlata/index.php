<?php
/* @var $this ZamenaAlataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Zamena Alatas',
);

$this->menu=array(
	array('label'=>'Create ZamenaAlata', 'url'=>array('create')),
	array('label'=>'Manage ZamenaAlata', 'url'=>array('admin')),
);
?>

<h1>Zamena Alatas</h1>

<?php

print_r ($dataProvider);

?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
