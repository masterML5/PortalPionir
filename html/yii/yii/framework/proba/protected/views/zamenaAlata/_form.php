<?php
/* @var $this ZamenaAlataController */
/* @var $model ZamenaAlata */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zamena-alata-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Datum'); ?>
		<?php echo $form->textField($model,'Datum'); ?>
		<?php echo $form->error($model,'Datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VremeZamene'); ?>
		<?php echo $form->textField($model,'VremeZamene'); ?>
		<?php echo $form->error($model,'VremeZamene'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Operater'); ?>
		<?php echo $form->textField($model,'Operater',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Operater'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Postavljanje'); ?>
		<?php echo $form->checkBox($model,'Postavljanje'); ?>
		<?php echo $form->error($model,'Postavljanje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Proizvod'); ?>
		<?php echo $form->textField($model,'Proizvod',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Proizvod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BrRadNal'); ?>
		<?php echo $form->textField($model,'BrRadNal',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'BrRadNal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Alat'); ?>
		<?php echo $form->textField($model,'Alat',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Alat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Presa'); ?>
		<?php echo $form->textField($model,'Presa',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Presa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TrajanjeOper'); ?>
		<?php echo $form->textField($model,'TrajanjeOper'); ?>
		<?php echo $form->error($model,'TrajanjeOper'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Prljav'); ?>
		<?php echo $form->checkBox($model,'Prljav'); ?>
		<?php echo $form->error($model,'Prljav'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Neispravan'); ?>
		<?php echo $form->checkBox($model,'Neispravan'); ?>
		<?php echo $form->error($model,'Neispravan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Komande'); ?>
		<?php echo $form->checkBox($model,'Komande'); ?>
		<?php echo $form->error($model,'Komande'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Napomena'); ?>
		<?php echo $form->textArea($model,'Napomena',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Napomena'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->