<?php
/* @var $this DocumentsController */
/* @var $data Documents */

if($index % 3 == 0) {
	?><div class="row-fluid">
<?php } 

?>

<div class="document-button span4">
	<?php echo CHtml::link('<i class="icon-file"></i>'.CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>

</div>
<?php 
if($index % 3 == 2) {
	?></div>
<?php }