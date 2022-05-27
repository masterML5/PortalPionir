<?php
/* @var $this ZamenaAlataController */
/* @var $model ZamenaAlata */

$this->breadcrumbs=array(
	'Zamena Alatas'=>array('index'),
	$model->br,
);

$this->menu=array(
	array('label'=>'List ZamenaAlata', 'url'=>array('index')),
	array('label'=>'Create ZamenaAlata', 'url'=>array('create')),
	array('label'=>'Update ZamenaAlata', 'url'=>array('update', 'id'=>$model->br)),
	array('label'=>'Delete ZamenaAlata', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->br),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ZamenaAlata', 'url'=>array('admin')),
);
?>

<h1>View ZamenaAlata #<?php echo $model->br; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'br',
		'Datum',
		'VremeZamene',
		'Operater',
		'Postavljanje',
		'Proizvod',
		'BrRadNal',
		'Alat',
		'Presa',
		'TrajanjeOper',
		'Prljav',
		'Neispravan',
		'Komande',
		'Napomena',
	),
)); ?>
