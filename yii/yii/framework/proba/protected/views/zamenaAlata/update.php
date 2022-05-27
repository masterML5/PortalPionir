<?php
/* @var $this ZamenaAlataController */
/* @var $model ZamenaAlata */

$this->breadcrumbs=array(
	'Zamena Alatas'=>array('index'),
	$model->br=>array('view','id'=>$model->br),
	'Update',
);

$this->menu=array(
	array('label'=>'List ZamenaAlata', 'url'=>array('index')),
	array('label'=>'Create ZamenaAlata', 'url'=>array('create')),
	array('label'=>'View ZamenaAlata', 'url'=>array('view', 'id'=>$model->br)),
	array('label'=>'Manage ZamenaAlata', 'url'=>array('admin')),
);
?>

<h1>Update ZamenaAlata <?php echo $model->br; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>