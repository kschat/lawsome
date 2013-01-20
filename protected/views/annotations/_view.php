<?php
/* @var $this AnnotationsController */
/* @var $data Annotations */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('annotation_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->annotation_id), array('view', 'id'=>$data->annotation_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annotation')); ?>:</b>
	<?php echo CHtml::encode($data->annotation); ?>
	<br />


</div>