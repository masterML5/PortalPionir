<?php
/* @var $this ZamenaAlataController */
/* @var $model ZamenaAlata */

Yii::app()->language = 'sr_yu';

$this->breadcrumbs=array(
	'Zamena alata, br. '=>array('index'),
	$model->br,
);

$this->menu=array(
	array('label'=>'Pregled', 'url'=>array('index')),
	array('label'=>'Novi zapis', 'url'=>array('create')),
	array('label'=>'Ispravke', 'url'=>array('update', 'id'=>$model->br)),
	array('label'=>'Brisanje', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->br),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Pretraga', 'url'=>array('admin')),
);
?>

<h1>Detaljni pregled zapisa broj <?php echo $model->br; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'br',
		array('name'=>'Datum','value'=>Yii::app()->dateFormatter->format('d.M.yyyy.',$model->Datum)),
		//'VremeZamene',
		//'Operater',
		'Postavljanje',
		'Proizvod',
		//'BrRadNal',
		'Alat',
		'Presa',
		//'TrajanjeOper',
		'Prljav',
		'Neispravan',
		'Komande',
		'Napomena',
	),
        
)); ?>
