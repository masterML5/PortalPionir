<?php
/* @var $this ZamenaAlataController */
/* @var $model ZamenaAlata */

$this->breadcrumbs=array(
	'Zamena alata'=>array('index'),
	'Nova stavka',
);

$this->menu=array(
	array('label'=>'Pregled', 'url'=>array('index')),
	array('label'=>'Pretraga', 'url'=>array('admin')),
);
?>

<h1>Zamena alata - unos nove transakcije</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>