<?php

/* @var $this ZamenaAlataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Zamena alata',
);

$this->menu=array(
	array('label'=>'Novi zapis', 'url'=>array('create')),
	array('label'=>'Pretraga', 'url'=>array('admin')),
);
?>

<h1>Zamena alata - pregled</h1>

<?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
