<?php
/* @var $this ZamenaAlataController */
/* @var $model ZamenaAlata */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'br'); ?>
		<?php echo $form->textField($model,'br'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Datum'); ?>
		<?php echo $form->textField($model,'Datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VremeZamene'); ?>
		<?php echo $form->textField($model,'VremeZamene'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Operater'); ?>
		<?php echo $form->textField($model,'Operater',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Postavljanje'); ?>
		<?php echo $form->checkBox($model,'Postavljanje'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Proizvod'); ?>
		<?php echo $form->textField($model,'Proizvod',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BrRadNal'); ?>
		<?php echo $form->textField($model,'BrRadNal',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Alat'); ?>
		<?php echo $form->textField($model,'Alat',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Presa'); ?>
		<?php echo $form->textField($model,'Presa',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TrajanjeOper'); ?>
		<?php echo $form->textField($model,'TrajanjeOper'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Prljav'); ?>
		<?php echo $form->checkBox($model,'Prljav'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Neispravan'); ?>
		<?php echo $form->checkBox($model,'Neispravan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Komande'); ?>
		<?php echo $form->checkBox($model,'Komande'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Napomena'); ?>
		<?php echo $form->textArea($model,'Napomena',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->