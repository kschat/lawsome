<?php
/* @var $this AnnotationsController */
/* @var $model Annotations */

$this->breadcrumbs=array(
	'Annotations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Annotations', 'url'=>array('index')),
	array('label'=>'Manage Annotations', 'url'=>array('admin')),
);
?>

<h1>Create Annotations</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>