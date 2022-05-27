<?php
/* @var $this ZamenaAlataController */
/* @var $data ZamenaAlata */

print_r ($data);

?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('br')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->br), array('view', 'id'=>$data->br)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Datum')); ?>:</b>
	<?php echo CHtml::encode($data->Datum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VremeZamene')); ?>:</b>
	<?php echo CHtml::encode($data->VremeZamene); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Operater')); ?>:</b>
	<?php echo CHtml::encode($data->Operater); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Postavljanje')); ?>:</b>
	<?php echo CHtml::encode($data->Postavljanje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Proizvod')); ?>:</b>
	<?php echo CHtml::encode($data->Proizvod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BrRadNal')); ?>:</b>
	<?php echo CHtml::encode($data->BrRadNal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Alat')); ?>:</b>
	<?php echo CHtml::encode($data->Alat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Presa')); ?>:</b>
	<?php echo CHtml::encode($data->Presa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TrajanjeOper')); ?>:</b>
	<?php echo CHtml::encode($data->TrajanjeOper); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Prljav')); ?>:</b>
	<?php echo CHtml::encode($data->Prljav); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Neispravan')); ?>:</b>
	<?php echo CHtml::encode($data->Neispravan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Komande')); ?>:</b>
	<?php echo CHtml::encode($data->Komande); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Napomena')); ?>:</b>
	<?php echo CHtml::encode($data->Napomena); ?>
	<br />

	*/ ?>

</div>