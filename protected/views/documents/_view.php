<?php
/* @var $this DocumentsController */
/* @var $data Documents */

if($index % 3 == 0) {
	?><div class="row-fluid">
<?php } 

?>

<div class="document span4" style="text-align: center;">
	<i class="icon-file"></i>
	<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
	<br />

</div>
<?php 
if($index % 3 == 2) {
	?></div>
<?php }