<?php
/* @var $this AnnotationsController */
/* @var $model Annotations */

$this->breadcrumbs=array(
	'Annotations'=>array('index'),
	$model->annotation_id=>array('view','id'=>$model->annotation_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Annotations', 'url'=>array('index')),
	array('label'=>'Create Annotations', 'url'=>array('create')),
	array('label'=>'View Annotations', 'url'=>array('view', 'id'=>$model->annotation_id)),
	array('label'=>'Manage Annotations', 'url'=>array('admin')),
);
?>

<h1>Update Annotations <?php echo $model->annotation_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>