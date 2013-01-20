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

<div class="document-main-container row fill">
	<div class="span7 offset2">
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