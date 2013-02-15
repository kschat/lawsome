<?php
/* @var $this DocumentsController */
/* @var $model Documents */
/* @var $form CActiveForm */
?>

<!--<div class="wide form">-->

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
	<?php 
		echo $form->textFieldRow($model,'id');
		echo $form->textAreaRow($model,'text', array('class'=>'span12', 'rows'=>6, 'cols'=>150)); 
	?>

	<div class="buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

<!--</div> search-form -->