<?php
/* @var $this ZamenaAlataController */
/* @var $model ZamenaAlata */

$this->breadcrumbs=array(
	'Zamena Alatas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ZamenaAlata', 'url'=>array('index')),
	array('label'=>'Manage ZamenaAlata', 'url'=>array('admin')),
);
?>

<h1>Create ZamenaAlata</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>