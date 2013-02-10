<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
	'htmlOptions'=>array('class'=>'landing-unit')
)); ?>

<div class="container landing-unit-content">
	<h1>Welcome to <?php echo CHtml::encode(Yii::app()->name); ?></h1>
	<p>Lawsome is a quick and easy way to add annotations to legal documentation.</p>
	<p>
	<?php
		$this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Learn More',
			'type'=>'success',
			'size'=>'large',
			'htmlOptions'=>array('href'=>'/site/page?view=about')
		));
	?>
	</p>
</div>
<?php $this->endWidget(); ?>
