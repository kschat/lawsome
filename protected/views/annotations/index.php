<?php
/* @var $this AnnotationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Annotations',
);

$this->menu=array(
	array('label'=>'Create Annotations', 'url'=>array('create')),
	array('label'=>'Manage Annotations', 'url'=>array('admin')),
);
?>

<h1>Annotations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
