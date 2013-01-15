<?php
/* @var $this DocumentsController */
/* @var $data Documents */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('document_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->document_id), array('view', 'id'=>$data->document_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

</div>