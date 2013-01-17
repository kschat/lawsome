<?php
/* @var $this DocumentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Documents',
);
/*
$this->menu=array(
	array('label'=>'Create Documents', 'url'=>array('create')),
	array('label'=>'Manage Documents', 'url'=>array('admin')),
);*/
?>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>

<div class="document-main-container row-fluid fill">
	<div class="span9">
		<div class="document-container" id="document-1">
			<div class="document" id="document-<?php echo $model->document_id; ?>">
				<p>
					<?php echo $model->text; ?>
				</p>
			</div>
		</div>
	</div>
	<div class="span3">
		<div class="annotation-list-container">
			<div class="annotation-container">
			</div>

			<div class="accordion" id="annotation-list">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" href="#collapseOne">Annotation 1</a>
					</div>
					<div id="collapseOne" class="accordion-body collapse">
						<div class="accordion-inner">
							asdfasdfkljlkjin
						</div>
					</div>
				</div>

				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" href="#collapseTwo">Annotation 2</a>
					</div>
					<div id="collapseTwo" class="accordion-body collapse">
						<div class="accordion-inner">
							asdfasdfkljlkjin
						</div>
					</div>
				</div>

				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" href="#collapseThree">Annotation 3</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							asdfasdfkljlkjin
						</div>
					</div>
				</div>
			</div>
			<!--
			<div class="annotation-container">
				<img class="annotation-user-image" src="<?php echo Yii::app()->baseUrl. '/images/profile-default.gif'; ?>" />
				<div class="annotation-body">
					<div class="annotation-title">
						<b>Title</b>
					</div>
					<div class="annotation">
						<p>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms"</p>
					</div>
				</div>
			</div>
		-->
		</div>
	</div>
</div>

<?php
/*
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/libs/underscore/underscore-1.4.3.min.js'); 
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/libs/backbone/backbone-0.9.10.min.js'); 
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/models/document/document.js');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/templates/document/documentTemplate.html');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/views/document/documentView.js'); 
*/
?>