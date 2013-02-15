<?php
/* @var $this AnnotationsController */
/* @var $data Annotations */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annotation')); ?>:</b>
	<?php echo CHtml::encode($data->annotation); ?>
	<br />

	<h1>comments</h1>
 
	<?php $this->renderPartial('comment.views.comment.commentList', array(
		'model'=>$data
	)); ?>


</div>