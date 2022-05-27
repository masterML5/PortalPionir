<?php
/* @var $this ZamenaAlataController */
/* @var $model ZamenaAlata */

Yii::app()->language = 'sr_yu';

$this->breadcrumbs=array(
	'Zamena alata'=>array('index'),
	'Pretraga',
);

$this->menu=array(
	array('label'=>'Pregled', 'url'=>array('index')),
	array('label'=>'Novi zapis', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#zamena-alata-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zamena alata - pretraga</h1>

<p>
Za poredjenje traženih vrednosti moguća je upotreba operacija (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ili <b>=</b>) na početku upita.
</p>

<?php echo CHtml::link('Napredna pretraga','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zamena-alata-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'br',
		array('name'=>'Datum','type'=>'date','value'=>$model->Datum),
//		'VremeZamene',
//		'Operater',
		array('name'=>'Postavljanje','header'=>'Post.','type'=>'boolean'),
		'Proizvod',
//		'BrRadNal',
		'Alat',
		'Presa',
//		'TrajanjeOper',
		array('name'=>'Prljav','type'=>'boolean'),
		array('name'=>'Neispravan','header'=>'Neispr.','type'=>'boolean'),
		array('name'=>'Komande','header'=>'Nožn.','type'=>'boolean'),            
		'Napomena',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
