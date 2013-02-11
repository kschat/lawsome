<?php
/* @var $this AnnotationsController */
/* @var $model Annotations */

$this->breadcrumbs=array(
	'Annotations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Annotations', 'url'=>array('index')),
	array('label'=>'Create Annotations', 'url'=>array('create')),
	array('label'=>'Update Annotations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Annotations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Annotations', 'url'=>array('admin')),
);
?>

<h1>View Annotations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'annotation',
	),
)); ?>