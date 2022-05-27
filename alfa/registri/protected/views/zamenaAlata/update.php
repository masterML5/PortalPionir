<?php
/* @var $this ZamenaAlataController */
/* @var $model ZamenaAlata */

$this->breadcrumbs=array(
	'Zamena alata'=>array('index'),
	$model->br=>array('view','id'=>$model->br),
	'Ispravka',
);

$this->menu=array(
	array('label'=>'Pregled', 'url'=>array('index')),
	array('label'=>'Novi zapis', 'url'=>array('create')),
	array('label'=>'Detalj', 'url'=>array('view', 'id'=>$model->br)),
	array('label'=>'Pretraga', 'url'=>array('admin')),
);
?>

<h1>Zamena alata - ispravka zapisa broj <?php echo $model->br; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>