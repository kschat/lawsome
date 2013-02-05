<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
	'brand'=>'',
	'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
            	array('label'=>'Add annotation', 'url'=>'#add-annotation'),
                array('label'=>'Section', 'items'=>array(
                   array('label'=>'Body', 'url'=>'#body-section'),
                )),
                array('label'=>'Page', 'items'=>array(
                   array('label'=>'1', 'url'=>'#page-1'),
                )),
            ),
        ),
    ),
    'htmlOptions'=>array('class'=>'subnav'),
));
?>
<script>$('.subnav').find('.brand').hide();</script>
<div class="container">
	<section id="add-annotation" class="add-annotation-container" style="padding-top: 80px; margin-top: -80px;">
	</section>

	<div class="document-main-container">
			<div class="document-container" id="document-<?php echo $model->id; ?>">
			<div class="document span9">
				<h2 style="text-align: center;"><?php echo $model->title; ?></h2>
				<p>
					<?php echo $model->text; ?>
				</p>
			</div>

			<div class="span3">
				<div class="annotation-list-container">
					
				</div>
			</div>
		</div>
		<!--
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
			
			</div>
		</div>-->
	</div>
</div>

<script>
$('.subnav').scrollspy();
$('[data-spy="scroll"]').each(function () {
	var $spy = $(this).scrollspy('refresh');
});
</script>