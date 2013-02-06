<?php
/* @var $this DocumentsController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Documents</h1>

<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>